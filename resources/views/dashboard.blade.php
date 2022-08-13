<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                <!-- Column contents -->
                <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                    <a href="{{ url('/services') }}">
                        <h4>Number of service</h4>
                        <p>{{ $services->count() }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
