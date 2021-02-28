@extends('app')


@section('content')
    <ul> Customer List
    @foreach($users as $user)
        <li>{{$user->name}}
    @endforeach

@endsection