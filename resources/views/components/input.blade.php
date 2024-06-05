@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gris-300 focus:border-verde-500 focus:ring-verde-500 rounded-md shadow-sm']) !!}>
