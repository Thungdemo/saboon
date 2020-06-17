@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{route('soap.create')}}">Add Soap</a>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Soaps</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Ingredients</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($soaps))
                        @foreach($soaps as $soap)
                        <tr>
                            <td>{{$soap->name}}</td>
                            <td>{{$soap->getIngredients()}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('soap.edit',$soap)}}">Edit</a>
                                {!! Form::open(['url'=>route('soap.delete',$soap),'method'=>'delete','class'=>'inline-form confirm-delete']) !!}
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
