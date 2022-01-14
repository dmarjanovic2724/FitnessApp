@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2 class="text-center mt-3 mb-2">Choose exercise and make workout funny</h2>
        <div class="row">
            <div class="col-md-12">

                {{-- name and method record --}}
                <form action="{{ route('record.program') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @elseif (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                            <div class="input-group mb-3">
                                <span class="input-group-text">Create program name</span>
                                <input type="text" name="programName" class="form-control" aria-describedby="helpId">
                                <span class="input-group-text">@error('programName') {{ $message }} @enderror</span>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Create program method</span>
                                <input type="text" name="methods" class="form-control" aria-describedby="helpId">
                                <span class="input-group-text">@error('methods') {{ $message }} @enderror</span>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-3">Create program</button>

                        </div>
                    </div>
            </div>

            {{-- table list --}}
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
                    @foreach ($data as $item)
                        <tr>
                            <td><input type="checkbox" name="selected[]" value="{{ $item->id }}"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><a href="{{ asset('exercises/' . $item->image) }}" target="_blank">{{ $item->image }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
