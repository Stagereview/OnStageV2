@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                Profiel aanpassen
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <form action="{{ action('UserController@update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="first_name" class="col-md-3 col-form-label text-md-right">{{ __('Voornaam') }}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}">
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-md-3 col-form-label text-md-right">{{ __('Achternaam') }}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}">
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="student_number" class="col-md-3 col-form-label text-md-right">{{ __('Studentnummer') }}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="student_number" value="{{ $user->student_number }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label text-md-right"></label>
                                                <div class="col-md-8">
                                                    <button class="btn btn-primary" type="submit">Wijzig</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection