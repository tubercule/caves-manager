@extends('layouts.app')

@section('content')
<form action="{{ url('/addexcavationtocave') }}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" value="{{$cave->id}}" name="caveid" />
	
	<label>Date de début de la fouille</label>
	<input name="startdate" type="text" class="datepicker" />
	
	<label>Date de fin de la fouille</label>
	<input name="enddate" type="text" class="datepicker" />

	<label>Chef de fouille</label>
	<input name="leader" type="text" id="excavation-leader" />

	<label>Commentaire</label>
	<textarea name="comment"></textarea>

	<button type="submit">
	Enregistrer
	</button>
</form>
@endsection
