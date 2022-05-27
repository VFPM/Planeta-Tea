<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-info-{{$id}}">Ver Informacion</a>

<!-- Modal Crear Tipo de Noticia -->
<div class="modal fade" id="modal-info-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form method="post" id="form_news_type_id">
        <input type="hidden" name="_method" id="method_type_news_id" value="">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información de la respuesta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col-sm-12 col-mb-12 col-xl-12">
                        <table id="data" class="dataindex table table-flush"> 
                            <thead class="thead-light">
                                <tr>
                                <th>Información</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>Correo: </td>
                                <td>{{$email}}</td>
                                </tr>
                                <tr>
                                <td>Teléfono: </td>
                                <td>{{$phone}}</td>
                                </tr>
                                <tr>
                                <td>Nombre: </td>
                                <td>{{$name}}</td>
                                </tr>
                                <tr>
                                <td>Asunto: </td>
                                <td>{{$subject}}</td>
                                </tr>
                                <tr>
                                <td>Mensaje: </td>
                                <td>{{$message}}</td>
                                </tr>
                            </tbody>
                        </table>
                            
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>