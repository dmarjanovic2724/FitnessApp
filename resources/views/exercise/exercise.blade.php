@extends('layouts.layout')

@section('content')
    .<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Exercise database</h2>
                <a class="btn btn-block btn-primary mb-3" href="{{ route('addNewExerciseView') }}">Add new Exercise</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->description }}</td>
                                <td><a href="{{ asset('exercises/' . $item->image) }}"
                                    target="_blank">{{ $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $item->image) }}</a>
                                </td>
                                <td><a href="{{ route('exerciseEdit', $item->id) }}">edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
