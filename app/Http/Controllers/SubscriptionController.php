<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::where('is_active', true)->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function show(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    public function purchase(Subscription $subscription)
    {
        $user = Auth::user();
        
        if ($user->balance < $subscription->price) {
            return redirect()->back()->with('error', 'Недостаточно средств на балансе');
        }

        // Списываем баланс
        $user->balance -= $subscription->price;
        $user->save();

        $userSubscription = UserSubscription::create([
            'user_id' => $user->id,
            'subscription_id' => $subscription->id,
            'start_date' => now(),
            'end_date' => now()->addMonths($subscription->duration),
            'status' => 'active'
        ]);

        // Создаем транзакцию
        $transaction = $user->transactions()->create([
            'amount' => -$subscription->price,
            'type' => 'subscription_purchase',
            'status' => 'completed',
            'payment_method' => 'balance',
            'description' => "Покупка подписки {$subscription->name}"
        ]);

        $userSubscription->update(['transaction_id' => $transaction->id]);

        return redirect()->route('profile.subscriptions')->with('success', 'Подписка успешно приобретена');
    }
} 