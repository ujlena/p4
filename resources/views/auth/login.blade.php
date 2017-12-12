@extends("layouts.master")

@section("title")
    Login
@endsection

@section("content")
    <h2>Login</h2>

    Don't have an account? <a href='/register'>Create Account</a>

    <form method='POST' action="{{ route('login') }}">
        <div class='foralign'>
            {{ csrf_field() }}

            <p>
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @if($errors->get('email'))
                    <ul>
                        @foreach($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>
            
            <p>
                <label for="password">Password</label>
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
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </p>
        </div>
        <p>
            <button type="submit" class="btn btn-primary">Login</button>
        </p>

        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>

    </form>
@endsection