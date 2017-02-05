@extends('layouts.app')

@section('content')

<?php
echo Form::open(['url' => '/cave/' . $cave->id . '/edit/' . $biblio->id ,'method' => 'POST']);

echo Form::label('comment', 'Commentaire');
echo Form::textarea('comment', $biblio->pivot->comment);

echo Form::submit('Enregistrer');
echo Form::close();

?>
@endsection