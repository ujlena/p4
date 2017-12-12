@extends('layouts.master')

@section("title")
    Register
@endsection

@section('content')
    <h2>Register</h2>

    Already have an account? <a href='/login'>Login</a>

    <form method="POST" action="{{ route('register') }}">
        <div class='foralign'>
            {{ csrf_field() }}
            <p>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @if($errors->get('name'))
                    <ul>
                        @foreach($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>

            <p>
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @if($errors->get('email'))
                    <ul>
                        @foreach($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>

            <p>
                <label for="password">Password (min: 6)</label>
                <input id="password" type="password" name="password" required>
                @if($errors->get('password'))
                    <ul>
                        @foreach($errors->get('password') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>

            <p>
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </p>
        </div><!--align-->
        <p>
            <button type="submit" class="btn btn-primary">Register</button>
        </p>
    </form>
@endsection