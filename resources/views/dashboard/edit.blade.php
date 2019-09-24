@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                Dashboard
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
                                <form action="{{ route('postDashboard', $user->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="first_name">Voornaam: </label>
                                        <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Achternaam: </label>
                                        <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="student_number">Studentnummer: </label>
                                        <input class="form-control" type="text" name="student_number" value="{{ $user->student_number }}" disabled>
                                    </div>  
                                    <div class="form-group">
                                        <label for="email">E-mail: </label>
                                        <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
                                    </div>           
                                    <button class="btn btn-primary" type="submit">Wijzig</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection