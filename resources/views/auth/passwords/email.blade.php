@extends('welcome')

@section('blogcontent')
{{-- not sure what this is, check later --}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

    <form method="POST" role="form" action="{{route('password.email')}}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Recover password</button>
        </div>

        @if ($errors->has('email'))
             @include('layouts.errors')
        @endif
        
    </form>
@endsection
                    
