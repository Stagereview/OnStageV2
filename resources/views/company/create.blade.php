@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
					<h1 class="text">Voeg een bedrijf toe:</h1>
					<p >(*) betekent dat dit veld ingevuld moet worden.</p>
					<div class="card">
						<div class="card-body">
								{{ Form::open(['action' => "CompanyController@create", 'method' => 'POST', 'files' => true])}}
								<div class="form-group-row">
									{{ Form::label('name', 'Naam *', ['class' => 'col-form-label', 'required'])}}
									{{ Form::text('name', '', ['class' => 'form-control', 'required'])}}
								</div>
								<div class="form-group-row">
									{{ Form::label('street', 'Straat *', ['class' => 'col-form-label', 'required'])}}
									{{ Form::text('street', '', ['class' => 'form-control', 'required'])}}
								</div>
								<div class="form-group-row">
									{{ Form::label('city', 'Stad *', ['class' => 'col-form-label', 'required'])}}
									{{ Form::text('city', '', ['class' => 'form-control', 'required'])}}
								</div>
								<div class="form-group-row">
									{{ Form::label('zip_code', 'Postcode *', ['class' => 'col-form-label', 'required'])}}
									{{ Form::text('zip_code', '', ['class' => 'form-control', 'required'])}}
								</div>
								<div class="form-group-row">
									{{ Form::label('logo', 'Logo *', ['class' => 'col-form-label', 'required'])}}
									{{ Form::file('logo', ['class' => '', 'required'])}}
								</div>
								<div class="submit">
									{{ Form::submit('Toevoegen', ['class' => 'btn btn-primary form-submit-btn'])}}
									{{ Form::close()}}
								</div>
						</div>
						
				</div>
		</div>
	</div>
</div>
@endsection
