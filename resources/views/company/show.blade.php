@extends('layouts.app')

@section('content')
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
                <img style="width: 100%; height: 100%;" src="{{ Storage::url($company->logo)}}" alt="Company logo">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-warning float-right">Wijzigen</a> 
              <h4 class="card-title">{{ $company->name }}</h4>
              <p class="card-text">Bedrijfsdetails:</p>
              <div class="company-details">
                    <ul>
                        <li>{{ $company->street }} {{ $company->housenumber }}</li>
                        <li>{{ $company->city }}</li>
                        <li>{{ $company->zip_code }}</li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
      </div>
</div
@endsection