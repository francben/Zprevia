<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex justify-center items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 h-12 w-40 place-self-center']) }}>
    {{ $slot }}
</button>
