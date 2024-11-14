<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">

    <!-- Navbar -->
    <x-murid.navigation></x-murid.navigation>

    <!-- Dashboard Content -->
    <div class="mt-20 bg-gradient-to-r from-blue-800 to-purple-900">
        <div class="w-full p-8">
            <!-- Welcome Message -->
            <div class="p-6">
                <h1 class="text-4xl font-bold text-white">Welcome Fulan!</h1>
                <p class="text-lg text-white mt-2">Hope You Have a Wonderful Day</p>
            </div>

            <!-- Placement Test Reminder -->
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-fit">
                <h2 class="text-lg font-bold text-slate-900 mb-2">Please Finish Your Placement Test</h2>
                <p class="text-sm text-slate-600">The purpose of the test is to determine your level</p>
            </div>
        </div>
    </div>

    <div class="p-8 md:p-20">
        <!-- Progress Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Progress Card -->
            <div class="p-6 bg-indigo-700 text-white rounded-lg shadow-md">
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
            <div class="p-6 bg-white rounded-lg shadow-md">
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