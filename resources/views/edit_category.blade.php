@extends('layouts.master')

@section('content')
<div class="container">
{!! Form::open(array('url' => route('category.update', ['category' => $categoryedit->id]), 'method' => 'put')) !!}

            {{ Form::label('name','Name' ,['style' => 'margin-top:70px; margin-bottom:10px;']) }}
            <div class="mb-3" style="width: 20%;">
			{!! Form::text('name',  $categoryedit->name ,array('class' => 'form-control' ,'style' => 'width:500px; margin-bottom:20px; ')) !!}
			{!! Form::submit('Edit',array('class' => 'btn btn-large btn-primary openbutton','style' => 'width:500px; margin-bottom:10px; ')) !!}
	
	{!! Form::close() !!}
	</div>
@endsection()