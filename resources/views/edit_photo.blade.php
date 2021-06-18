@extends('layouts.master')

@section('content')

<div class="container">
    {!! Form::open(array('url' => route('photo.update', ['photo' => $photoedit->id,  'edit_photo' => $edit_photo]), 'method' => 'put', 'enctype' => 'multipart/form-data')) !!}	
	
    <div>
        {{ Form::label('img_alt','Alternate Name',['style' => 'margin-top:70px; margin-bottom:10px;']) }}
    </div>
        {!! Form::text('img_alt', $photoedit->img_alt , array('class' => 'form-control','style' => 'width:500px; margin-bottom:20px; ')) !!}
    <div>
        {{ Form::label('image','Image') }}
        <div class="mb-3" style="width: 20%;">
            {{ Form::file('image') }}
        </div>
        {{ Form::label('category_id','Category') }}
        {{ Form::select('category_id',$edit_photo , ['style' => 'padding:500px;  width:260px; margin:bottom:20px'])}}
    </div>
		{{ Form::submit('Edit',array('class' => 'btn btn-large btn-primary openbutton','style' => 'width:500px; margin-top:40px;')) }}

	{{ Form::close() }}
</div>

@endsection()