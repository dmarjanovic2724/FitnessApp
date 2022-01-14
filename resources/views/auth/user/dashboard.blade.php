@extends('layouts.layout')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center mt-4">Hi {{  session('name') }}</h1>
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @elseif (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="col-md-4 offset-md-4">
                <h2 class="text-center">Workout programs:</h2>

                <table class="table table-light table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Program Name:</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td><a href="{{ route('program', $item->id ) }}">{{ $item->programName }}</a></td>
                                <td>
                                    <?php $status = $item->pivot->completed; ?>
                                    @if ($status == false)

                                        <a class="btn btn-block btn-primary"
                                            href="{{ route('status', $item->programName) }}">Mark Completed</a>
                                    @else
                                        <p>Completed</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach                     
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection
