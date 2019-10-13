@extends('user.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h1><strong>Pencarian barang hilang</strong></h1>
            <p>Pencarian barang jadi lebih mudah dan aman dengan menggunakan website kami</p>
            <form
                @if(request()->query('type', null) === 'lost' || is_null(request()->query('type', null)))
                action="{{ route('user.lost.others.list') }}"
                @else
                action="{{ route('user.founds.others.list') }}"
                @endif

                method="GET">

                <input type="text" name="keyword" class="form-control" placeholder="Cari barang hilang di sini .....">
            </form>
        </div>
        <div class="col-md-12 text-center text-center mt-5">
            <a class="btn @if(request()->query('type') === 'lost' || is_null(request()->query('type', null))) btn-success @else btn-outline-success @endif" href="{{ route('user.index', ['type' => 'lost']) }}">Barang kehilangan</a>
            <a class="btn @if(request()->query('type') === 'found') btn-success @else btn-outline-success @endif" href="{{ route('user.index', ['type' => 'found']) }}">Barang Temuan</a>
        </div>
    </div>

    <div class="row text-center mt-5">
        @if(request()->query('type', null) === 'lost' || is_null(request()->query('type', null)))
        @foreach ($categories as $category)
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">
                <a href="{{ route('user.lost.others.list', array_merge(['category' => $category->name], request()->query())) }}">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa {{ $category->font_awesome_icon_class_name }} fa-5x"></i>
                            <h3 class="card-title mt-2">{{ __('categories.' . $category->name) }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        @endif

        @if(request()->query('type') === 'found')
        @foreach ($categories as $category)
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">
                <a href="{{ route('user.founds.others.list', array_merge(['category' => $category->name], request()->query())) }}">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa {{ $category->font_awesome_icon_class_name }} fa-5x"></i>
                            <h3 class="card-title mt-2">{{ __('categories.' . $category->name)  }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        @endif
    </div>
@endsection