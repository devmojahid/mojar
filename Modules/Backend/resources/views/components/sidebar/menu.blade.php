@props(['item'])
<li class="nav-item @if ($item->hasChildren()) dropdown @endif">
    <a class="nav-link @if ($item->hasChildren()) dropdown-toggle @endif" href="{{ $item->get('url', '#') }}"
        @if ($item->hasChildren()) data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" @endif>
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            @if ($item->get('icon'))
                {!! $item->get('icon') !!}
            @endif
        </span>
        <span class="nav-link-title">
            {{ $item->get('title') }}
        </span>
    </a>

    @if ($item->hasChildren())
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">
                    @foreach ($item->getChildrens() as $child)
                        {{-- {{ $child->get('title') }} --}}
                        {{-- <x-backend::sidebar.menu :item="$child" /> --}}
                        <x-backend::sidebar.menu :item="$child" />
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</li>
