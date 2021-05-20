@extends('app')

@section('content')

    <div class="mt-5 mb-5" style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3"s>Profile</h1>
            <form action="/feedbacks" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-control">Username: {{$user->name}}</label> <br>
                    <label class="form-control">Email: {{$user->email}}</label><br>
                    <label class="form-control">Address: {{$user->adress}}</label><br>
                    <label class="form-control">Phone: {{$user->phone}}</label><br>
                </div>
                <div class="form-group">
                    <a class="btn btn-info" href="/edit-profile/{{$user->id}}">Edit</a>
                </div>
                <div class="form-group">
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection