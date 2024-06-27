@extends('backend::layouts.base.master.index')

@section('content')
    <div class="row row-cards">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <span class="avatar avatar-lg" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        </div>

                        <div class="col">
                            <h4 class="card-title
                                m-0">
                                <a href="#">Plugin Name</a>
                                <a href="#">Plugin Display Name</a>

                            </h4>
                            <div class="text-muted
                                ">
                                Working in Tabler
                            </div>
                            <div class="small mt-1">
                                <span class="badge bg-green"></span> active
                            </div>
                        </div>
                        <div class="col-auto">
                            <form action="{{ route('admin.backend.plugin.deactivate') }}" method="post">
                                @csrf
                                <input type="hidden" name="plugin" value="Plugin Name">
                                <button class="btn" type="submit">Deactivate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
