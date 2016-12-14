@extends('layouts.app')

@section('content')
<div class="panel-body">


<form action="{{ url('biblio') }}" method="POST">
	{{ csrf_field() }}

	<label>Biblio</label>
	<input type="text" name="title" id="biblio-title" value="{{ $biblio->title }}"/>

	<label>Auteur</label>
	<input type="text" name="author" id="biblio-author" value="{{ $biblio->author }}"/>

	<label>Revue</label>
	<input type="text" name="revu" id="biblio-revu" value="{{ $biblio->revu }}"/>

	<label>Année de parution</label>
	<input type="text" name="date" id="biblio-date" value="{{ $biblio->date }}"/>
	<button type="submit">
	Ajouter Biblio
	</button>

</form>

<script type="text/javascript" src="{{ url('js/views/biblio/biblio.js') }}"></script>
</div>
@endsection