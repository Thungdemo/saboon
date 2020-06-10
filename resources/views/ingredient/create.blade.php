@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Add Ingredient</div>

            <div class="card-body">
                {!! Form::open(['url'=>route('ingredient.store')]) !!}
                <div class="form-group">
                    <label>Name*</label>
                    {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                    <label>Units*</label>
                    {!! Form::select('quantity_unit_id',$quantityUnits,old('quantity_unit_id'),['class'=>'form-control','placeholder'=>'Select Unit']) !!}
                    <span class="error">{{$errors->first('quantity_unit_id')}}</span>
                </div>
                <div class="form-group">
                    <label>Rate</label>
                    {!! Form::text('rate',old('rate'),['class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('rate')}}</span>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
