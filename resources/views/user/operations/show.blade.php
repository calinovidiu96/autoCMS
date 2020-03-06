@extends('layouts/user')

@section('content')


<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Insert your operation details:</h6>
      </div>


      @if($vehicle)
      <!-- Card Body -->
      <div class="card-body">
       
          {!! Form::open(['method'=>'POST', 'action'=>'UserOperationsController@store'])!!}
          <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }} ">
          <div class='form-group'>
              {!! Form::label('name', 'Operation name:') !!}
              {!! Form::text('name', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('parts', 'List of parts:') !!}
            {!! Form::text('parts', null, ['class'=>'form-control']) !!}
          </div>

          <div class='form-group'>
            {!! Form::label('price', 'Operation price:') !!}
            {!! Form::number('price', 'value') !!}
          </div>

   
           
          <div class='form-group'>
              {!! Form::submit('Insert Operation', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}

    </div>
    </div>
</div>
@endif


<br><br>

<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Vehicle history:</h6>
  </div>

        <!-- Card Body -->
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Operation name</th>
                        <th>Date</th>
                        <th>Parts used</th>
                        <th>Price</th>
                        <th>Edit operation</th>
                        <th>Delete operation</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($operations)
                        @foreach ($operations as $operation)
                        <tr>
                            <td>{{ $operation->name }} </td>
                            <td>{{ $operation->created_at->diffForHumans() }} </td>
                            <td>{{ $operation->parts }} </td>
                            <td>{{ $operation->price }} </td>
                            <td><a class="btn btn-success" href="{{ route('user.operations.edit', $operation->id) }}"> Edit </a></td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['UserOperationsController@destroy', $operation->id]])!!}
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