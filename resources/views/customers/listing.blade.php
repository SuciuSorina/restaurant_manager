@extends('app')


@section('content')

    <table class="table table-bordered">
        <tr >
            <th class="text-center align-middle">
                Name
            </th>
            <th class="text-center align-middle">
                Email
            </th>
            <th class="text-center align-middle">
                Phone
            </th>
        </tr>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td  class="text-center align-middle">
                        {{$user->name}}
                    </td>
                    <td  class="text-center align-middle">
                        {{$user->email}}
                    </td>
                    <td  class="text-center align-middle">
                        {{$user->phone}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection