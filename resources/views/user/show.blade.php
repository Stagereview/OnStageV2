@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Profiel
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">{{ __('Voornaam') }} :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control-plaintext" value="{{ $user->first_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">{{ __('Achternaam') }} :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control-plaintext" value="{{ $user->last_name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">{{ __('Studentnummer') }} :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control-plaintext" value="{{ $user->student_number }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }} :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control-plaintext" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-8">
                                        <a href="{{ action('UserController@edit', $user->id) }}">
                                            <button class="btn btn-primary">Wijzigen</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection