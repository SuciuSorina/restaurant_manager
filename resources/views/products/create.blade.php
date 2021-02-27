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
    <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3">Create product</h1>
    <form action="/products" method="post" class="border call-md-6">
            @csrf

            <div class="form-group">
                <label>Product name</label>
               <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label >Select category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Create
                </button>
            </div>
    </form>


@endsection
