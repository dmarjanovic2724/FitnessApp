@extends('layouts.layout')


@section('content')

<div class="container-fluid">
    <h1 class="text-center mt-4">Hi user</h1>
    @if (Session::get('fail'))
    <div class="alert alert-danger">
     {{ Session::get('fail') }}
   </div>
    @elseif (Session::get('success'))
    <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
    @endif
    <div class="row">  
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Create new booking
                </a>
                <a class="nav-item nav-link " href="{{ route('exerciseList') }}">Exercises <span class="visually-hidden"></span></a>
                <a class="nav-item nav-link " href="{{ route('program.list') }}">Programs <span class="visually-hidden"></span></a>
              </div>
        </div>     
        
    </div>
</div>


    
@endsection