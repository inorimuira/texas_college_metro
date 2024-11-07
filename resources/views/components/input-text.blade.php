@props(['textReguler' => false, 'textArea' => false])

<div class="w-full">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    @if ($textReguler || $textArea)
        @if ($textReguler)
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"
                placeholder="{{ $slot }}" required />
        @endif
        @if ($textArea)
            <textarea type="text"
                class="min-h-28 items-start bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"
                placeholder="{{ $slot }}" required ></textarea>
        @endif
    @endif
</div>
