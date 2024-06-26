@extends('backend::layouts.base.master.index')

@section('content')
    <div class="row row-cards">
        @foreach ($plugins as $plugin)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <span class="avatar avatar-lg"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                            </div>

                            <div class="col">
                                <h4 class="card-title m-0">
                                    <a href="#">{{ $plugin->get('name') }}</a>
                                    <a href="#">{{ $plugin->getDisplayName() }}</a>
                                </h4>
                                <div class="text-muted">
                                    Working in Tabler
                                </div>
                                <div class="small mt-1">
                                    <span class="badge bg-green"></span> {{ $plugin->isEnabled() ? 'active' : 'inactive' }}
                                </div>
                            </div>
                            @if ($plugin->isEnabled())
                                <div class="col-auto">
                                    <form action="{{ route('admin.backend.plugin.deactivate') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plugin" value="{{ $plugin->get('name') }}">
                                        <button class="btn" type="submit">Deactivate</button>
                                    </form>
                                </div>
                            @else
                                <div class="col-auto">
                                    <form action="{{ route('admin.backend.plugin.activate') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plugin" value="{{ $plugin->get('name') }}">
                                        <button class="btn" type="submit">Activate</button>
                                    </form>
                                </div>

                                <div class="col-auto">
                                    <form action="{{ route('admin.backend.plugin.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plugin" value="{{ $plugin->get('name') }}">
                                        <button class="btn" type="submit">Delete</button>
                                    </form>
                                </div>
                            @endif
                            {{-- 
                            <div class="col-auto">
                                <a href="#" class="btn">
                                    Delete
                                </a>
                            </div> --}}


                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a href="#" class="dropdown-item">Import</a>
                                        <a href="#" class="dropdown-item">Export</a>
                                        <a href="#" class="dropdown-item">Download</a>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{-- <p>{{ $plugin->get('name') }}</p>
    <p>{{ $plugin->isEnabled() ? 'active' : 'inactive' }}</p> --}}




    {{-- activate the plugin --}}
    {{-- <form action="{{ route('backend.plugin.activate') }}" method="post">
        @csrf
        <input type="hidden" name="plugin" value="{{ $plugin->get('name') }}">
        <button type="submit">Activate Plugin</button>
    </form>

    <form action="{{ route('backend.plugin.deactivate') }}" method="post">
        @csrf
        <input type="hidden" name="plugin" value="{{ $plugin->get('name') }}">
        <button type="submit">Deactivate Plugin</button>
    </form> --}}

    {{-- @include('backend::layouts.base.widgets.page_title', ['title' => 'Plugin Management'])

    @include('backend::layouts.base.widgets.tabs', [
        'tabs' => [
            'List' => [
                'link' => route('backend.plugin.index'),
                'icon' => 'la la-list',
                'active' => true,
            ],
            'Create' => [
                'link' => route('backend.plugin.create'),
                'icon' => 'la la-plus',
            ],
        ],
    ])

    @include('backend::layouts.components.alerts')

    @include('backend::plugin.components.table', ['plugins' => $plugins]) --}}
@endsection
