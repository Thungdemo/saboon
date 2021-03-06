@extends('layouts.app')

@push('scripts')
<script type="text/javascript" src="{{asset('js/soap-ingredient-row.js')}}"></script>
@endpush

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Soap</div>

            <div class="card-body">
                {!! Form::model($soap,['url'=>route('soap.update',$soap),'method'=>'put']) !!}
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
                        @else
                        @foreach($soap->soapIngredients as $soapIngredient)
                        @include('soap.add-ingredient',[
                            'rowId' => $soapIngredient->id,
                            'soapIngredient' => $soapIngredient
                        ])
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="100"><button type="button" class="btn btn-sm btn-primary" id="add-ingredient">Add Ingredient</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
