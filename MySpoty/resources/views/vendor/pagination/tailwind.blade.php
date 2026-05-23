@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navegación de páginas" class="flex items-center justify-center mt-8">
        <div class="flex items-center gap-1 flex-wrap">

            {{-- Página anterior --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 rounded text-sm cursor-not-allowed opacity-40 sp-pagina">
                    ← Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="px-3 py-2 rounded text-sm transition sp-pagina">
                    ← Anterior
                </a>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm sp-pagina-punto">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $pagina => $url)
                        @if ($pagina == $paginator->currentPage())
                            <span class="px-3 py-2 rounded text-sm sp-pagina-activa">
                                {{ $pagina }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-2 rounded text-sm transition sp-pagina">
                                {{ $pagina }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Página siguiente --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="px-3 py-2 rounded text-sm transition sp-pagina">
                    Siguiente →
                </a>
            @else
                <span class="px-3 py-2 rounded text-sm cursor-not-allowed opacity-40 sp-pagina">
                    Siguiente →
                </span>
            @endif

        </div>
    </nav>
@endif
