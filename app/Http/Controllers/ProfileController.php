<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function subscriptions()
    {
        $subscriptions = auth()->user()->userSubscriptions()->with('subscription')->latest()->get();
        return view('profile.subscriptions', compact('subscriptions'));
    }

    public function balance()
    {
        return view('profile.balance');
    }

    public function addBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $user = auth()->user();
            $user->balance += $request->amount;
            $user->save();

            $user->transactions()->create([
                'amount' => $request->amount,
                'description' => 'Пополнение баланса',
                'type' => 'deposit',
                'status' => 'completed',
            ]);
        });

        return redirect()->route('profile.balance')
            ->with('success', 'Баланс успешно пополнен.');
    }
} 