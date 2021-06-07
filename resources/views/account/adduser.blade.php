@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Create user</h3>
            <br>

            <form action="{{ route('account.storeaccount') }}" method="post">
                @csrf

                <label for="spending"> Name </label>
                <br>
                <input type="text" name="name"  >

                <br>
                <label for="datebirth">Date of Birth</label>
                <br>
                <input type="date" name="datebirth"  >

                <br>
                <br>
                <button type="submit" class="btn btn-success" value="Click">Click</button>
            </form>
        </div>
    </div>
@endsection
