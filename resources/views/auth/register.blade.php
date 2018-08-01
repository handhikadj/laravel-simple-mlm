@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card-flex mt-10">
            <div class="card card-style">
                <div class="card-header">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Svg Vector Icons : http://www.onlinewebfonts.com/icon -->
                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                    <a href="{{ __('/') }}"><svg width="35" height="35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fillm">
                    <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                    <g><g><g id="_x34__7_"><g><path d="M714.4,469.4H390.2l126.2-126.2c12-12,12-31.4,0-43.3c-12-12-31.4-12-43.3,0L299.8,473.1c-7.3,7.3-9.6,17.4-7.9,26.9c-1.7,9.5,0.6,19.6,8,26.9l173.2,173.2c12,12,31.4,12,43.3,0c12-12,12-31.4,0-43.3L390.2,530.6h324.2c16.9,0,30.6-13.7,30.6-30.6C745,483.1,731.3,469.4,714.4,469.4z M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,928.8c-236.8,0-428.8-192-428.8-428.8c0-236.8,192-428.8,428.8-428.8c236.8,0,428.8,192,428.8,428.8C928.8,736.8,736.8,928.8,500,928.8z"/><title>Back to Login</title></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                    </svg></a>
                </div>

                <div class="card-body card-font">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6 underline-wrapper">
                                <input id="name" type="text" class="form-control borb-1{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                <span class="input-underline"></span>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('Alamat E-mail') }}</label>

                            <div class="col-md-6 underline-wrapper">
                                <input id="email" type="email" class="form-control borb-1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                <span class="input-underline"></span>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 underline-wrapper">
                                <input id="password" type="password" class="form-control borb-1{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <span class="input-underline"></span>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                            <div class="col-md-6 underline-wrapper">
                                <input id="password-confirm" type="password" class="form-control borb-1" name="password_confirmation" required>
                                <span class="input-underline"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
