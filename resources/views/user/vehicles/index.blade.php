@extends('layouts/user')

@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your Vehicles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Car Brand</th>
                    <th>Car Model</th>
                    <th>Fabrication Year</th>
                    <th>Engine Capacity (cmc)</th>
                    <th>Horsepower</th>
                    <th>Fuel type</th>
                    <th>Add Date</th>
                    <th>Access Vehicle</th>
                    <th>Edit Car</th>
                    <th>Delete Car</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->name }} </td>
                        <td>{{ $vehicle->model }} </td>
                        <td>{{ $vehicle->year }} </td>
                        <td>{{ $vehicle->cmc }} </td>
                        <td>{{ $vehicle->horsepower }} </td>
                        <td>{{ $vehicle->fuel }} </td>
                        <td>{{ $vehicle->created_at->diffForHumans() }} </td>
                        <td><a class="btn btn-primary" href="{{ route('user.operations.show', $vehicle->id) }} "> Access vehicle </a></td>
                        <td><a class="btn btn-success" href="{{ route('user.vehicles.edit', $vehicle->id) }} "> Edit </a></td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['UserVehiclesController@destroy', $vehicle->id]])!!}
                            <div class='form-group'>
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
            </div>
        </div>
        </div>



@endsection