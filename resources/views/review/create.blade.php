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
								<p>(*) betekent dat dit veld ingevuld moet worden.</p>
								<form action="{{ action('ReviewController@store') }}" method="post">
									@csrf
								<div class="form-group row">
									<label for="title" class="col-md-3 col-form-label font-weight-bold">{{ __('Titel: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Titel" id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>
									</div>
								</div>
                                <div class="form-group row">
                                        <label for="details" class="col-md-3 col-form-label font-weight-bold">{{ __('Details: *') }}</label>
    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <textarea placeholder="Licht hier jouw ervaring toe tijdens je stage." class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
								<div class="form-group row">
									<label for="role" class="col-md-3 col-form-label font-weight-bold">{{ __('Role: *') }}</label>
                                    
                                    <div class="col-md-6">
										<input placeholder="Role" id="city" type="text" class="form-control" name="city" value="{{ old('role') }}" required autocomplete="city" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="zip_code" class="col-md-3 col-form-label font-weight-bold">{{ __('Type: *') }}</label>
		
									<div class="col-md-6">
                                        <div class="dropdown">
                                        <select class="form-control">
                                            <option>Oriënterende</option>
                                            <option>Afstudeer</option>
                                        </select>
                                    </div>
                                </div>
								</div>
                                <div class="form-group row">
                                    <label for="street" class="col-md-3 col-form-label font-weight-bold">{{ __('Rating: *') }}</label>           
                                    <div class="col-md-2">
                                        <input min="1" max="10" id="rating" type="number" class="form-control" name="rating" value="{{ old('rating') }}" required autocomplete="street" autofocus>
                                    </div>                       
                                </div>
                                <div class="form-group row">
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
