@extends('layouts/user')

@section('content')
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Your vehicles:</h6>
  </div>

        <!-- Card Body -->
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Car Brand</th>
                        <th>Car Model</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if ($vehicles)
                        @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }} </td>
                            <td>{{ $vehicle->name }} </td>
                            <td>{{ $vehicle->model }} </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
  </div>



@endsection