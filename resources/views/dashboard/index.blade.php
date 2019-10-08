@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Dashboard
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
								<div class="card">
									<div class="card-header bg-dark text-white">
										Aanpassen
									</div>
									<div class="card-body">
										<div class="list-group list-group-flush">
											<a href="#" class="list-group-item">Gebruikers aanpassen</a>
											<a href="#" class="list-group-item">Bedrijven aanpassen</a>
                                            <a href="#" class="list-group-item">Reviews aanpassen</a>
                                            <a href="#" class="list-group-item">Crebonummers bekijken</a>
										</div>
									</div>
								</div>
                            </div>
                            {{-- <div class="col-12 col-md-4">
								<div class="card">
									<div class="card-header bg-dark text-white">
										Admin log
									</div>
									<div class="card-body">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Actie 1</li>
											<li class="list-group-item">Actie 1</li>
											<li class="list-group-item">Actie 1</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="card">
									<div class="card-header bg-dark text-white">
										Statistieken
									</div>
									<div class="card-body">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">X gebruikers</li>
											<li class="list-group-item">X bedrijven</li>
											<li class="list-group-item">X reviews</li>
										</ul>
									</div>
								</div>
							</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection