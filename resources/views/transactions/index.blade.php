<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('История транзакций') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @forelse($transactions as $transaction)
                                <li>
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm font-medium text-blue-600 truncate">
                                                {{ $transaction->description }}
                                            </div>
                                            <div class="ml-2 flex-shrink-0 flex">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ $transaction->status === 'completed' ? 'Выполнено' : 'В обработке' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    {{ $transaction->created_at->format('d.m.Y H:i') }}
                                                </div>
                                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                    <span class="text-gray-500">Способ оплаты: {{ $transaction->payment_method }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <span class="font-medium {{ $transaction->amount > 0 ? 'text-green-600' : 'text-red-600' }}">
                                                    {{ $transaction->amount > 0 ? '+' : '' }}{{ $transaction->amount }} ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="px-4 py-4 sm:px-6 text-center text-gray-500">
                                    Нет транзакций
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 