@extends('layouts.layout')


@section('content')

<div class="container-fluid">
          <h1 class="text-center mt-4">hi admin</h1>
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

        {{-- programs Model --}}

        <form action="{{ route('createPlan') }}" method="POST">
          @csrf
              <div class="col-md-3">
                <h1>Plans</h1>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Programs</label>
                  </div>
                  <select name="selecProg" class="custom-select" id="inputGroupSelect01">
                    <option >Choose...</option>
                    {{-- @foreach ($programModel as $item)
                    <option  value="{{ $item->id }}">{{ $item->programName }}</option>
                    @endforeach --}}
                  </select>
                </div>


              </div> 

      {{-- users --}}
              <div class="col-md-3">
                <h1>Plans</h1>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Users</label>
                </div>
                <select name="selectUser" class="custom-select" id="inputGroupSelect01">
                  <option >Choose...</option>
                  {{-- @foreach ($users as $item)
                  <option  value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach --}}
                </select>
              </div>
            </div> 
            <button type="submit" class="btn btn-block btn-primary mb-3">Save</button>
      </form>
          </div>



          {{--section list  --}}

          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($users as $item)
                    
                
                <td scope="row"></td>
                <td><a href="{{ route('userPlan', $item->id) }}">{{ $item->name }}</a></td>
                <td>{{ $item->completed }}</td>
              </tr>
              @endforeach
              <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          
        


          {{-- <div class="row">
            <div class="col-md-12">
              <ul class="list-group">
                @foreach ($users->program as $item)
                    
                
                <li class="list-group-item active">{{ $item->programName }}</li>
                <li class="list-group-item">{{ $users->name }}</li>
                <li class="list-group-item disabled">Disabled item</li>
                @endforeach
              </ul>
            </div>
          </div> --}}
</div>



@endsection