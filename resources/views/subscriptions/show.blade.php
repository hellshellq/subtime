<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $subscription->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $subscription->name }}</h3>
                            <p class="text-gray-600 mb-6">{{ $subscription->description }}</p>
                        </div>
                        <div>
                            <div class="bg-gray-50 p-6 rounded-lg mb-6">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-gray-600">Стоимость:</span>
                                    <span class="text-2xl font-bold text-gray-900">{{ $subscription->price }} ₽</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Срок действия:</span>
                                    <span class="text-lg font-medium text-gray-900">{{ $subscription->duration }} мес.</span>
                                </div>
                            </div>

                            @auth
                                <form action="{{ route('subscriptions.purchase', $subscription) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-700">
                                        Купить подписку
                                    </button>
                                </form>
                            @else
                                <div class="text-center">
                                    <p class="text-gray-600 mb-4">Для покупки подписки необходимо войти в систему</p>
                                    <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-700">
                                        Войти
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 