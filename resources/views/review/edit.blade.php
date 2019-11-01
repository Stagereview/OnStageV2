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
                            Review aanpassen:
                        </div>
						<div class="card-body">
                                <form action="#" method="post">
                                    @csrf
                                <input name="company_id" type="hidden" value="">
								<div class="form-group row">
									<label for="title" class="col-md-3 col-form-label font-weight-bold">{{ __('Titel: *') }}</label>
		
									<div class="col-md-6">
										<input placeholder="Titel" id="title" type="text" class="form-control" name="title" value="{{ $review->title }}" required autocomplete="title" autofocus>
									</div>
								</div>
                                <div class="form-group row">
                                        <label for="details" class="col-md-3 col-form-label font-weight-bold">{{ __('Details: *') }}</label>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <textarea maxlength="255" name="details" placeholder="Licht hier jouw ervaring toe tijdens je stage." class="form-control" rows="3">{{ $review->details }}</textarea>
											</div>
                                        </div>
                                    </div>
								<div class="form-group row">
									<label for="role" class="col-md-3 col-form-label font-weight-bold">{{ __('Role: *') }}</label>
                                    
                                    <div class="col-md-6">
										<input placeholder="De rol die jij gehad hebt tijdens de stage." id="role" type="text" class="form-control" name="role" value="{{ $review->role }}" required autocomplete="role" autofocus>
									</div>
								</div>
								<div class="form-group row">
									<label for="type" class="col-md-3 col-form-label font-weight-bold">{{ __('Type: *') }}</label>
		
									<div class="col-md-6">
                                        <div class="dropdown">
                                        <select class="form-control" name="type">
                                            <option value="Oriënterend" @if($review->type == 'Oriënterend'){ selected }@endif>Oriënterend</option>
                                            <option value="Afstudeer" @if($review->type == 'Afstudeer'){ selected }@endif>Afstudeer</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-md-3 col-form-label font-weight-bold">{{ __('Start & Einddatum: *') }}</label>
                                    <div class="col-md-3">
                                        <input placeholder="Startdatum" id="start_date" type="date" class="form-control" name="start_date" value="{{ date("Y-m-d", strtotime($review->start_date)) }}" required autocomplete="start_date" autofocus>
                                    </div>
                                    <div class="col-md-3">
                                        <input placeholder="Einddatum" id="end_date" type="date" class="form-control" name="end_date" value="{{ date("Y-m-d", strtotime($review->end_date)) }}" required autocomplete="end_date" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-md-3 col-form-label font-weight-bold">{{ __('Rating: *') }}</label>           
                                    <div class="col-md-1">
                                        <input min="1" max="5" id="rating" type="number" class="form-control" name="rating" value="{{ $review->rating }}" required autocomplete="rating" autofocus>
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