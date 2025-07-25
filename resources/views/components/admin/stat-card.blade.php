@props(['title', 'value', 'color' => 'blue'])

<div class="p-4 bg-white border-l-4 border-{{ $color }}-500 shadow rounded">
    <p class="text-sm text-gray-500">{{ $title }}</p>
    <p class="text-2xl font-bold text-{{ $color }}-600">{{ $value }}</p>
</div>