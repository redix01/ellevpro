<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <br><br>
                     @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" style="color: #9e9eed; ">Goto Admin Dashboard</a>
                        <br><br>
                        <a href="{{ route('user.dashboard') }}" style="color: #9e9eed; ">Goto User Dashboard</a>
                    @else
                      <a href="{{ route('user.dashboard') }}" style="color: #9e9eed; ">Goto Dashboard</a>

                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
