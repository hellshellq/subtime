<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Доступные подписки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($subscriptions as $subscription)
                            <div class="bg-white border rounded-lg shadow-sm overflow-hidden flex flex-col items-center">
                                @if($subscription->icon_url)
                                    <img src="{{ $subscription->icon_url }}" alt="icon" class="w-16 h-16 mt-6 mb-2" />
                                @endif
                                <div class="p-6 w-full flex-1 flex flex-col items-center">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">{{ $subscription->name }}</h3>
                                    <p class="text-gray-600 mb-4 text-center">{{ $subscription->description }}</p>
                                    @if(!empty($subscription->features))
                                        <ul class="mb-4 list-disc list-inside text-gray-500 text-sm text-left">
                                            @foreach($subscription->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="flex justify-between items-center w-full mt-auto">
                                        <div>
                                            <span class="text-2xl font-bold text-gray-900">{{ $subscription->price }} ₽</span>
                                            <span class="text-gray-500">/ {{ $subscription->duration }} мес.</span>
                                        </div>
                                        <a href="{{ route('subscriptions.show', $subscription) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                            Подробнее
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 