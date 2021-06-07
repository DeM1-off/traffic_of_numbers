@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Add number</h3>
            <br>
            <form action="{{ route('account.storenumber') }}" method="post">
                @csrf

                <label for="spending"> Phone number</label>
                <br>
                <input  type="hidden" name="user_id" value="{{ $user }}" >

                <select name=operator[]" id="">
                    @foreach($num  as $nums)
                        <option value="380{{ $nums}}"> +380 {{ $nums}}</option>
                    @endforeach
                </select> <input type="number" name="number"   min="1111111" max="9999999">

                <br>
                <button type="submit" class="btn btn-success" value="Click">Click</button>
            </form>
        </div>
    </div>
@endsection
