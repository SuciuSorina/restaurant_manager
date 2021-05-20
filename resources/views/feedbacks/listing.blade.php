@extends('app')
@section('content')
    <table class="table table-bordered pt-5">
        <thead>
        <tr>
            <th  class="text-center align-middle" >Description</th>
            <th  class="text-center align-middle" >User</th>
        </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td  class="text-center align-middle">{{$feedback->description}}</td>
                    <td  class="text-center align-middle">{{$feedback->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection