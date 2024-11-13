@section('title', 'Sign in to your account')

<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-100 to-pink-100">
    <!-- Login Container -->
    <div class="w-full max-w-xs">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img alt="Hero Banner" class="w-full max-w-40 md:max-w-60 lg:max-w-64" src="{{ asset('assets/image/logo.png') }}" />
        </div>

        <!-- Login Form -->
        <form wire:submit.prevent="authenticate" class="grid grid-cols-1 px-8">
            <div class="mb-4 flex flex-col">
                <label for="login" class="block mb-1 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">Username or Email</label>
                <input type="text" wire:model="login" name="login" placeholder="Masukan username anda" class="shadow appearance-none text-sm border border-slate-400 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('login')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">Password</label>
                <input type="password" name="password" wire:model="password" placeholder="masukan password" class="shadow appearance-none text-sm border border-slate-400 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 text-red-500 text-sm" id="error-message"></div>
            <button type="submit" class="w-full bg-primary-1300 hover:bg-primary-1600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                Login
            </button>
        </form>
    </div>
</div>
