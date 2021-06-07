
@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <a href="{{ route('account.adduser') }}" class="btn btn-success create">Add user</a>
            <table class="table ">
                <thead class="table-primary">
                <tr>
                    <th> User  </th>
                    <th> Date of Birth</th>
                    <th> Detailed information</th>
                    <th> Delete  </th>
                </tr>
                </thead>

                <tbody class="thead-light">
                @foreach($user  as $users)
                    <tr>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->datebirth }}</td>
                        <td>
                            <a href="{{ route('account.show',['user'=> $users->id ]) }}">Look </a>
                        </td>
                        <td>
                            <form action="{{ route('account.destroy', ['user' => $users->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit"  class="btn btn-danger ">X</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $user->links() }}

        </div>
    </div>
@endsection
