<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Auth::user()->transactions()->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:card,paypal'
        ]);

        $transaction = Auth::user()->transactions()->create([
            'amount' => $request->amount,
            'type' => 'deposit',
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'description' => 'Пополнение баланса'
        ]);

        // Здесь должна быть интеграция с платежной системой
        // После успешной оплаты:
        $transaction->update(['status' => 'completed']);
        Auth::user()->increment('balance', $request->amount);

        return redirect()->route('profile.balance')->with('success', 'Баланс успешно пополнен');
    }
} 