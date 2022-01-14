@extends('layouts.layout')

@section('content')

<?php 
$i=1;
?>

<div class="container">
  <h2 class="text-center mt-3 mb-2">Edit {{ $program->programName }} program</h2>
    <div class="row">
      <div class="col-md-12">  
        {{-- name and method record --}}
        <form action="{{ route('programUpdate',$program->id) }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-4 offset-md-4">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{{ $message }}</strong>
              </div>               
              @endif
              <div class="input-group mb-3">
                <span class="input-group-text">Create program name</span>
                <input type="text" name="programName" value="{{ $program->programName }}"  class="form-control"  aria-describedby="helpId">
                <span class="input-group-text">@error('programName') {{ $message }}  @enderror</span> 
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text">Create program method</span>
                <input type="text" name="methods" value="{{ $program->methods }}" class="form-control"  aria-describedby="helpId">
                <span class="input-group-text">@error('methods') {{ $message }}  @enderror</span> 
              </div>
              <button type="submit" class="btn btn-block btn-primary mb-3">Update program</button>
             </div>
            </div>
          </div>
          <div class="col-md-4 offset-md-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Current exercises in program</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exercise as $item)
                    <tr>                       
                        <td>                           
                          {{ $i++ }}. {{ $item->name }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
            
           {{-- table list --}}
        <h1>Pick up exercise from list</h1>
        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($exerciseList as $item)
                <tr>                
                    <td><input type="checkbox" name="selected[]" value="{{ $item->id }}" 
                        @foreach ($exercise as $id)
                            @if ( $item->id  ==  $id->id)
                                 CHECKED                        
                            @endif 
                        @endforeach
                    ></td>                    
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td><a href="{{ asset('exercises/'.$item->image) }}" target="_blank">{{ $item->image }}</a></td>
                </tr>
                @endforeach
            </form>
            </tbody>
        </table> 
      </div>
    </div>
</div>
@endsection