@extends('layouts.layout')

@section('content')
    .<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2 class="text-center">{{ $name }}'s Workout programs:</h2>
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
                                <td><a href="{{ route('program', $item->id) }}">{{ $item->programName }}</a></td>
                                <td>
                                    <?php $status = $item->pivot->completed; ?>
                                    @if ($status == true)
                                        Completed
                                    @else
                                        Active
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-o-left"></i><span>Back</span>
            </div>
        </div>
    </div>
@endsection
