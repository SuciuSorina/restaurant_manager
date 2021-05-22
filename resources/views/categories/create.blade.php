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
    <div style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3">Create category</h1>
            <form action="/categories" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Category name" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Create
                    </button>
                    <a href="{{route('categories.index')}}" style="color:white;" type="button" class="btn btn-primary">Back </a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection