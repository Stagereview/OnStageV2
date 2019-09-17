@extends('layouts.app')

@section('content')
<div class="row justify-content-between mb-3">
    <div class="container">
        <h1 class="text-center">Alle bedrijven</h1>
        <div class="row">
            @foreach ($companies as $company)
            <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <a class="mx-auto" href="{{ action('CompanyController@show', ['id' => $company->id]) }}">
                        {{-- <img src="{{ asset('images/' . $c->imgPath) }}" class="card-img-top"> --}}
                    </a>
                    <div class="card-body border-top border-secondary">
                        <a href="{{ action('ProductController@show', ['id' => $product->id]) }}">
                            <h2 class="card-title text-center">{{ $company->name }}</h2>
                        </a>
                        <p class="card-text text-center">{{ $company->description }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <span class="text-muted">€{{ $company->price }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>
</div>

@endsection
