<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-verde-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
