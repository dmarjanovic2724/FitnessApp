@extends('layouts.layout')

@section('content')
<?php 
$method=$methods;
$i=1;
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">          
        <h2 class="text-center">{{ $programName }}</h2>
        <table class="table table-light table-striped table-hover">
            <thead>
                <tr>
                    <th>Num.</th>
                    <th>Name</th>
                    <th>Method</th> 
                    <th>Description</th>
                                             
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
              <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $item->name }}</td>                  
                  <td>
                  @if ($method == "level_1")
                     {{ $item->level_1 }}
                     @elseif ($method == "level_2")
                     {{ $item->level_2 }}
                     @elseif ($method == "level_3")
                     {{ $item->level_3 }}
                  @endif
                </td>
                <td>{{ $item->description }}</td>
                <td><a href="{{ asset('exercises/'.$item->image) }}" target="_blank">{{ $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',$item->image);  }}</a></td>
                
                </tr>
               
                @endforeach                
        </table> 
        <h2>{{ ucfirst($methods) }}</h2>
      </div>
    </div>
</div>
@endsection