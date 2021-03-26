@extends('app')

@section('content')
    @if ($errors->any())
            <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div>
    @endif
    @if (session('productExists'))
        <div class="alert alert-danger">
            {{ session('productExists') }}
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3">Edit product</h1>
            <form action="{{ route(('products.update'), $product->id) }}" method="post">
                @method('PUT')    
                @csrf

                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->price}}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label >Select category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif > {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                    <a href="{{route('products.index')}}" style="color:white;" type="button" class="btn btn-warning">Back </a>
                </div>
        </form>
        </div>
        <div class="col-md-2"></div>
    </div>


@endsection
