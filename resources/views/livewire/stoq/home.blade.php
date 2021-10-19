<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-4 mb-4 mr-4">
                    <div class="text-2xl">
                        Welcome to Stoq!
                    </div>
                    <div class="text">
                        A simple app to check the current information of stock price.
                    </div>
                    <form method="POST" action="#" class="check-price-form mt-3">
                        @csrf

                        <div>
                            <x-jet-label for="StockSymbol" value="{{ __('Enter Stock Symbol (Ex: AMZN)') }}" />
                            <x-jet-input id="StockSymbol" class="block mt-1 w-half" type="text" name="StockSymbol"
                                required autofocus />
                            <x-jet-button class="mt-2">
                                {{ __('Check') }}
                            </x-jet-button>
                        </div>
                        
                    </form>

                    <div class="invisible result-container mt-3">
                        <div class="text-xl">
                            Result
                        </div>
                        <div class="mt-2 stock-price-details">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
