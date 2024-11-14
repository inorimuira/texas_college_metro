@props(['options' => [], 'section', 'model', 'errors'])

<div class="w-full" x-show="{{ $section }}">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    <select wire:model="{{ $model }}" required class="w-full border border-gray-300 rounded-lg text-slate-800">
        <option value="">Pilih Hari</option> <!-- Opsi default -->
        @foreach($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>
    @if($errors[$model] ?? false)
        <p class="mt-2 text-sm text-red-600">{{ $errors[$model][0] }}</p>
    @endif
</div>
