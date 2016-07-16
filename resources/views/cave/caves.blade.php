@extends('layouts.app')

@section('content')

@if (count($caves) > 0)
<table>
	<thead>
		<th>Nom</th>
	</thead>
	@foreach ($caves as $cave)
		<tr>
			<td><a href="/cave/{{ $cave->id }}">{{ $cave->name }}</a></td>
		</tr>
		@endforeach
</table>
@endif
<br />
<a href="/cave/create">Nouvelle grotte</a>

@endsection