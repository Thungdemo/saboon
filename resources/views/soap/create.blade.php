@extends('layouts.app')

@push('scripts')
<script type="text/javascript" src="{{asset('js/soap-ingredient-row.js')}}"></script>
@endpush
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Soap</div>

            <div class="card-body">
                {!! Form::open(['url'=>route('soap.store')]) !!}
                <div class="form-group">
                    <label>Name*</label>
                    {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    {!! Form::textarea('description',old('description'),['class'=>'form-control','rows'=>3]) !!}
                    <span class="error">{{$errors->first('description')}}</span>
                </div>
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <tr>
                                    <th>Ingredient</th>
                                    <th>Amount Required</th>
                                    <th></th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody id="ingredient-row">
                            @if($ingredientRows = old('ingredient'))
                            @foreach($ingredientRows as $rowId => $row)
                            @include('soap.add-ingredient',['rowId'=>$rowId])
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" id="add-ingredient"><span class="fa fa-plus"></span></button>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
