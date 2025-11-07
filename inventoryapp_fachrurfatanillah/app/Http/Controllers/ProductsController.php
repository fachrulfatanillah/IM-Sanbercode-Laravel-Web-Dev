<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories_Model;
use App\Models\Products_Model;
use Illuminate\Support\Facades\Storage;

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

    public function edit($id)
    {
        $dataProduct = Products_Model::with('category')->where('uuid', $id)->firstOrFail();
        $categories = Categories_Model::all();

        return view('products.editProduct', compact('dataProduct', 'categories'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

        $product = Products_Model::where('uuid', $id)->firstOrFail();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('uploads/products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->categories_id = $request->input('category_id');

        $product->save();

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Products_Model::where('uuid', $id)->firstOrFail();

        if (!$product) {
            return redirect('/products')->with('error', 'Kategori tidak ditemukan');
        }

        $product->delete();

        return redirect('/products')->with('success', 'Berhasil menghapus produk');
    }
}
