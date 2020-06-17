@extends('layouts.app')

@push('scripts')
<script type="text/javascript" src="{{asset('js/ingredient-total-cost.js')}}"></script>
@endpush

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Purchase</div>

            <div class="card-body">
                {!! Form::model($purchase,['url'=>route('purchase.update',$purchase),'method'=>'put']) !!}
                <div class="form-group">
                    <label>Ingredient*</label>
                    {!! Form::select('ingredient_id',$ingredients,old('ingredient_id'),['class'=>'form-control','placeholder'=>'Select Ingredient','id'=>'ingredient_id']) !!}
                    <span class="error">{{$errors->first('ingredient_id')}}</span>
                </div>
                <div class="form-group">
                    <label>Rate*</label>
                    {!! Form::text('rate',old('rate'),['class'=>'form-control','id'=>'rate']) !!}
                    <span class="error">{{$errors->first('rate')}}</span>
                </div>
                <div class="form-group">
                    <label>Quantity*</label>
                    {!! Form::text('quantity',old('quantity'),['class'=>'form-control','id'=>'quantity']) !!}
                    <span class="error">{{$errors->first('quantity')}}</span>
                </div>
                <div class="form-group">
                    <label>Total Cost</label>
                    {!! Form::text('total_cost',old('total_cost'),['class'=>'form-control','disabled','id'=>'total_cost']) !!}
                </div>
                <div class="form-group">
                    <label>Date of Purchase</label>
                    {!! Form::text('purchase_date',old('purchase_date'),['class'=>'form-control datemask']) !!}
                    <span class="error">{{$errors->first('purchase_date')}}</span>
                </div>
                <div class="form-group">
                    <label>Batch</label>
                    {!! Form::text('batch',old('batch'),['class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('batch')}}</span>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
