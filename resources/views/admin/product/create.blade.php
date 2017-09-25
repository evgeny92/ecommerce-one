@extends('admin.layout.admin')

@section('content')

    <h3>Add Product</h3>

    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'files' => true]) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', null, ['size'=>'10x5','class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('size', 'Size:') }}
                {{ Form::select('size', ['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large'], null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Category:') }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
            </div>

            <div class="form-group">
                {{ Form::label('image', 'Image:') }}
                {{ Form::file('image', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', 'Price:') }}
                {{ Form::text('price', null, ['class' => 'form-control']) }}
            </div>

            {{ Form::submit('Create', ['class' => 'btn btn-success']) }}

            {!! Form::close() !!}
        </div>

    </div>

@endsection