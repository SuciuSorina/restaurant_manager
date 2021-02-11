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
    @if (session('categoryExists'))
        <div class="alert alert-danger">
            {{ session('categoryExists') }}
        </div>
    @endif
    <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3">Edit category</h1>
    <form action="{{ route(('categories.update'), $category->id) }}" method="post">
        @method('PUT')    
        @csrf
        <div class="row">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Category name" value="{{$category->name}}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Edit
                </button>
                <a href="{{route('categories.index')}}" style="color:white;" type="button" class="btn btn-warning">Back </a>
            </div>
        </div>
    </form>

@endsection