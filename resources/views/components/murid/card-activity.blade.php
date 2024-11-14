@props([
    'type' => ['course', 'placement']
])

<div class="p-4 bg-gray-100 rounded-lg ">
    <h4 class="text-base font-bold">Studied</h4>
    @if ($type === 'course')
        <p class="text-gray-600 text-sm">Complete past tense course</p>
    @endif
    @if ($type === 'placement')
        <p class="text-gray-600 text-sm">Right now you haven’t complete placement test</p>
    @endif
</div>
