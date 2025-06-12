<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мои подписки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Активные подписки</h3>
                        <div class="mt-4 space-y-4">
                            @php
                                $activeSubscriptions = $subscriptions->where('status', 'active')
                                    ->where('end_date', '>', now());
                            @endphp

                            @if($activeSubscriptions->count() > 0)
                                @foreach($activeSubscriptions as $userSubscription)
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-medium">{{ $userSubscription->subscription->name }}</h4>
                                                <p class="text-sm text-gray-600">
                                                    Действует до: {{ $userSubscription->end_date->format('d.m.Y') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium">{{ number_format($userSubscription->subscription->price, 2) }} ₽</p>
                                                <p class="text-sm text-gray-600">{{ $userSubscription->subscription->duration }} месяцев</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600">У вас нет активных подписок.</p>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">История подписок</h3>
                        <div class="mt-4 space-y-4">
                            @php
                                $expiredSubscriptions = $subscriptions->where(function($subscription) {
                                    return $subscription->status === 'expired' || $subscription->end_date <= now();
                                });
                            @endphp

                            @if($expiredSubscriptions->count() > 0)
                                @foreach($expiredSubscriptions as $userSubscription)
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-medium">{{ $userSubscription->subscription->name }}</h4>
                                                <p class="text-sm text-gray-600">
                                                    Истекла: {{ $userSubscription->end_date->format('d.m.Y') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-medium">{{ number_format($userSubscription->subscription->price, 2) }} ₽</p>
                                                <p class="text-sm text-gray-600">{{ $userSubscription->subscription->duration }} месяцев</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600">История подписок отсутствует.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('subscriptions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Смотреть доступные подписки
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 