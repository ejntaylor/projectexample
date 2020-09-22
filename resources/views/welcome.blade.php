@extends('layouts.app')

@section('content')
        <div class="container">
            @if (Route::has('login'))
                @auth
                    <a class="btn btn-primary" href="{{ url('/home') }}">Add Token</a>
            @else
                    {{ __('Hello! Login to add your token') }}
            @endif
            @endif

        </div>
@endsection