<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добро пожаловать в Subtime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">Добро пожаловать в Subtime</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">О Subtime</h2>
                            <p class="text-gray-600">
                                Subtime - это ваша платформа для управления всеми подписками. 
                                Легко отслеживайте, управляйте и оптимизируйте ваши подписочные сервисы.
                            </p>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">Возможности</h2>
                            <ul class="list-disc list-inside text-gray-600 space-y-2">
                                <li>Управление несколькими подписками</li>
                                <li>Отслеживание стоимости подписок</li>
                                <li>Напоминания о продлении</li>
                                <li>Безопасная обработка платежей</li>
                            </ul>
                        </div>
                    </div>

                    @guest
                        <div class="mt-8 text-center">
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Начать
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
