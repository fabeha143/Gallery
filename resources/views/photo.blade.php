@extends('layouts.master')

@section('content')

@if(Auth::user())
<div class="container">
    <a href="{{ route('photo.create')}}" class='btn btn-large btn-danger openbutton'style="margin-bottom: 36px; float:right; margin-top:20px;">Add Photo</a>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Id</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Image</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Category</th>
                <th scope="col" style="text-align:center; border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($photo))
                @foreach($photo as $list)

                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->id}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->image}}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align:center;">{{ $list->category->name}}</td>
                        <td style="width: 20%;">
                        {!! Form::open(array('url' => route('photo.edit', ['photo' => $list->id]), 'method' => 'get' ,)) !!}		
                            {!! Form::submit('Edit', array('class' => 'btn btn-large btn-primary openbutton','style'=> 'float:left; margin-right:10px;' )) !!}
                         {!! Form::close() !!}
                        
                         {!! Form::open(array('url' => route('photo.destroy', ['photo' => $list->id]), 'method' => 'delete' , 'style'=> 'margin-left:10px;')) !!}		
                            {!! Form::submit('Delete', array('class' => 'btn btn-large btn-primary openbutton','style'=> 'float:left;')) !!}
                    
                         {!! Form::close() !!}
                        
                        </td>
                            
                        
                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="4">No data found!!</td>
            </tr>
            @endif
        
        </tbody>
    </table>
    </div>

    @endsection()
    
@endsection()