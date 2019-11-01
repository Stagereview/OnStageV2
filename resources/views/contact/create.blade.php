@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
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
                            Voeg een nieuw contactpersoon toe:
                        </div>
						<div class="card-body">
								<form action="{{ action('ContactController@store') }}" method="post">
                                    @csrf
                                <input name="company_id" type="hidden" value="{{ $companyid }}">
                                <div class="form-group row">
									<label for="gender" class="col-md-3 col-form-label font-weight-bold">{{ __('Geslacht: *') }}</label>
        
                                    <div class="col-md-6">
                                        <select class="form-control" name="gender">
                                            <option value="De heer">Man </option>
                                            <option value="Mevrouw">Vrouw</option>
                                        </select>
                                    </div>
								</div>
								<div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label font-weight-bold">{{ __('Naam: *') }}</label>
                                    
									<div class="col-md-6">
										<input placeholder="Naam" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="first_name" autofocus>
									</div>
								</div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label font-weight-bold">{{ __('Email: *') }}</label>

                                    <div class="col-md-6">
                                        <input placeholder="Email" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-3 col-form-label font-weight-bold">{{ __('Telefoonnummer: *') }}</label>

                                    <div class="col-md-6">
                                        <input placeholder="Telefoonnummer" id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                    </div>
                                </div>
								<div class="form-group row">
									<label for="function" class="col-md-3 col-form-label font-weight-bold">{{ __('Functie: *') }}</label>
                                    
                                    <div class="col-md-6">
										<input placeholder="De functie van je contactpersoon." id="function" type="text" class="form-control" name="function" value="{{ old('function') }}" required autocomplete="role" autofocus>
									</div>
								</div>
                                <div class="form-group row">
                                    <span class="col-md-3 spacer"></span>               
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
@endsection
