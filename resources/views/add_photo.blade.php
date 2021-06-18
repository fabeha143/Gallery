@extends('layouts.master')

@section('content')
<div class="container">
    {{ Form::open(array('route' => 'photo.store' , 'method' => 'POST' , 'enctype' => 'multipart/form-data')) }}
        <div>
            {{ Form::label('img_alt','Alternate Name',['style' => 'margin-top:70px; margin-bottom:10px;']) }}
        </div>
        {!! Form::text('img_alt', 'Alternate Name',array('class' => 'form-control','style' => 'width:500px; margin-bottom:20px; ')) !!}
        <div class="mb-3" style="width: 20%;">
            {{ Form::file('image',array('files'=> true))}}
        </div>
        <div>
            
            {{ Form::label('category_id','Category') }}
            {!! Form::select('category_id',$categories , ['style' => 'padding:500px;  width:260px; margin:bottom:20px']) !!}
        </div>
    {{ Form::submit('Add',array('class' => 'btn btn-large btn-primary openbutton','style' => 'width:500px; margin-top:40px; '))}}

{{ Form::close() }}
</div>
@endsection()