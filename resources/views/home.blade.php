@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                @if(Auth::user()->hasRole('Admin'))
                <div class="card-header text-center"><strong>Principal's Dashboard</strong></div>
                @elseif(Auth::user()->hasRole('Teacher'))
                <div class="card-header text-center"><strong>Teacher's Dashboard</strong></div>
                @else
                <div class="card-header text-center"><strong>Student's Dashboard</strong></div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
@endsection
