<div x-show="activityReading" :class="isSidebarOpen ? 'col-span-full lg:col-span-8' : 'col-span-full lg:col-span-8'" class="w-full h-full">
    @if ($activity)
        <x-murid.layout-course-lesson
            title="{{ $activity->judul }}"
            type="{{ $activity->type }}"
            text="{{ $activity->text }}"
        >
        </x-murid.layout-course-lesson>
    @else
        <div class="text-center">
            <p class="text-gray-500">Tidak ada aktivitas yang tersedia.</p>
        </div>
    @endif
</div>
