<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Opciones
    </button>
    <div class="dropdown-menu">
        <a href="{{route('news.edit', $id)}}" class="dropdown-item" >Editar</a>
        <form
            action="{{route('news.destroy', $id)}}"
            class="d-inline" method="POST">
            @method('DELETE')
            @csrf
            <button class="dropdown-item" type="submit">Eliminar
            </button>
        </form>
    </div> 
</div>


<script>

    $('.formdelete').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro que deseas eliminar el registro?',
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
