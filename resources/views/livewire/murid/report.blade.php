<div class="bg-gradient-to-r from-indigo-100 to-pink-100 min-h-screen overflow-hidden">
    {{-- Navbar --}}
    <x-murid.navigation></x-murid.navigation>
    <div class="mt-20 w-full p-4 md:px-6 xl:px-20 space-y-3">
        <div class="w-full flex flex-col md:flex-row md:items-center justify-between bg-primary-1100 px-3 py-2 md:px-4 md:py-3 lg:px-12 lg:py-8 rounded-lg">
            <div class="flex flex-col">
                <span class="text-xl lg:text-2x font-bold text-highlight">Certificate</span>
                <span class="text-base font-medium text-white">This is a certificate of this semester</span>
            </div>
            <div class="flex">
                <button type="button" class="p-3 bg-highlight rounded-lg text-sm font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                        viewBox="0 0 512 512">
                        <path fill="#000"
                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                    </svg>
                    Download
                </button>
            </div>
        </div>
        <div class="bg-slate-50 flex flex-col gap-8 px-3 py-2 md:px-4 md:py-3 lg:px-12 lg:py-8 rounded-lg">
            <div class="col-span-4 flex flex-col">
                <span class="text-xl lg:text-2xl font-bold">Report</span>
                <span class="text-base font-medium text-slate-500">
                    This is a report of this semester</span>
            </div>
            <table class="w-full text-center table-auto">
                <thead>
                    <tr class="border-t border-t-slate-400">
                        <th class="py-2 px-4 border-b border-slate-400">Chapter (module)</th>
                        <th class="py-2 px-4 border-b border-slate-400">Post Test Grade</th>
                        <th class="py-2 px-4 border-b border-slate-400">Date</th>
                        <th class="py-2 px-4 border-b border-slate-400">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @foreach ($item->modules as $module)
                            <tr>
                                <td class="py-2 px-4 border-b border-slate-400">{{ $item->nama_chapter }} ({{ $module->nama_module }})</td>
                                <td class="py-2 px-4 border-b border-slate-400 text-slate-500">{{ $module->recordCourse->first()?->score ?? '-' }}</td>
                                <td class="py-2 px-4 border-b border-slate-400 text-slate-500">{{ $module->presensiRecord->first()?->created_at }}</td>
                                <td class="py-2 px-4 border-b border-slate-400">
                                    @if ($module->presensiRecord->first()?->status == 1)
                                    <span class="px-3 py-1 rounded-full bg bg-green-200 text-green-800 text-xs">
                                        Present
                                    </span>
                                    @else
                                    <span class="px-3 py-1 rounded-full bg bg-slate-300 text-slate-800 text-xs">
                                        Absence
                                    </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
