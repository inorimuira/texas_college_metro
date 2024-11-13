@props(['model', 'section'])
<div class="w-full" x-show="{{ $section }}">
    <label for="{{ $model }}" class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    <input type="date" wire:model="{{ $model }}" name="{{ $model }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-slate-400" placeholder="{{ $slot }}" required />
</div>
