<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories_Model;
use App\Models\Products_Model;

class ProductsController extends Controller
{
    public function index()
    {
        $productsData = Products_Model::with('category')->get();
        return view('products.products', ['products' => $productsData]);
    }

    public function create()
    {
        $categories = Categories_Model::pluck('name', 'uuid');

        return view('products.createProduct', ['categories' => $categories]);
    }

    public function show($category, $id, $name)
    {
        $dataProduct = Products_Model::with('category')->where('uuid', $id)->firstOrFail();

        if ($dataProduct->category->name !== $category || $dataProduct->name !== $name) {
            abort(404);
        }

        return view('products.detailProduct', compact('dataProduct'));
    }

    public function edit()
    {
        return view('products.editProduct');
    }

    public function store(Request $request)
    {
        $productData = $request->validate([
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|min:5',
        ], [
            'required' => 'Inputan :attribute wajib diisi.',
            'min' => 'Inputan :attribute minimal :min karakter.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $category = Categories_Model::where('uuid', $request->input('category'))->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }


        $imagePath = $request->file('image')->store('uploads/products', 'public');

        Products_Model::create([
            'name' => $productData['title'],
            'image' => $imagePath,
            'description' => $productData['description'],
            'price' => $productData['price'],
            'stock' => $productData['stock'],
            'categories_id' => $category->id,
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }
}
