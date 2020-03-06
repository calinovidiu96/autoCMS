@extends('layouts.user')

@section('content')

    
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Insert your vehicle details:</h6>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <!-- Card Body -->
      <div class="card-body">
       
          {!! Form::open(['method'=>'POST', 'action'=>'UserVehiclesController@store'])!!}
          <div class='form-group'>
              {!! Form::label('name', 'Car brand:') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('model', 'Car model:') !!}
            {!! Form::text('model', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('year', 'Fabrication year:') !!}
            {!! Form::selectRange('year', 1970, 2020) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('cmc', 'Engine Capacity (cmc):') !!}
            {!! Form::number('cmc', 'value');!!}
          </div>

          <div class='form-group'>
            {!! Form::label('horsepower', 'Horsepower:') !!}
            {!! Form::number('horsepower', 'value');!!}
          </div>

          <div class='form-group'>
            {!! Form::label('fuel', 'Fuel type:') !!}
            {!! Form::select('fuel', array(
                'Fuel types' => array('Petrol' => 'Petrol', 'Diesel' => 'Diesel', 'Hybrid' => 'Hybrid', 'Electric' => 'Electric'),
            ));!!}
          </div>
           
          <div class='form-group'>
              {!! Form::submit('Insert Car', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
        
      </div>
    </div>
</div>


@endsection