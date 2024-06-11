<div class="relative">
    <input
        {{ $attributes->merge(['class' => 'block w-full px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-indigo-500 focus:ring-indigo-500 focus:bg-white focus:outline-none']) }}
        placeholder=" "
    />
    <label class="absolute top-0 left-0 px-4 py-3 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">
        {{ $label }}
    </label>
</div>