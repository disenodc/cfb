<li>
	@if ($req->obligatorio)
	<strong>
	@else
	<span class="text-muted">
	@endif
	{{ $req->requisito }}
	<a href="{{ route('cursos.requisitos.destroy', array($curso->id, $req->id)) }}" data-method="delete" data-remote="true" class="btn btn-xs accion_borrar"><span class="glyphicon glyphicon-remove"></span></a>
	@if ($req->obligatorio)
	</strong>
	@else
	</span>
	@endif
</li>