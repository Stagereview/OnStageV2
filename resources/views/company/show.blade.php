@extends('layouts.app')

@section('content')
{{-- {{ dd($reviews) }} --}}
<div class="container mb-5">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-6 d-flex align-items-stretch">
			<div class="card">
				<div class="row no-gutters">
					<div class="col-sm-4">
						<figure class="w-100 m-0">
							<img class="w-100" src="{{ Storage::url($company->logo)}}" alt="Company logo">
						</figure>
					</div>
					<div class="col-sm-8">
						<div class="card-body">
							<a class="btn btn-primary float-right" href="{{ action('CompanyController@edit', $company->id)}}">Wijzigen</a>
							<h4 class="card-title">{{ $company->name }}</h4>
						
							<p class="card-text">Bedrijfsdetails:</p>
							<div class="company-details">
								<ul class="list-unstyled">
									<li>{{ $company->street }} {{ $company->housenumber }}</li>
									<li>{{ $company->city }}</li>
									<li>{{ $company->zip_code }}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Statistieken</h4>
				</div>
				<div class="card-footer">
					<a class="btn btn-primary" href="{{ action('ReviewController@create', $company->id) }}">Nieuwe Review</a>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="container">
	<div class="row">
    @if (count($reviews) > 0)
		@foreach ($reviews as $review)
		<div class="col-sm-6 mb-3 d-flex align-items-stretch">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">{{ $review->title }}</h5>
					<h6 class="card-subtitle mb-3 text-muted">{{ $review->first_name }} {{ $review->last_name }}</h6>
					<h6 class="card-subtitle mb-2">Geplaatst op: {{ date("d-m-Y", strtotime($review->created_at)) }}</h6>
					<h6 class="card-subtitle mb-2">Stage periode: {{ date("d-m-Y", strtotime($review->start_date)) }} tot {{ date("d-m-Y", strtotime($review->end_date)) }}</h6>
					<h6 class="card-subtitle mb-2">Werk omschrijving: {{ $review->role }}</h6>
					<div class="mb-1">
						@for ($i = 1; $i < 6; $i++)
							@if ($i <= $review->rating)
							<span class="fa fa-star checked" aria-hidden="true"></span>
							@else 
							<span class="fa fa-star" aria-hidden="true"></span>
							@endif
						@endfor
					</div>
					<p class="card-text">
						{{ str_limit($review->details, $limit = 150, $end = '...') }} <a href="{{ action('ReviewController@show', $review->review_id) }}">lees meer</a>
					</p>
				</div>
			</div>
		</div>
		@endforeach
		<div class="paginator">
			{{ $reviews->links() }}
		</div>
    @else 
        <div class="col">
			<div class="card">
				<div class="card-body">
					<p class="card-text">Dit bedrijf heeft nog geen reviews, <a href="{{ action('ReviewController@create', $company->id) }}">wees de eerste</a>!</p>
				</div>
			</div>
            
		</div>
	@endif
	</div>
</div>
@endsection