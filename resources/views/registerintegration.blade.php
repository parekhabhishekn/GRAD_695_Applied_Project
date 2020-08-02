@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 card-header">
            {{ __('Integrations') }}
        </div>
        <div class="col-xl-2">
            <div class="pl-1 pr-1 pt-1 pb-1 dashboard-navigation">
                @include('navigation.integration')
            </div>
        </div>
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">{{ __('Add Integration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('integration.add') }}">
                        @csrf

                        <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" required autocomplete="user_id" hidden="hidden">

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('type') }}</label>

                            <div class="col-md-6">
                                
                                <select id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type">
                                  <option value="Amazon">Amazon</option>
                                  <option value="Google">Google</option>
                                  <option value="Microsoft">Microsoft</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="api_key" class="col-md-4 col-form-label text-md-right">{{ __('API Key') }}</label>

                            <div class="col-md-6">
                                <input id="api_key" type="text" class="form-control @error('api_key') is-invalid @enderror" name="api_key" value="{{ old('api_key') }}" required autocomplete="api_key">

                                @error('api_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="api_secret" class="col-md-4 col-form-label text-md-right">{{ __('API Secret') }}</label>

                            <div class="col-md-6">
                                <input id="api_secret" type="text" class="form-control @error('api_secret') is-invalid @enderror" name="api_secret" value="{{ old('api_secret') }}" required autocomplete="api_secret">

                                @error('api_secret')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
