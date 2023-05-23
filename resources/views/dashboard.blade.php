<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                <p class="text-3xl font-bold">100</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold mb-2">Total Orders</h2>
                <p class="text-3xl font-bold">50</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold mb-2">Revenue</h2>
                <p class="text-3xl font-bold">$10,000</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold mb-2">Product Sales</h2>
                <p class="text-3xl font-bold">500</p>
            </div>
        </div>
    </div>

</x-app-layout>
