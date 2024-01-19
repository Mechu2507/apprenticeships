@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Logowanie</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route ('login')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="study-direction" class="col-md-4 col-form-label text-md-end">{{ __('Kierunek Studiów') }}</label>
                            <div class="col-md-6">
                            <select class="form-select " aria-label="Default select example" name="direction" id="direction" required>
                                <option selected>Wybierz kierunek</option>
                                @foreach ($directions as $direction )
                                    <option value="{{$direction->id}}">{{$direction->name}}</option>   
                                @endforeach
                              </select>
                            </div>  
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zaloguj się') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
