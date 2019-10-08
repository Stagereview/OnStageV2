@extends('layouts.app')

@section('content')
    <div class="container">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        <div class="card">
            <div class="card-body">
            <h1 class="card-title">{{ $review->title }}</h1>
            <p class="card-text"><label class="font-weight-bold">Datum:</label> {{ $review->start_date }} - {{ $review->end_date }}</p>
            <p class="card-text"><label class="font-weight-bold">Type:</label> {{ $review->type }}</p>
            <p class="card-text"><label class="font-weight-bold">Rol:</label> {{ $review->role }}</p>
            <p class="card-text"><label class="font-weight-bold">Rating:</label> {{ $review->rating }}</p>
            <p class="card-text"><label class="font-weight-bold">Details:</label> {{ $review->details }}</p>
            </div>
          </div>
        </div>
      </div>
</div
@endsection