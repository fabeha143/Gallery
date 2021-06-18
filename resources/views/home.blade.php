@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/home')}}"  style="display: block; padding:10px; background-color:blue; color:white; margin-left:10px; margin-top:10px; width:130px; text-align:center;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index')}}" style="display: block; padding:10px; background-color:blue; color:white; margin-left:10px; margin-top:10px; width:130px; text-align:center;">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo.index')}}"  style="display: block; padding:10px; background-color:blue; color:white; margin-left:10px; margin-top:10px; width:130px; text-align:center;">Photos</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
