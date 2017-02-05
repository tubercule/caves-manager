@extends('layouts.app')

@section('content')

	@if (count($periods) > 0)
		<table>
		@foreach ($periods as $period)
			<tr>
				<td> <a href="/period/{{ $period->id }}" >{{ $period->name  }}</a></td>
				<td>
					<form action="/period/{{ $period->id }}" method="POST">
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

	<a href="{{ url('period/create') }}">Nouvelle période</a>
@endsection