<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    <!-- Navbar -->
    <x-murid.navigation></x-murid.navigation>

    <!-- Dashboard Content -->
    <div class="mt-20 bg-gradient-to-r from-blue-800 to-purple-900">
        <div class="w-full p-8 md:px-20 md:py-8">
            <!-- Welcome Message -->
            <div class="p-6">
                <h1 class="text-4xl font-bold text-white">Welcome Fulan!</h1>
                <p class="text-lg text-white mt-2">Hope You Have a Wonderful Day</p>
            </div>

            <!-- Placement Test Reminder -->
            <x-murid.hero-content type="placement" placementTestDone="false"></x-murid.hero-content>
        </div>
    </div>

    <div class="p-8 md:p-20">
        <!-- Progress Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <x-murid.card-progress type="placement" placementTestDone="false" percentage="38"></x-murid.card-progress>

            <!-- Learning Activity Section -->
            <div class=" bg-white rounded-lg shadow-md">
                <span class="inline-flex items-center mb-4 gap-2 p-6 w-full border-b-[1px]">
                    <x-icon icon="iconLearningActivity"></x-icon>
                    <h3 class="text-xl font-bold">Learning Activity</h3>
                </span>
                <div class="space-y-4 px-6">
                    <!-- Activity Card -->
                    <x-murid.card-activity type="placement"></x-murid.card-activity>
                    <x-murid.card-activity type="placement"></x-murid.card-activity>
                    <div class="text-right text-blue-500 pb-4">
                        <button class="text-sm font-semibold">More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
