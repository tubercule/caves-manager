@extends('layouts.app')

@section('content')


Fouille exécuté par {{ $excavation->leader }} <br />
Démarré le {{ $excavation->start_date }} <br />
Commentaire {{ $excavation->end_date }} <br />

@endsection