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
                        <div class="col-sm-6">
                            <a href="{{ route('editDashboard', Auth::user()->id) }}">
                                <button style="float:right">Wijzigen</button> {{--  style: float right --}}
                            </a>
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
                            <p>Voornaam: {{ Auth::user()->firstName }}</p>
                            <p>Achternaam: {{ Auth::user()->lastName }}</p>
                            <p>Studentnummer: {{ Auth::user()->studentNumber }}</p>
                            <p>E-mail: {{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
