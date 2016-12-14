@extends('layouts.app')

@section('content')
 
@include('common.errors')

<?php

if ($cave->id != 0) {
	echo Form::open(['route' => ['cave.update', $cave], 'method' => 'PUT']);
}
else 
{
	echo Form::open(['url' => '/cave', 'method' => 'POST']);
}

echo Form::label('name', 'Nom du site');
echo Form::text('name', $cave->name);
echo '<br />';

echo Form::label('commune', 'Commune');
echo Form::text('commune', $cave->commune);
echo '<br />';

echo Form::label('cadastre', 'Cadastre');
echo Form::text('cadastre', $cave->cadastre);
echo '<br />';

echo Form::label('inv_patriache', 'Inventaire Patriache');
echo Form::text('inv_patriache', $cave->inv_patriache);
echo '<br />';


echo Form::label('x_lambert', 'X Lambert 93');
echo Form::number('x_lambert', $cave->x_lambert, ['step' => '0.0001']);
echo '<br />';

echo Form::label('y_lambert', 'Y Lambert 93');
echo Form::number('y_lambert', $cave->y_lambert, ['step' => '0.0001']);
echo '<br />';

echo Form::label('altitude', 'Altitude');
echo Form::number('altitude', $cave->altitude);
echo '<br />';

echo Form::label('sequence', 'Description de la séquence');
echo Form::textarea('sequence', $cave->sequence);
echo '<br />';

echo Form::label('longitude_hemi', 'Hémisphère longitude');
echo Form::select('longitude_hemi', ['E' => 'Est', 'O' => 'Ouest'], $cave->longitude_hem);
echo '<br />';
echo Form::label('longitude_deg', 'Longitude °');
echo Form::number('longitude_deg', $cave->longitude_deg);
echo '<br />';
echo Form::label('longitude_min', 'Longitude \'');
echo Form::number('longitude_min', $cave->longitude_min);
echo '<br />';
echo Form::label('longitude_sec', 'Longitude "');
echo Form::number('longitude_sec', $cave->longitude_sec, ['step' => '0.0001']);
echo '<br />';

echo Form::label('lattitude_hemi', 'Hémisphère Latitude');
echo Form::select('lattitude_hemi', ['N' => 'Nord', 'S' => 'Sud'], $cave->lattitude_hem);
echo '<br />';
echo Form::label('lattitude_deg', 'Latitude °');
echo Form::number('lattitude_deg', $cave->lattitude_deg);
echo '<br />';
echo Form::label('lattitude_min', 'Latitude \'');
echo Form::number('lattitude_min', $cave->lattitude_min);
echo '<br />';
echo Form::label('lattitude_sec', 'Latitude "');
echo Form::number('lattitude_sec', $cave->lattitude_sec, ['step' => '0.0001']);
echo '<br />';

if ($cave->id != 0) {
	echo Form::submit('Enregistrer le site', ['class' => 'btn btn-danger']);
}
else {
	echo Form::submit('Ajouter le site', ['class' => 'btn btn-danger']);
}
echo Form::close();
?> 
@endsection