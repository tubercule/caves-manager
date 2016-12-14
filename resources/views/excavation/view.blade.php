@extends('layouts.app')

@section('content')


Fouille exécuté par {{ $excavation->leader }} <br />
Démarré le {{ $excavation->start_date }} <br />
Commentaire {{ $excavation->end_date }} <br />

<?php
echo Form::open(['method' => 'delete']);
	echo Form::hidden('id', $excavation->id);
	echo Form::submit('Supprimer', ['class' => 'btn btn-danger']);
echo Form::close();
?>
@endsection