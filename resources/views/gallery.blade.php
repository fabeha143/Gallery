@extends('layouts.master2')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Gallery</a>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (count($category) > 0)
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @foreach ($category as $list)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('gallery.show', ['id' => $list->id]) }}">{{ $list->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</div>

    @isset($photoget)
        <div style="width:100%;  height:100vh;">
            <div class="container">
                <div style="display: flex; width:100%; margin-top:100px;">
                @foreach($photoget as $items)
                        <div style="width:33%; height:300px; justify-content:space-between; align-items:center; width:33%;"><img src="{{asset('images/'.$items->image)}}" alt="{{ $items->img_alt}}" style="width: 300px;"></div>
                @endforeach
                    </div>
            </div>
    @endisset
        </div>
@endsection



