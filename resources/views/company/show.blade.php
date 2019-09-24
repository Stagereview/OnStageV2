@extends('layouts.app')

@section('content')

<div class="row justify-content-between mb-3">
    <div class="container">
        <div class="card">
            <img src="{{ Storage::url($company->logo)}}" alt="Company logo">
            <div class="card-body">
            <h1 class="card-title">{{ $company->name }}</h1>
            <div class="company-details">
                <ul>
                    <li>{{ $company->street }}</li>
                    <li>{{ $company->city }}</li>
                    <li>{{ $company->zip_code }}</li>
                </ul>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection