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
                            Voeg een nieuwe review toe:
                        </div>
						<div class="card-body">
								<form action="{{ action('ReviewController@store') }}" method="post">
                                    @csrf
                                <input name="company_id" type="hidden" value="{{ $companyid }}">
								<div class="form-group row">
									<label for="title" class="col-md-3 col-form-label font-weight-bold">{{ __('Titel: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Titel" id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
									</div>
								</div>
                                <div class="form-group row">
                                        <label for="details" class="col-md-3 col-form-label font-weight-bold">{{ __('Details: *') }}</label>
    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <textarea maxlength="255" name="details" placeholder="Licht hier jouw ervaring toe tijdens je stage." class="form-control" rows="3"></textarea>
											</div>
                                        </div>
                                    </div>
								<div class="form-group row">
									<label for="role" class="col-md-3 col-form-label font-weight-bold">{{ __('Role: *') }}</label>
                                    
                                    <div class="col-md-6">
										<input placeholder="De rol die jij gehad hebt tijdens de stage." id="role" type="text" class="form-control" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="type" class="col-md-3 col-form-label font-weight-bold">{{ __('Type: *') }}</label>
		
									<div class="col-md-6">
                                        <div class="dropdown">
                                        <select class="form-control" name="type">
                                            <option value="Oriënterende">Oriënterende</option>
                                            <option value="Afstudeer">Afstudeer</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label font-weight-bold">{{ __('Start & Einddatum: *') }}</label>
		
                                    <div class="col-md-3">
                                        <input placeholder="Startdatum" id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>
                                    </div>
                                    <div class="col-md-3">
                                        <input placeholder="Einddatum" id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label font-weight-bold">{{ __('Contactpersoon: *') }}</label>                
                                    <div class="col-md-2">
										<input placeholder="Contactpersoon" id="contact" type="text" class="form-control" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>
                                    </div>        
                                    <div class="col-md-2">
										<input placeholder="Email" id="contact_mail" type="email" class="form-control" name="contact_email" value="{{ old('contact_email') }}" required autocomplete="contact_email" autofocus>
                                    </div> 
                                    <div class="col-md-2">
                                        <input placeholder="Telefoonnummer" id="contact_phonenumber" type="text" class="form-control" name="contact_phonenumber" value="{{ old('contact_phonenumber') }}" required autocomplete="contact_phonenumber" autofocus>
                                    </div>                   
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-md-3 col-form-label font-weight-bold">{{ __('Rating: *') }}</label>           
                                    <div class="col-md-1">
                                        <input min="1" max="5" id="rating" type="number" class="form-control" name="rating" value="{{ old('rating') }}" required autocomplete="rating" autofocus>
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
