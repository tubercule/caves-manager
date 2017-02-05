@extends('layouts.app')

@section('content')

<?php

echo Form::open(['route' => ['excavation.update', $excavation], 'method' => 'PUT']);
	echo Form::label('leader', 'Fouille dirigé par:');
	echo Form::text('leader', $excavation->leader);

	echo Form::label('start_date', 'Année de début de fouille');
	echo Form::number('start_date', $excavation->start_date);

	echo Form::label('comment', 'Commentaire');
	echo Form::textarea('comment', $excavation->comment);
	
	echo Form::submit('Enregistrer');
echo Form::close();
?>
@endsection