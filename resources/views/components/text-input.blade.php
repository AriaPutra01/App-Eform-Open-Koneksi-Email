@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}     {!! $attributes->merge(['class' => 'bg-gray-100 border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm']) !!}>
