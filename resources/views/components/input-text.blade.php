@props(['textReguler' => false, 'textArea' => false, 'model', 'type', 'section', 'errors'])

<div class="w-full" x-show="{{ $section }}">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    @if ($textReguler || $textArea)
        @if ($textReguler)
            <input type="{{ $type }}"
                wire:model="{{ $model }}"
                name="{{ $model }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400 {{ ($type == 'number') ? 'appearance-none [&::-webkit-inner-spin-button]:hidden [&::-webkit-outer-spin-button]:hidden' : '' }}"
                placeholder="{{ $slot }}" required="true" />

            @if($errors[$model] ?? false)
                <p class="mt-2 text-sm text-red-600">{{ $errors[$model][0] }}</p>
            @endif
        @endif
        @if ($textArea)
            <textarea
                wire:model="{{ $model }}"
                name="{{ $model }}"
                class="min-h-28 items-start bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400"
                placeholder="{{ $slot }}" required="true" ></textarea>

            @if($errors[$model] ?? false)
            <p class="mt-2 text-sm text-red-600">{{ $errors[$model][0] }}</p>
            @endif
        @endif
    @endif
</div>
