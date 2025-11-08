<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories_Model;
use Carbon\Carbon;


class CategoriesController extends Controller
{
    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required',
            ],
            [
                'required' => 'Inputan :attribute wajib diisi.',
                'min' => 'Inputan :attribute minimal :min karakter.',
            ]
        );

        Categories_Model::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect('/category')->with('success', 'Berhasil Tambah Category!');
    }

    public function index()
    {
        $categories = Categories_Model::all();

        return view('category.tampil', ['categories' => $categories]);
    }

    public function show($id)
    {
        $detailCategory = Categories_Model::with('products')->findOrFail($id);

        return view('category.detail', compact('detailCategory'));
    }

    public function edit($id)
    {
        $data = Categories_Model::find($id);

        return view('category.edit', ['editCategory' => $data]);
    }

    public function update($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required',
            ],
            [
                'required' => 'Inputan :attribute wajib diisi.',
                'min' => 'Inputan :attribute minimal :min karakter.'
            ]
        );

        $category = Categories_Model::find($id);

        if (!$category) {
            return redirect('/category')->with('error', 'Kategori tidak ditemukan');
        }

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'update_at' => Carbon::now(),
        ]);

        return redirect('/category')->with('success', 'Berhasil Update Category');
    }

    public function destroy($id)
    {
        $category = Categories_Model::find($id);

        if (!$category) {
            return redirect('/category')->with('error', 'Kategori tidak ditemukan');
        }

        $category->delete();

        return redirect('/category')->with('success', 'Berhasil Hapus Category');
    }
}
