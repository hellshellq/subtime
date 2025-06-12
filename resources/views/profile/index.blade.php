<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Профиль') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">Информация о профиле</h3>
                    <p class="mt-1 text-sm text-gray-600">Информация о вашем аккаунте.</p>

                    <div class="mt-6">
                        <p><strong>Имя:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Баланс:</strong> {{ number_format(auth()->user()->balance, 2) }} ₽</p>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">Быстрые ссылки</h3>
                    <div class="mt-6 space-y-4">
                        <a href="{{ route('profile.subscriptions') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Мои подписки
                        </a>
                        <a href="{{ route('profile.balance') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Управление балансом
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 