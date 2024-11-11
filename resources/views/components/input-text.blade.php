@props(['textReguler' => false, 'textArea' => false, 'model', 'type', 'section'])

<div class="w-full" x-show="{{ $section }}">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    @if ($textReguler || $textArea)
        @if ($textReguler)
            <input type="{{ $type }}"
                wire:model="{{ $model }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"
                placeholder="{{ $slot }}" required="true" />
            @error($model)
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        @endif
        @if ($textArea)
            <textarea
                wire:model="{{ $model }}"
                class="min-h-28 items-start bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"
                placeholder="{{ $slot }}" required="true" ></textarea>
            @error($model)
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        @endif
    @endif
</div>
