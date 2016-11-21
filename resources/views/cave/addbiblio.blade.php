@extends('layouts.app')

@section('content')

<h1>Sélection la Bibliographie faisant référence au site {{$cave->name}} </h1>
<form action="{{ url('addbibliotocave')}}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="caveid" value="{{ $cave->id }}"/>

	<select name="biblioid" id="cave-biblio">
		@foreach ($biblios as $biblio)
			<option value="{{ $biblio->id }}">{{ $biblio->title }}</option>
		@endforeach
	</select>
	<br />
	<label>Commentaire</label>
	<br />
	<textarea id="cave-biblio-comment" name="comment"></textarea>
	<button  type="submit">
	Ajouter
	</button>
</form>
@endsection