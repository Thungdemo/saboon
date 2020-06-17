@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{route('ingredient.create')}}">Add Ingredient</a>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Ingredients</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>In Stock</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($ingredients))
                        @foreach($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->name}}</td>
                            <td>{{$ingredient->rate ? $ingredient->rate_per_unit : '--'}}</td>
                            <td>{{$ingredient->getQuantityAvailable().$ingredient->quantityUnit->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('ingredient.edit',$ingredient)}}">Edit</a>
                                {!! Form::open(['url'=>route('ingredient.delete',$ingredient),'method'=>'delete','class'=>'inline-form confirm-delete']) !!}
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
