@php
    use \Illuminate\Support\Facades\Route;
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Navigasi barang</strong>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item @if(Route::current()->getName() === 'user.lost.my.list' || Route::current()->getName() === 'user.lost.others.list') active @endif">
                    @if(Route::current()->getName() === 'user.founds.my.list' || Route::current()->getName() === 'user.lost.my.list')
                        <a href="{{ route('user.lost.my.list', request()->query()) }}">Barang hilang</a>
                    @else
                        <a href="{{ route('user.lost.others.list', request()->query()) }}">Barang hilang</a>
                    @endif
                </li>
                <li class="list-group-item @if(Route::current()->getName() === 'user.founds.my.list' || Route::current()->getName() === 'user.founds.others.list') active @endif">
                    @if(Route::current()->getName() === 'user.founds.my.list' || Route::current()->getName() === 'user.lost.my.list')
                        <a href="{{ route('user.founds.my.list', request()->query()) }}">Barang temuan</a>
                    @else
                        <a href="{{ route('user.founds.others.list', request()->query()) }}">Barang temuan</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <strong>Kategori barang</strong>
            </div>
            <ul class="list-group list-group-flush">
                @if(Route::current()->getName() === 'user.founds.my.list')
                    <li class="list-group-item @if(!request()->query('category')) active @endif"><a href="{{ route('user.founds.my.list', ['keyword' => request()->query('keyword')]) }}">Semua kategori</a></li>
                    @foreach($categories as $category)
                        <li class="list-group-item @if(request()->query('category') === $category->name) active @endif"><a href="{{ route('user.founds.my.list', ['category' => $category->name, 'keyword' => request()->query('keyword')]) }}">{{ __('categories.' . $category->name)  }}</a></li>
                    @endforeach
                @endif

                @if(Route::current()->getName() === 'user.founds.others.list')
                        <li class="list-group-item @if(!request()->query('category')) active @endif"><a href="{{ route('user.founds.others.list', ['keyword' => request()->query('keyword')]) }}">Semua kategori</a></li>
                    @foreach($categories as $category)
                        <li class="list-group-item @if(request()->query('category') === $category->name) active @endif"><a href="{{ route('user.founds.others.list', ['category' => $category->name, 'keyword' => request()->query('keyword')]) }}">{{ __('categories.' . $category->name)  }}</a></li>
                    @endforeach
                @endif

                @if(Route::current()->getName() === 'user.lost.my.list')
                        <li class="list-group-item @if(!request()->query('category')) active @endif"><a href="{{ route('user.lost.my.list', ['keyword' => request()->query('keyword')]) }}">Semua kategori</a></li>
                    @foreach($categories as $category)
                        <li class="list-group-item @if(request()->query('category') === $category->name) active @endif"><a href="{{ route('user.lost.my.list', ['category' => $category->name, 'keyword' => request()->query('keyword')]) }}">{{ __('categories.' . $category->name)  }}</a></li>
                    @endforeach
                @endif

                @if(Route::current()->getName() === 'user.lost.others.list')
                        <li class="list-group-item @if(!request()->query('category')) active @endif"><a href="{{ route('user.lost.others.list', ['keyword' => request()->query('keyword')]) }}">Semua kategori</a></li>
                    @foreach($categories as $category)
                        <li class="list-group-item @if(request()->query('category') === $category->name) active @endif"><a href="{{ route('user.lost.others.list', ['category' => $category->name, 'keyword' => request()->query('keyword')]) }}">{{ __('categories.' . $category->name)  }}</a></li>
                    @endforeach
                @endif

            </ul>
        </div>
    </div>
</div>