
<a href="{{route('question.edit', ['question' => $id])}}" class="btn btn-success btn-sm" >Editar</a>
<form
    action="{{route('question.destroy', $id)}}"
    class="d-inline formdelete" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit">Eliminar
    </button>
</form>
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