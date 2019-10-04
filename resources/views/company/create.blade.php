@extends('layouts.app')

@section('content')
    <div class="container">
		<div class="row justify-content-center">
        <div class="col-md-8">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
					<div class="card">
						<div class="card-header">
							Voeg een bedrijf toe:
						</div>
						<div class="card-body">
								<p>(*) betekent dat dit veld ingevuld moet worden.</p>
								<form action="{{ action('CompanyController@store') }}" method="post">
									@csrf
								<div class="form-group row">
									<label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Naam: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Naam" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
									</div>
								</div>
								<div class="form-group row">
										<label for="street" class="col-md-3 col-form-label text-md-right">{{ __('Straat & Hnmr: *') }}</label>
										<div class="col-md-4">
											<input placeholder="Straat" id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>
										</div>
										<div class="col-md-2">
											<input min="0" placeholder="Hnmr" id="housenumber" type="number" class="form-control" name="housenumber" value="{{ old('housenumber') }}" required autocomplete="housenumber" autofocus>
										</div>                        
									</div>
								<div class="form-group row">
									<label for="city" class="col-md-3 col-form-label text-md-right">{{ __('Stad: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Stad" id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="zip_code" class="col-md-3 col-form-label text-md-right">{{ __('Postcode: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Postcode" id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="logo" class="col-md-3 col-form-label text-md-right">{{ __('Logo:') }}</label>

									<div class="col-md-6">
											<div class="input-group">
													<div class="custom-file">
													<input id="logo" type="file" name="logo" value="{{ old('logo') }}" autocomplete="logo" autofocus class="custom-file-input"
														aria-describedby="inputGroupFileAddon01">
													  <label class="custom-file-label" for="inputGroupFile01">Kies uw logo</label>
													</div>
											</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label text-md-right"></label>
									<div class="col-md-8">
										<button class="btn btn-primary" type="submit">Toevoegen</button>
									</div>
								</div>
							</form>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
