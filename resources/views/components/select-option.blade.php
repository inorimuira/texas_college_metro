@props(['options' => [], 'section', 'model', 'errors'])

<div class="w-full" x-show="{{ $section }}">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    <select wire:model="{{ $model }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option>Pilih {{ str_replace('_', ' ', $model) }} </option>
        @foreach($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>
    @if($errors[$model] ?? false)
        <p class="mt-2 text-sm text-red-600">{{ $errors[$model][0] }}</p>
    @endif
</div>
