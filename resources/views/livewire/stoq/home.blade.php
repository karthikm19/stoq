<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-4 ml-4 mb-4 mr-4">

                    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Welcome to Stoq!') }}
                    </h1>
                    <div class="text">
                        A simple app to check the current information of stock price.
                    </div>

                    <form method="POST" action="#" class="check-price-form mt-3">
                        @csrf

                        <div>
                            <x-jet-label for="StockSymbol" value="{{ __('Enter Stock Symbol (Ex: AMZN)') }}" />
                            <x-jet-input id="StockSymbol" class="block mt-1 w-half" type="text" name="StockSymbol"
                                required autofocus />
                            <x-jet-button class="mt-2 check-price-button">
                                {{ __('Get Price') }}
                            </x-jet-button>
                        </div>
                        
                    </form>

                    <div class="result-container mt-3 hidden">
                        <div class="text-l">
                            Result
                        </div>
                        <div class="mt-2 stock-price-details">

                        </div>
                    </div>
                    <div class="loading-container mt-3 hidden">
                        Checking, please wait...
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
