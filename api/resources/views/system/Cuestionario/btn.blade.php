<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones
    </button>
    <div class="dropdown-menu">
    <a href="{{route('test.active', $id)}}" class="dropdown-item" >Activar test</a>
    <a href="{{route('question.index', $id)}}" class="dropdown-item" >Ver preguntas</a>
    <a href="{{route('test.edit', $id)}}" class="dropdown-item"  >Editar</a>
    <form
        action="{{route('test.destroy', $id)}}"
        class="d-inline formdelete" method="POST">
        @method('DELETE')
        @csrf
        <button class="dropdown-item" type="submit">Eliminar
        </button>
    </form>
  </div>
</div>
<!-- <a href="{{route('test.active', $id)}}" class="btn btn-sm">Activar test</a>
<a href="{{route('question.index', $id)}}" class="btn btn-secondary btn-sm">Ver preguntas</a>
<a href="{{route('test.edit', $id)}}" class="btn btn-success btn-sm" >Editar</a> -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formdelete').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Seguro que desea eliminar el registro?',
            text: "No se podrá recuperar la información eliminada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });

</script>