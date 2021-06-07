@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Top up the number

            </h3>
            <br>
            <form action="{{ route('account.storebalance') }}" method="post">
                @csrf


                <input  type="hidden" name="startId" value="{{ $user->id}}" >
                <input  type="hidden" name="userID" value="{{ $user->user_id}}" >

                <input  type="number" name="balance"   max="100">

                <br>
                <button type="submit" class="btn btn-success" value="Click">Click</button>
            </form>
        </div>
    </div>
@endsection
