@extends('layouts.layout')

@section('content')
.<div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h2 class="text-center">Workout programs:</h2>
       <div>
           <a href="{{ route('adminDashboard') }}">Go back</a>
       </div>
        <table class="table table-light table-striped table-hover ">
            <thead>
                <tr>
                    <th>Program Name:</th>  
                    <th>Status</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($userPlan as $item)
                <tr>
                    <td><a href="{{ route('program', $item->id ) }}">{{ $item->programName }}</a></td>
                    <td>{{ $item->pivot_completed }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        <a class="btn btn-primary mt-2 mb-2 d-flex justify-content-center" href="{{ route('program.create')}}">Create new workout program</a>
        
      </div>
    </div>
</div>
@endsection