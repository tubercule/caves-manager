@extends('layouts.app')

@section('content')

<div class="content">
<h1>{{ $cave->name }}</h1>
{{ Form::open(['url' => '/cave/' . $cave->id . '/edit', 'method' => 'get'])}}
	{{ Form::submit('Modifier', ['class' => 'btn btn-danger']) }}
{{ Form::close() }}
{{ Form::open(['method' => 'delete']) }}
    {{ Form::hidden('id', $cave->id) }}
    {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
{{ Form::close() }}
<table>
	<tr>
		<td>
			Commune
		</td>
		<td>
			{{ $cave->commune }}
		</td>
	</tr>
	<tr>
		<td>
			Cadastre
		</td>
		<td>
			{{ $cave->cadastre }}
		</td>
	</tr>
	<tr>
		<td>
			Inventaire Patriarche
		</td>
		<td>
			{{ $cave->inv_patriache }}
		</td>
	</tr>
	<tr>
		<td>
			X Lambert 93
		</td>
		<td>
			{{ $cave->x_lambert }}
		</td>
	</tr>
	<tr>
		<td>
			Y Lambert 93
		</td>
		<td>
			{{ $cave->y_lambert }}
		</td>
	</tr>
	<tr>
		<td>
			Longitude
		</td>
		<td>
			{{ $cave->getLongitudeAsString() }}
		</td>
	</tr>
	<tr>
		<td>
			Lattitude
		</td>
		<td>
			{{ $cave->getLattitudeAsString() }}
		</td>
	</tr>
	<tr>
		<td>
			Altitude
		</td>
		<td>
			{{ $cave->altitude }}
		</td>
	</tr>
	<tr>
		<td>
			Description de la séquence
		</td>
		<td>
			{{ $cave->sequence }}
		</td>
	</tr>
</table>

<h3>Fouilles</h3>
@if (count($cave->excavations))
	<ul>
	@foreach ($cave->excavations as $excavation)
		<li>
		<a href="/excavation/{{ $excavation->id }}"> {{ $excavation->start_date }} par {{ $excavation->leader }}</a>
		<br />
		{{ $excavation->comment }}
		<br /><br />
		</li>
	@endforeach
	</ul>
@endif
<a href="/addexcavationtocave/{{ $cave->id }}">Ajouter une fouille</a>

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
		<a href="/removebiblio/{{ $cave->id }}/remove/{{ $biblio->id}}">Dissocier la bilbio</a>
		<br />
		<a href="/cavebiblio/{{ $cave->id }}/edit/{{ $biblio->id}}">Editer le commentaire</a>
		<br /><br />
	</li>
	@endforeach
	</ul>
@endif
<a href="/addbibliotocave/{{ $cave->id }}">Ajouter une biblio</a>

<h3>Périodes</h3>
@if (count($cave->periods) > 0)
	<ul>
	@foreach ($cave->periods as $period)
		<li>
			<p>{{ $period->name }}</p>
			<a href="/removeperiod/{{ $cave->id }}/remove/{{ $period->id }}">Dissocier la période</a>
		</li>
	@endforeach
	</ul>
@endif

<a href="/addperiodtocave/{{ $cave->id }}">Ajouter une période</a>
</div>

@endsection