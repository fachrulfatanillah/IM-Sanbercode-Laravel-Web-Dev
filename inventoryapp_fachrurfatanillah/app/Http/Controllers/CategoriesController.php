<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

use Illuminate\Support\Facades\DB;
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
                'required' => 'inputan :attribute Wajib diisi.',
                'min' => 'inputan : attribute minimal :min karakter'
            ]
        );

        $now = Carbon::now();

        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/category')->with('success', 'Berhasil Tambah Category!');
    }

    public function index()
    {
        $ct = DB::table('categories')->get();

        return view('category.tampil', ['categories' => $ct]);
    }

    public function show($id)
    {
        $data = DB::table('categories')->find($id);

        return view('category.detail', ['detailCategory' => $data]);
    }

    public function edit($id)
    {
        $data = DB::table('categories')->find($id);

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
                'required' => 'inputan :attribute Wajib diisi.',
                'min' => 'inputan : attribute minimal :min karakter'
            ]
        );

        $now = Carbon::now();

        DB::table('categories')->where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'updated_at' => $now
            ]
        );

        return redirect('/category')->with('success', 'Berhasil Update Category');
    }

    public function destroy($id)
    {
        DB::table('category')->where('id', $id)->delete();

        return redirect('/category')->with('success', 'Berhasil Hapus categories');
    }
}
