@props(['option1', 'option2'])

<div class="w-full">
    <label for="first_name"
        class="block mb-2 text-sm font-medium text-gray-900 after:content-['*'] after:ml-0.5 after:text-red-500">{{ $slot }}</label>
    <select name="" required class="w-full border border-gray-300 rounded-lg text-slate-400">
        <option selected>{{ $option1 }}</option>
        <option>{{ $option2 }}</option>
    </select>
</div>
