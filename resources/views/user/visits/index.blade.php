@extends('layouts/user')

@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your visits</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Car </th>
                    <th>Operation name</th>
                    <th>Date when you make the appointment</th>
                    <th>Scheduled date</th>
                    <th>Edit appointment</th>
                    <th>Delete appointment</th>
                </tr>
                </thead>
                <tbody>
                @if($visits)
                    @foreach ($visits as $visit)
                    <tr>
                        <td>{{ $visit->vehicle ? $visit->vehicle->name : "N-are nume"}} </td>
                        <td>{{ $visit->operation_name }} </td>
                        <td>{{ $visit->created_at->diffForHumans() }} </td>
                        <td>{{ $visit->schedule_date }} </td>
                        <td><a class="btn btn-success" href="{{ route('user.visits.edit', $visit->id) }} "> Edit </a></td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['UserVisitsController@destroy', $visit->id]])!!}
                            <div class='form-group'>
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </div>
        </div>
        </div>



@endsection