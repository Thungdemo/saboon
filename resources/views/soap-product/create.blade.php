@extends('layouts.app')

@push('scripts')
<script type="text/javascript" src="{{asset('js/soap-ingredient-row.js')}}"></script>
@endpush
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Make a Soap</div>

            <div class="card-body">
                {!! Form::open(['url'=>route('soap-product.store')]) !!}
                <div class="form-group">
                    <label>Soap*</label>
                    {!! Form::select('soap_id',$soaps,old('soap_id'),['class'=>'form-control','id'=>'soap_id','placeholder'=>'Select soap']) !!}
                    <span class="error">{{$errors->first('soap_id')}}</span>
                </div>
                <div class="form-group">
                    <label>Date of Manufacture</label>
                    {!! Form::text('mfg_date',old('mfg_date'),['class'=>'form-control datemask datepicker']) !!}
                    <span class="error">{{$errors->first('soap_id')}}</span>
                </div>
                <div class="form-group">
                    <span class="error">{{$errors->first('ingredients')}}</span>
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
                        <tbody id="ingredients">
                            @if($ingredientRows = old('ingredients'))
                            @foreach($ingredientRows as $rowId => $row)
                            @include('soap-product.add-ingredient',[
                                'rowId' => $rowId,
                                'ingredients' => $ingredients,
                            ])
                            @endforeach
                            @else
                            @include('soap-product.add-ingredient',[
                                'rowId' => uniqid(),
                                'ingredients' => $ingredients,
                            ])
                            @endif
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" id="add-ingredient" title="Add Ingredient"><span class="fa fa-plus"></span></button>
                </div>
                <button type="submit" class="btn btn-primary">Make Soap</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#soap_id').change(function(){
    soapId = $(this).val();
    if(soapId.length)
    {
        $.ajax({
            url:'{{route('soap-product.soap-ingredients')}}',
            data:{soap_id:soapId},
            success:function(data){
                // console.log(data);
                $('#ingredients').html(data);
            },
            error:function(data){
                // console.log(data);
            }
        });
    }
    
});
$(document).on('click','.remove-ingredient',function(){
    $(this).parents('tr').remove();
});
$('#add-ingredient').click(function(){
    $.ajax({
        url:'{{route('soap-product.add-ingredient')}}',
        success:function(data){
            $('#ingredients').append(data);
        },
        error:function(data){
        }
    });
})
</script>
@endsection
