@extends('welcome')

@section('blogcontent')
    <h1>Sign in</h1>
    <form method="POST" action="{{route('login')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-link" href="{{route('password.request')}}">
                                    Forgot Your Password?
                                </a>
        </div>

        @include('layouts.errors')
    </form>
@endsection