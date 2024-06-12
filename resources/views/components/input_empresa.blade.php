@props(['disabled' => false, 'label' => ''])

<div class="relative w-full max-w-xs">
    <label for="{{ $attributes->get('id') }}" class="absolute -top-2 left-0 bg-white w-full px-1 text-xs text-gray-600 transition-all duration-200">{{ $label }}</label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md  block w-full px-4 py-2 text-gray-900 placeholder-transparent border-b border-gray-300 focus:outline-none focus:border-verde-800 focus:ring-1 focus:ring-verde-800 focus:border transition-all duration-200']) !!}>
</div>
