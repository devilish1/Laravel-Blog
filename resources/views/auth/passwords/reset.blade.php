@extends('welcome')
    
@section('blogcontent')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

    <form method="POST" action="/password/reset">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">


        <div class="form-group">
            <label for="email">E-mail address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </div>

        @include('layouts.errors')

    </form>
@endsection
