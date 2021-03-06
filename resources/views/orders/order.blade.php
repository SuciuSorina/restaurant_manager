@extends('app')

@section('content')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th  class="text-center align-middle">Product  name</th>
                <th  class="text-center align-middle" >Price per unit</th>
                <th  class="text-center align-middle" >Total quantity</th>
                <th  class="text-center align-middle" >Total price</th>
                <th  class="text-center align-middle" >Action</th>
            </tr>
        </thead>
            @foreach($order->orderParts as $part)
            <tr>
                <td>
                    {{$part->product->name}} 
                </td>
                <td>
                    {{$part->product->price}} 
                </td>
                <td>
                    {{$part->quantity}} 
                </td>
                <td> 
                    {{$part->price}} 
                </td>
                <td>
                    <button type="button" class="btn btn-danger">Remove product</button> 
                </td>
                
            </tr>
            @endforeach
    </table>


@endsection