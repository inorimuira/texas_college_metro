<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-100 to-pink-100">

    <!-- Login Container -->
    <div class="w-full max-w-xs text-center">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img alt="Hero Banner" class="w-full max-w-3xl" src="{{ asset('assets/image/logo.png') }}" />
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <p class="text-left">Username</p>
                <input type="text" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <p class="text-left">Password</p>
                <input type="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 text-red-500 text-sm" id="error-message"></div>
            <button type="button" onclick="validateLogin()" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                LOGIN
            </button>
        </form>
    </div>

    <script>
        function validateLogin() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            if (username === '' || password === '') {
                errorMessage.textContent = 'Username and Password cannot be empty.';
            } else if (username !== 'correctUsername' || password !== 'correctPassword') {
                errorMessage.textContent = 'Incorrect Username or Password.';
            } else {
                errorMessage.textContent = '';
                alert('Login successful!');
                // Add code here to redirect or handle successful login
            }
        }
    </script>

</div>
