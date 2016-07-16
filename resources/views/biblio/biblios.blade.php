@extends('layouts.app')

@section('content')

@if (count($biblios) > 0)
	<table>
		<thead>
			<th>Titre</th>
			<th>Auteur</th>
			<th>Revue</th>
			<th>Date</th>
		</thead>
	@foreach ($biblios as $biblio)
		<tr>
			<td> <a href="/biblio/{{ $biblio->id }}" >{{ $biblio->title }}</a></td>
			<td> {{ $biblio->author }} </td>
			<td> {{ $biblio->revu }} </td>
			<td> {{ $biblio->date }} </td>
			<td>
				<form action="/biblio/{{ $biblio->id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit">
						Supprimer
					</button>
				</form>
			</td>
		</tr>
	@endforeach
	</table>
@endif
<br />
<a href="./biblio">Nouvelle Bibliographie</a>

@endsection