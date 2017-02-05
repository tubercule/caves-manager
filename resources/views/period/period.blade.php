@extends('layouts.app')

@section('content')

<?php

if ($period->id) {
	echo Form::open(['route' => ['period.update', $period], 'method' => 'PUT']);
} else {
	echo Form::open(['url' => '/period', 'method' => 'POST']);
}

echo Form::label('name', 'Nom de la période');
echo Form::text('name', $period->name);
echo '<br />';

echo Form::submit('Enregistrer', ['class' => 'btn btn-danger']);

echo Form::close();
?>

@endsection