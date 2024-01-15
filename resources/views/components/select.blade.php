<select {!! $attributes->merge(['class' => 'border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500']) !!}>
    {{ $slot }}
</select>
