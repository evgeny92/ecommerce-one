@extends('layout.main')

@section('content')

    <div class="row">
        <div class="small-4 small-centered column">

    <h3>Shipping Info</h3>

    {!! Form::open(['route' => 'address.store', 'method' => 'post']) !!}

        <div class="form-group">
            {{ Form::label('addressline', 'Address Line:') }}
            {{ Form::text('addressline', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('city', 'City:') }}
            {{ Form::text('city', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('state', 'State:') }}
            {{ Form::text('state', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('zip', 'Zip:') }}
            {{ Form::text('zip', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('country', 'Country:') }}
            {{ Form::text('country', null, ['class' => 'form-control']) }}
        </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone:') }}
        {{ Form::text('phone', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Proceed to Payment', ['class' => 'button success']) }}

   
    {!! Form::close() !!}

        </div>
    </div>
@endsection