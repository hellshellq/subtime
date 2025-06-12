<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Баланс') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Текущий баланс</h3>
                        <p class="mt-2 text-3xl font-bold">{{ number_format(auth()->user()->balance, 2) }} ₽</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Пополнить баланс</h3>
                        <form method="POST" action="{{ route('profile.balance.add') }}" class="mt-4">
                            @csrf
                            <div class="mb-4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">Сумма</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">₽</span>
                                    </div>
                                    <input type="number" name="amount" id="amount" step="0.01" min="1" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" required>
                                </div>
                            </div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Пополнить
                            </button>
                        </form>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">История транзакций</h3>
                        <div class="mt-4 space-y-4">
                            @php
                                $transactions = auth()->user()->transactions()->latest()->take(10)->get();
                            @endphp

                            @if($transactions->count() > 0)
                                @foreach($transactions as $transaction)
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-medium">{{ $transaction->description }}</h4>
                                                <p class="text-sm text-gray-600">
                                                    {{ $transaction->created_at->format('d.m.Y H:i') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium {{ $transaction->amount > 0 ? 'text-green-600' : 'text-red-600' }}">
                                                    {{ $transaction->amount > 0 ? '+' : '' }}{{ number_format($transaction->amount, 2) }} ₽
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600">Нет доступных транзакций.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 