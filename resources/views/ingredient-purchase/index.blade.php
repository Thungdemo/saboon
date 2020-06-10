@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{route('ingredient-purchase.create')}}">Add Purchase</a>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Ingredients</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ingredient</th>
                            <th>Units Purchased</th>
                            <th>Rate</th>
                            <th>Total Cost</th>
                            <th>Date of Purchase</th>
                            <th>Batch</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($ingredientPurchases))
                        @foreach($ingredientPurchases as $ingredientPurchase)
                        <tr>
                            <td>{{$ingredientPurchase->ingredient->name}}</td>
                            <td>{{$ingredientPurchase->quantity}} {{$ingredientPurchase->ingredient->quantityUnit->name}}</td>
                            <td>{{$ingredientPurchase->rate}}</td>
                            <td>{{$ingredientPurchase->total_cost}}</td>
                            <td>{{$ingredientPurchase->purchase_date}}</td>
                            <td>{{$ingredientPurchase->batch}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('ingredient-purchase.edit',$ingredientPurchase)}}">Edit</a>
                                {!! Form::open(['url'=>route('ingredient-purchase.delete',$ingredientPurchase),'method'=>'delete','class'=>'inline-form confirm-delete']) !!}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="100">No data found</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
