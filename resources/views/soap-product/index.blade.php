@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{route('soap-product.create')}}">Produce New Soap</a>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Soaps Produced</div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Soap</th>
                            <th>Date of Manufacture</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($soapProducts))
                        @foreach($soapProducts as $soapProduct)
                        <tr>
                            <td>{{$soapProduct->soap->name}}</td>
                            <td>{{$soapProduct->mfg_date}} 
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('soap-product.edit',$soapProduct)}}">Edit</a>
                                {!! Form::open(['url'=>route('soap-product.delete',$soapProduct),'method'=>'delete','class'=>'inline-form confirm-delete']) !!}
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
