<a {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer inline-flex justify-center items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-verde-600 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
