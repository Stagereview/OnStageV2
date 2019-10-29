@extends('layouts.app')

@section('content')
    <div class="container">
		<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-6">
								{{ __('Bewerk bedrijf') }} <strong>{{$company->name}}</strong>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form action="{{ action('CompanyController@update', $company->id) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
								    @method('PUT')
									@csrf
                                    <input type="hidden" name="id" value="{{ $company->id }}">
									<div class="row">
										<div class="col">
											<div class="row">
												<p class="mx-auto">(*) {{ __('betekent dat dit veld ingevuld moet worden') }}.</p>
											</div>
											<div class="form-group row">
                                                <label for="name" class="col-md-3 col-form-label text-md-right required">{{ __('Naam') }}*</label>
												<div class="col-md-8">
													<input class="form-control required" type="text" name="name" value="{{ $company->name }}">
													@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
                                                <label for="street" class="col-md-3 col-form-label text-md-right">{{ __('Straat & Nummer') }}*</label>
												<div class="col-md-6">
													<input class="form-control required" type="text" name="street" value="{{ $company->street }}">
													@error('street')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
												<div class="col-md-2">
													<input min="0" placeholder="Nmr" id="housenumber" type="number" class="form-control" name="housenumber" value="{{ $company->housenumber }}" required autocomplete="housenumber" autofocus>
													@error('housenumber')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
                                                <label for="city" class="col-md-3 col-form-label text-md-right required">{{ __('Stad') }}*</label>
												<div class="col-md-8">
													<input class="form-control required" type="text" name="city" value="{{ $company->city }}">
													@error('city')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
                                                <label for="zip_code" class="col-md-3 col-form-label text-md-right required">{{ __('Postcode') }}*</label>
												<div class="col-md-8">
													<input class="form-control required" type="text" name="zip_code" value="{{ $company->zip_code }}">
													@error('zip_code')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												</div>
											</div>
											<div class="form-group row">
                                                <label class="col-md-3 col-form-label text-md-right required">{{ __('Logo') }}</label>
												<div class="col-md-8">
													<img src="{{ Storage::url($company->logo)}}" alt="Company logo" class="img-fluid" height="400px">
													<small class="form-text text-muted">{{ __('Indien u het logo niet wilt veranderen, selecteert u er geen') }}.</small>
													<div class="custom-file">
														<input name="logo" type="file" class="custom-file-input" id="logo">
														<label class="custom-file-label" for="logo">{{ __('Kies logo') }}...</label>
														@error('logo')
															<div class="invalid-feedback">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
											<div class="row p-0">
												<div class="col-md-8 text-center">
													<input type="submit" value="Opslaan" class="btn btn-primary">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
