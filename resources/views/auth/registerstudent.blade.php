@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card card-default">
                <div class="card-header">{{ __('Add Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('studentregister') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label name="devicenumber" for="role">Role </label>
                            <input class="form-control" value="Student" id="role" name="role" readonly="readonly">
                        </div>

                        <!--<div class="form-group">
                            <label for="enrollment">{{ __('Enrollment Number') }}</label>

                                <input id="enrollment" type="text" class="form-control @error('enrollment') is-invalid @enderror" name="enrollment" value="{{ old('enrollment') }}" required autocomplete="enrollment" autofocus>

                                @error('enrollment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>-->

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="studentsclass">Student's Class</label>

                                <input id="studentsclass" type="text" class="form-control @error('name') is-invalid @enderror" name="studentsclass" value="{{ old('div') }}" required autocomplete="studentsclass" autofocus>

                                @error('studentsclass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="div">Division</label>

                                <input id="div" type="text" class="form-control @error('div') is-invalid @enderror" name="div" value="{{ old('div') }}" required autocomplete="div" autofocus>

                                @error('div')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact">{{ __('Contact') }}</label>

                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        

                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>

                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-warning" style="color:white;">
                                    {{ __(' Add Student') }}
                                </button>
                        </div>
                    </form>
                </div>
    </div>

</div>
@endsection

