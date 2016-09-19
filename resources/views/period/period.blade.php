@extends('layouts.app')

@section('content')

	<form action="{{ url('period') }}" method="POST">
	{{ csrf_field() }}

	<label>Nom de la période</label>
	<input type="text" name="name" id="period-name" value="{{ $period->name }}"/>

	<button type="submit">
	Enregistrer
	</button>
	</form>
@endsection