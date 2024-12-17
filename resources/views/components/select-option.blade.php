@props(['options' => [], 'section', 'model', 'errors', 'type' => null])

<div class="w-full" x-show="{{ $section }}">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    <select wire:model="{{ $model }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option value="">Pilih {{ str_replace('_', ' ', $model) }} </option>
        @if ($type == "pembayaran")
            @foreach ($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        @else
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        @endif
    </select>
    @if($errors[$model] ?? false)
        <p class="mt-2 text-sm text-red-600">{{ $errors[$model][0] }}</p>
    @endif
</div>
