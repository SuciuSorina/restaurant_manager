@extends('app')

@section('content')

    <div class="mt-5 mb-5" style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3"s>Profile</h1>
            <form action="/update-user" method="post">
                @csrf
                <div class="form-group">
                    <label>Name </label>
                    <input value="{{$user->name}}" name="name" class="form-control">
                    <label>Email </label>
                    <input value="{{$user->email}}" name="email" class="form-control">
                    <label> Address</label>
                    <input value="{{$user->adress}}" name="adress" class="form-control">
                    <label>Phone </label>
                    <input value="{{$user->phone}}" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            <form>
            <div class="form-group">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection