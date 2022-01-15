@extends('layouts.layout')


@section('content')

    <div class="container-fluid">
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @elseif (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif


        {{-- programs Model --}}

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('createPlan') }}" method="POST">
                    @csrf
                    <div class="col-md-3  mx-auto ">
                        <h5 class="text-center mt-4">Select workout plan for user</h5>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Programs</label>
                            </div>
                            <select name="selecProg" class="custom-select" id="inputGroupSelect01">
                                <option>Choose...</option>
                                @foreach ($programModel as $item)
                                    <option value="{{ $item->id }}">{{ $item->programName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- users --}}
                    <div class="col-md-3  mx-auto">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Users</label>
                            </div>
                            <select name="selectUser" class="custom-select" id="inputGroupSelect01">
                                <option>Choose...</option>
                                @foreach ($users as $item)
                                    @if ($item->role == 1)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mb-3 mx-auto">Save</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- section list --}}


        <div class="col-md-3  mx-auto">
            <table class="table table-light table-striped ">
                <thead>
                    <tr>
                        <th class="text-center">Check the users workout plan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            @if ($item->role == 1)
                                <td class="text-center"><a
                                        href="{{ route('userPlan', $item->id) }}">{{ $item->name }}</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




    </div>



@endsection
