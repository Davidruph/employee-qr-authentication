@props(['id', 'name', 'options' => [], 'selected' => null])

<select id="{{ $id }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
    <option value="">-- Select --</option>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
