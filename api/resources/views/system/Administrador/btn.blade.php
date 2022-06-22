@if(Auth::user()->id == $id)
    <button href="#" disabled class="btn btn-sm" >Usuario actual</button>
@elseif(!$active)
    <form
        action="{{route('admin.activar', $id)}}"
        class="d-inline" method="POST">
        @method('PATCH')
        @csrf
        <button class="btn btn-success btn-sm" type="submit">Activar usuario
        </button>
    </form>
    {{-- <a href="{{route('news.edit', $id)}}" class="btn btn-success btn-sm" >Activar usuario</a> --}}
@else
    <form
        action="{{route('admin.desactivar', $id)}}"
        class="d-inline" method="POST">
        @method('PATCH')
        @csrf
        <button class="btn btn-danger btn-sm" type="submit">Desactivar usuario
        </button>
    </form>
    {{-- <a href="{{route('news.edit', $id)}}" class="btn btn-danger btn-sm" >Desactivar usuario</a> --}}
@endif