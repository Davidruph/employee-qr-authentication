@props(['id', 'name', 'rows' => 4, 'value' => ''])

<textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
    {{ old($name, $value) }}
</textarea>
