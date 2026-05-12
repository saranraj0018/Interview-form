@props(['route' => '', 'icon' => 'fa fa-home', 'name' => 'Dashboard', 'trigger' => false])

@php
    $isActive = $route && request()->routeIs($route);
@endphp

<li class="w-full">
    @if ($route)
        <a href="{{ route($route) }}"
           class="flex items-center gap-2 px-4 py-2 mx-2 rounded-lg transition
                  {{ $isActive
                        ? 'bg-white text-[#ea2498]'
                        : 'text-white hover:bg-white hover:text-[#ea2498]' }}">

            <i class="fa {{ $icon }} w-5"></i>
            <span>{{ $name }}</span>

            @if ($trigger)
                <i class="fa fa-chevron-down w-5"></i>
            @endif
        </a>
    @else
       <button type="submit"
                class="flex items-center gap-2 px-4 py-2 mx-2 rounded-lg transition
                       {{ $isActive
                            ? 'bg-white text-[#ea2498]'
                            : 'text-white hover:bg-white hover:text-[#ea2498]' }}">

            <i class="fa {{ $icon }} w-5"></i>
            <span class="flex-1 text-left">{{ $name }}</span>

            @if ($trigger)
                <i class="fa fa-chevron-down w-5"></i>
            @endif
        </button>
    @endif
</li>
