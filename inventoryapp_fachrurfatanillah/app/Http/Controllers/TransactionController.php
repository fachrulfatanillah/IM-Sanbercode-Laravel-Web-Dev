<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction_Model;
use App\Models\Products_Model;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();

        if ($userAuth->status === 'admin') {
            $transactionData = Transaction_Model::with(['product', 'user'])
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($userAuth->status === 'staf') {
            $transactionData = Transaction_Model::with(['product', 'user'])
                ->where('users_id', $userAuth->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $transactionData = collect();
        }

        return view('transaction.index', compact('transactionData'));
    }


    public function create()
    {
        $products = Products_Model::select('id', 'name')->get();

        return view('transaction.createTransaction', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products_id' => 'required|exists:products,id',
            'type'        => 'required|in:in,out',
            'amount'      => 'required|integer|min:1',
            'notes'       => 'nullable|string|max:500',
        ]);

        $user = Auth::user();

        $product = Products_Model::findOrFail($request->products_id);

        if ($request->type === 'in') {
            $product->stock += $request->amount;
        } elseif ($request->type === 'out') {
            if ($product->stock < $request->amount) {
                return redirect()->back()
                    ->with('error', 'Stok produk tidak mencukupi untuk transaksi keluar!');
            }

            $product->stock -= $request->amount;
        }

        $product->save();

        Transaction_Model::create([
            'products_id' => $request->products_id,
            'users_id'    => $user->id,
            'type'        => $request->type,
            'amount'      => $request->amount,
            'notes'       => $request->notes,
        ]);

        return redirect('/transaction')->with('success', 'Transaksi berhasil disimpan!');
    }
}
