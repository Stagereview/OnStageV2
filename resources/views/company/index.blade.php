@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <h1 class="text-center">Alle bedrijven</h1>
        <div class="row">
            @foreach ($companies as $company)
            <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <a class="mx-auto" href="{{ action('CompanyController@show', ['id' => $company->id]) }}">
                        <img src="{{ Storage::url($company->logo)}}" class="card-img-top">
                    </a>
                    <div class="card-body border-top border-secondary">
                        <a href="{{ action('CompanyController@show', ['id' => $company->id]) }}">
                            <h2 class="card-title">{{ $company->name }}</h2>
                        </a>
                          <p class="card-text">{{ $company->street }} <i class="fa fa-map-marker" aria-hidden="true"></i></p>
                    
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="company-paginator">
            {{ $companies->links() }}
        </div>
    </div>
</div>

@endsection
