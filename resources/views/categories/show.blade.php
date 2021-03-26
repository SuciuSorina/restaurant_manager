@extends('app')
@section('content')

    <table class="table table-bordered fixed">
        <thead>
        <tr>
            <th  class="text-center align-middle" >#</th>
            <th  class="text-center align-middle" >Name</th>
            <th  class="text-center align-middle" >Category</th>
            <th  class="text-center align-middle" >Price unit</th>
            <th  class="text-center align-middle" >Quantity</th>

            <th  colspan="2" class="text-center align-middle" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th  class="text-center align-middle">{{$product->id}}</th>
                    <td  class="text-center align-middle">{{$product->name}}</td>
                    <td  class="text-center align-middle">{{$product->category->name}}</td>
                    <td  class="text-center align-middle">{{$product->price}} RON</td>

                    <td  class="text-center align-middle">
                        <form action="/add-order-items" method="post" class="mr-2">
                            @csrf
                        <select class="custom-select" id="quantity" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td  class="text-center align-middle">
                        <div style="display:inline-flex">
                                <input type="hidden" name="product_id" class="form-control" value="{{$product->id}}">
                                <button type="submit" class="btn btn-success">
                                    Add to cart
                                </button>

                            </form>

                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
