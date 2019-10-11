@extends('layouts.app')

@section('content')
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
          @foreach ($reviews as $review)
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $review->title }}</h1>
                  <h4 class="card-subtitle mb-1 text-muted">{{ $review->first_name}} {{ $review->last_name}}</h4>
                  <p class="card-text"><label class="font-weight-bold">Datum:</label> {{ date("d-m-Y", strtotime($review->start_date)) }} - {{ date("d-m-Y", strtotime($review->end_date)) }}</p>
                  <p class="card-text"><label class="font-weight-bold">Type:</label> {{ $review->type }}</p>
                  <p class="card-text"><label class="font-weight-bold">Rol:</label> {{ $review->role }}</p>
                  <div class="mb-1">
                    @for ($i = 1; $i < 6; $i++)
                      @if ($i <= $review->rating)
                      <span class="fa fa-star checked" aria-hidden="true"></span>
                      @else 
                      <span class="fa fa-star" aria-hidden="true"></span>
                      @endif
                    @endfor
                  </div>
                  <p class="card-text"><label class="font-weight-bold">Details:</label> {{ $review->details }}</p>
            </div>
          </div>
        </div>
      </div>
  @endforeach
  </div>
@endsection