@extends('layouts.user')

@section('content')

    
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit appointment:</h6>
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
       
          {!! Form::model($visit, ['method'=>'PATCH', 'action'=>['UserVisitsController@update', $visit->id]])!!}

          <div class='form-group'>
              {!! Form::label('vehicle_id', 'Chose from your Vehicles:') !!}
              {!! Form::select('vehicle_id', [''=>'Choose Vehicle'] + $vehiclesForForm, null, ['class'=>'form-control']) !!}
          </div>

          {!! Form::hidden('user_id', $userId) !!}

          <div class='form-group'>
            {!! Form::label('operation_name', 'Operation name:') !!}
            {!! Form::text('operation name', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('schedule_date', 'Date when you make the appointment:') !!}
            {!! Form::date('schedule_date') !!}
          </div>

          <div class='form-group'>
              {!! Form::submit('Edit appointment', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
        
      </div>
    </div>
</div>


@endsection