@extends('layouts/user')

@section('content')


<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit your operation details:</h6>
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
        {!! Form::model($operation, ['method'=>'PATCH', 'action'=>['UserOperationsController@update', $operation->id]])!!}         
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
              {!! Form::submit('Edit Operation', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
          
    </div>
    </div>
</div>








@endsection