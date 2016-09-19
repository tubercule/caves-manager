@extends('layouts.app')

@section('content')

<h1>Selectionnez la période à ajouter</h1>

<form action="{{ url('addperiodtocave') }}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="caveid" value="{{ $cave->id }}">

	<label>Période</label>
	<select name="periodid">
	@foreach ($periods as $period)
		<option value="{{ $period->id }}">{{ $period->name }}</option>
	@endforeach
	</select>
	<textarea name="comment"></textarea>
	<button type="submit">
	Enregistrer
	</button>
</form>

@endsection