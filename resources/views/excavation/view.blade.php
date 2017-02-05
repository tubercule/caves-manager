@extends('layouts.app')

@section('content')


Fouille exécuté par {{ $excavation->leader }} <br />
Démarré le {{ $excavation->start_date }} <br />
Commentaire {{ $excavation->comment }} <br />

<?php
echo Form::open(['url' => '/excavation/' . $excavation->id . '/edit', 'method' => 'get']);
	echo Form::submit('Modifier' );
echo Form::close();

echo Form::open(['method' => 'delete']);
	echo Form::hidden('id', $excavation->id);
	echo Form::submit('Supprimer', ['class' => 'btn btn-danger']);
echo Form::close();
?>
@endsection