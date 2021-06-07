@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <a href="{{ route('account.addnumber',['user'=> $user->id ]) }}" class="btn btn-success ">Add number  </a>


            <p > Name: {{ $user->name}}</p>
            <p> Date of Birth  {{ $user->datebirth}}</p>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Number</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <td>  @foreach($numbers  as $num)
                <tr>
                    <th scope="row">{{ $num->id}}</th>
                    <td>+{{ $num->number}}
                    </td>
                    <td>  {{ $num->balance}} грн</td>
                    <td>  <a href="{{ route('account.addbalance',['user'=> $num->id ]) }}">Top up</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

