@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
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
                            <div class="col col-md-9">
                                <p>Voornaam: {{ Auth::user()->first_name }}</p>
                                <p>Achternaam: {{ Auth::user()->last_name }}</p>
                                <p>Studentnummer: {{ Auth::user()->student_number }}</p>
                                <p>E-mail: {{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('editDashboard', Auth::user()->id) }}">
                                    <button class="btn btn-secondary w-100">Wijzigen</button>
                                </a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection