@extends('layouts.app')

@section('content')

	@if (count($periods) > 0)
		<table>
		@foreach ($periods as $period)
			<tr>
				<td>
					{{ $period->name }}
				</td>
			</tr>
		@endforeach
		</table>
	@endif

	<a href="{{ url('period/create') }}">Nouvelle période</a>
@endsection