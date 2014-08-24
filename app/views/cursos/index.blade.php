@extends('layouts.scaffold')
@section('title', 'Cursos - CFB')
@section('main')
<h1>Cursos</h1>

@if ($cursos->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Año</th>
                                <th>Inscriptos</th>
				<th>Inscribiendo</th>
				<th>Vigente</th>
				<th>Fecha Inicio</th>
				<th>Fecha Fin</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($cursos as $curso)
				<tr>
					<td>{{ $curso->nombre }}</td>
					<td>{{ $curso->anio }}</td>
                                        <td>
                                            {{ $curso->inscriptos }}
                                            @if($curso->inscriptos > 0)
                                            <small><a href="{{ URL::action('InscripcionesController@index', $curso->id) }}">[Ver]</a></small>
                                            @endif
                                        </td>
                                        <td>
                                            {{ BS3::bool_to_label($curso->permite_inscripciones) }}
                                            @if($curso->permite_inscripciones)
                                            <small><a href="{{ URL::action('InscripcionesController@create', $curso->id) }}">[Form]</a></small>
                                            @endif
                                        </td>
					<td>{{ BS3::bool_to_label($curso->vigente) }}</td>
					<td>{{ ModelHelper::dateOrNull($curso->inicio) }}</td>
					<td>{{ ModelHelper::dateOrNull($curso->fin) }}</td>
                    <td>
                        {{ link_to_route('cursos.edit', 'Editar', array($curso->id), array('class' => 'btn btn-info')) }}
                        @if($curso->inscriptos == 0)
                        {{ Form::open(array('class' => 'confirm-delete', 'style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('cursos.destroy', $curso->id))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        @else
                            {{ Former::disabled_button('Eliminar')->disabled()->title("No se puede eliminar: hay inscriptos.") }}
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay cursos registrados.
@endif

{{ link_to_route('cursos.create', 'Crear nuevo curso', null, array('class' => 'btn btn-primary')) }}
@stop
