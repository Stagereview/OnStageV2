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
<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h3> {{ __('Contactpersonen') }} </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            @if (count($contacts) > 0)
            <div class="accordion" id="contacts">
                @foreach ($contacts as $contact)
                    <div class="card">
                        <div class="card-header" type="button" id="heading{{ $contact->id }}" data-toggle="collapse" data-target="#collapse{{ $contact->id }}" aria-expanded="false" aria-controls="collapse{{ $contact->id }}">
                            <p class="h6 mb-0">
                                {{ $contact->gender }} {{ $contact->first_name }} {{ $contact->last_name }} -> {{ $contact->function }}
                            </p>
                        </div>
                        <div class="collapse" id="collapse{{ $contact->id }}" aria-labelledby="heading{{ $contact->id }}" data-parent="#contacts">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>Email: {{ $contact->email }}</li>
                                    <li>Tel: {{ $contact->phone_number }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Dit bedrijf heeft nog geen contactpersonen, <a href="{{ action('ReviewController@create', $company->id) }}">voeg een contactpersoon toe</a>!</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h3> {{ __('Reviews') }} </h3>
        </div>
    </div>
    @if (count($reviews) > 0)
    <div class="row">
		@foreach ($reviews as $review)
		<div class="col-sm-6 mb-3 d-flex align-items-stretch">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">{{ $review->title }}</h5>
					<h6 class="card-subtitle mb-1 text-muted">{{ $review->first_name }} {{ $review->last_name }}</h6>
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
    </div>
    @else 
    <div class="row">
        <div class="col col-sm-6">
			<div class="card">
				<div class="card-body">
					<p class="card-text">Dit bedrijf heeft nog geen reviews, <a href="{{ action('ReviewController@create', $company->id) }}">wees de eerste</a>!</p>
				</div>
			</div>
        </div>
    </div>
	@endif
</div>
@endsection