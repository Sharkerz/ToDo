@extends('layouts.app')

@section('content')

<link href="{{ asset('css/contact.css') }}" rel="stylesheet">

<div id="divcontain_contact" class="container">
    <div class="row justify-content-center"
    id="test">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Contact.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texte" class="col-md-4 col-form-label text-md-right">Texte</label>

                            <div class="col-md-6">
                                <textarea name="texte" class="form-control" minlength="20" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" class="btn btn-success bouton-creation">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
