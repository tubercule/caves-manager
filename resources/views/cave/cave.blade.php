@extends('layouts.app')

@section('content')
 
@include('common.errors')

	<form action="{{ url('cave') }}" method="POST">
	{{ csrf_field() }}

	<label>Nom du site</label>
	<input type="text" name="name" id="cave-name" value="{{ $cave->name }}"/>

	<button type="submit">
	Ajouter grotte
	</button>
</form>
@endsection