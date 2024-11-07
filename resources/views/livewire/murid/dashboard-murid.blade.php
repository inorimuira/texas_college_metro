<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen">

    <!-- Navbar -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white shadow">
        <!-- Left section with logo and links -->
        <div class="flex items-center space-x-8">
            <!-- Logo -->
            <img alt="Hero Banner" class="w-12 h-12" src="{{ asset('assets/image/logo.png') }}" />
            <!-- Navigation Links -->
            <a href="#" class="text-gray-800 font-medium">Attendance</a>
            <a href="#" class="text-gray-800 font-medium">Course</a>
            <a href="#" class="text-gray-800 font-medium">Report</a>
        </div>

        <!-- Right section with user icon and name -->
        <div class="flex items-center space-x-2">
            <!-- User Icon -->
            <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png" alt="User Icon" class="w-6 h-6">
            <!-- Username -->
            <span class="text-gray-800 font-medium">FULAN</span>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="bg-gradient-to-r from-blue-800 to-purple-900">
        <div class="w-full max-w-lg p-8 ml-14">
            <!-- Welcome Message -->
            <div class="p-6">
                <h1 class="text-4xl font-bold text-white">Welcome Fulan!</h1>
                <p class="text-lg text-white mt-2">Hope You Have a Wonderful Day</p>
            </div>

            <!-- Placement Test Reminder -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-lg font-semibold mb-2">Please Finish Your Placement Test</h2>
                <p class="text-gray-600">The purpose of the test is to determine your level</p>
            </div>
        </div>
    </div>

    <div class="p-20">
        <!-- Progress Section -->
        <div class="mt-8 flex space-x-6">
            <!-- Progress Card -->
            <div class="w-1/2 p-6 bg-indigo-700 text-white rounded-lg shadow-md">
                <h3 class="text-lg">Finish your course</h3>
                <div class="flex items-center justify-between mt-2">
                    <h2 class="text-2xl font-semibold">Placement Test</h2>
                    <span class="text-2xl font-semibold">0%</span>
                </div>
                <!-- Progress Bar -->
                <div class="w-full bg-indigo-400 h-2 mt-4 rounded-full overflow-hidden">
                    <div class="bg-white h-full" style="width: 0%;"></div>
                </div>
                <div class="text-sm mt-2">
                    <button>Overall Progress --></button>
                </div>
            </div>

            <!-- Learning Activity Section -->
            <div class="w-1/2 p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Learning Activity</h3>
                <div class="space-y-4">
                    <!-- Activity Card -->
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h4 class="text-sm font-semibold">Studied</h4>
                        <p class="text-gray-600 text-sm">Right now you haven’t complete placement test</p>
                    </div>
                    <div class="p-4 bg-gray-100 rounded-lg">
                        <h4 class="text-sm font-semibold">Studied</h4>
                        <p class="text-gray-600 text-sm">Right now you haven’t complete placement test</p>
                    </div>
                </div>
                <div class="text-right text-blue-500 mt-4">
                    <button>More</button>
                </div>
            </div>
        </div>
    </div>

</div>
