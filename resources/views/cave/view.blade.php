@extends('layouts.app')

@section('content')

<div class="content">
<h1>{{ $cave->name }}</h1>

<h3>Fouilles</h3>
@if (count($cave->excavations))
	<ul>
	@foreach ($cave->excavations as $excavation)
		<li>
		<a href="/excavation/{{ $excavation->is }}"> {{ $excavation->start_date }}</a>
		<p>
			{{ $excavation->comment }}
		</p>
		</li>
	@endforeach
	</ul>
@endif


<h3>Biblios</h3>
@if (count($cave->biblios) > 0) 
	<ul>
	@foreach ($cave->biblios as $biblio)
	<li>
		<a href="/biblio/{{ $biblio->id }}">{{ $biblio->title }}</a>
		<br />
		<p>
			{{ $biblio->pivot->comment }}
		</p>
	</li>
	@endforeach
	</ul>
@endif
<a href="/addbibliotocave/{{ $cave->id }}">Ajouter une biblio</a>
</div>

@endsection