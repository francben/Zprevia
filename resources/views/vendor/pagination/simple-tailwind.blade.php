@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col items-center justify-between p-4 bg-white border rounded-lg">
        <div class="text-sm text-gray-700">
            <p>
                Mostrando 
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                de 
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                resultados.
            </p>
        </div>

        <div class="flex justify-center mt-2 space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l cursor-default leading-5">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" class="px-4 py-2 text-sm font-medium text-white bg-green-800 border border-green-800 rounded-l leading-5 hover:bg-green-900 focus:outline-none focus:ring ring-gray-300 focus:border-green-900 active:bg-green-900 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="px-4 py-2 text-sm font-medium text-white bg-green-800 border border-green-800 cursor-default leading-5">{{ $page }}</span>
                        @else
                            <button wire:click="gotoPage({{ $page }})" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-green-800 leading-5 hover:bg-green-900 focus:outline-none focus:ring ring-gray-300 focus:border-green-900 active:bg-green-900 transition ease-in-out duration-150">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" class="px-4 py-2 text-sm font-medium text-white bg-green-800 border border-green-800 rounded-r leading-5 hover:bg-green-900 focus:outline-none focus:ring ring-gray-300 focus:border-green-900 active:bg-green-900 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <span class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r cursor-default leading-5">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="mt-2 text-sm text-gray-700">
            <p>
                Total resultados: 
                <span class="font-medium">{{ $paginator->total() }}</span>
            </p>
        </div>
    </nav>
@endif
