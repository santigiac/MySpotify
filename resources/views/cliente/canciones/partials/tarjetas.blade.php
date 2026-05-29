@if ($canciones->isEmpty())
    <div class="col-span-full text-center py-20">
        <p class="text-lg font-semibold sp-gris">No se encontraron canciones.</p>
    </div>
@else
    @foreach ($canciones as $cancion)
        <a href="{{ route('canciones.mostrar', $cancion) }}"
           class="block rounded-lg p-4 transition hover:scale-105 sp-tarjeta">

            {{-- Portada --}}
            <div class="w-full aspect-square rounded mb-4 overflow-hidden sp-placeholder-img">
                @if ($cancion->album_cover)
                    <img src="{{ asset('storage/' . $cancion->album_cover) }}"
                         alt="Portada de {{ $cancion->name }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none"
                             viewBox="0 0 24 24" stroke="#535353" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2
                                     1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2
                                     1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <p class="text-white text-sm font-bold truncate">{{ $cancion->name }}</p>
            <p class="text-sm truncate mt-1 sp-gris">{{ $cancion->artist }}</p>
            @if ($cancion->genero)
                <p class="text-xs mt-1 sp-tenue">{{ $cancion->genero->name }}</p>
            @endif

        </a>
    @endforeach
@endif
