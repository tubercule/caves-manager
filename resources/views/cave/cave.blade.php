@extends('layouts.app')

@section('content')
 
@include('common.errors')

	<form action="{{ url('cave') }}" method="POST">
	{{ csrf_field() }}

<table>
	<tr>
		<td>
			<label>Nom du site</label>
		</td>
		<td>
			<input type="text" name="name" id="cave-name" value="{{ $cave->name }}"/>
		</td>
	</tr>
	<tr>
		<td>
			<label>Commune</label>
		</td>
		<td>
			<input type="text" name="commune" id="cave-commune" value="{{ $cave->commune }}"/>
		</td>
	</tr>
	<tr>
		<td>
			<label>Cadastre</label>
		</td>
		<td>
			<input type="text" name="cadastre" id="cave-cadastre" value="{{ $cave->cadastre }}"/>
		</td>
	</tr>
	<tr>
		<td>
			<label>Inventaire Patriache</label>
		</td>
		<td>
			<input type="text" name="inv_patriache" id="cave-inv_patriache" value="{{ $cave->inv_patriache }}"/>
		</td>
	</tr>
	<tr>
		<td>
			<label>X Lambert 93</label>
		</td>
		<td>
			<input type="number" name="x_lambert" id="cave-x_lambert" value="{{ $cave->x_lambert }}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Y Lambert 93</label>
		</td>
		<td>
			<input type="number" name="y_lambert" id="cave-y_lambert" value="{{ $cave->y_lambert }}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Longitude</label>
		</td>
		<td>
			<input type="longitude" name="longitude" value="{{ $cave->longitude }}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Lattitude</label>
		</td>
		<td>
			<input type="lattitude" name="lattitude" value="{{ $cave->lattitude }}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Altitude</label>
		</td>
		<td>
			<input type="altitude" name="altitude" value="{{ $cave->altitude }}" />
		</td>
	</tr>
	<tr>
		<td>
			<label>Description de la séquence</label>
		</td>
		<td>
			<textarea name="sequence">{{ $cave->sequence }}</textarea>
		</td>
	</tr>
</table>
	<button type="submit">
	Ajouter cave
	</button>
</form>
@endsection