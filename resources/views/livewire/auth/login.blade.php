@section('title', 'Sign in to your account')

<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-100 to-pink-100">
    <!-- Login Container -->
    <div class="w-full max-w-xs text-center">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img alt="Hero Banner" class="w-full max-w-3xl" src="{{ asset('assets/image/logo.png') }}" />
        </div>

        <!-- Login Form -->
        <form wire:submit.prevent="authenticate" class="rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="login" class="text-left">Username or Email</label>
                <input type="text" wire:model="login" name="login" placeholder="Username or Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('login')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="text-left">Password</label>
                <input type="password" name="password" wire:model="password" placeholder="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 text-red-500 text-sm" id="error-message"></div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                LOGIN
            </button>
        </form>
    </div>
</div>
