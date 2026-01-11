<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">
                    👋 Welcome Back!
                </h3>
                <p class="text-gray-600">
                    You are successfully logged in to your dashboard.
                </p>
            </div>
            <div class="mt-5">

               @yield('graph')
           
            </div>

            </div>

        </div>
    </div>
</x-app-layout>