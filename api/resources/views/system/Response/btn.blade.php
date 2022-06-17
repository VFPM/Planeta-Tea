<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-info-{{$id}}" onclick="test()">Ver Informacion</a>

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
                        <!-- <table id="data2" class="dataindex table table-flush"> 
                            <thead class="thead-light">
                                <tr>
                                <th>Información</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Correo: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Teléfono: </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Nombre: </td>
                                    <td></td>
                                </tr>
                                <th width="10px">No.</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                            </tbody>
                        </table> -->
                        <div class="table-responsive">
                            <table id="data{{$id}}" class="dataindex table table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th width="10px">No.</th>
                                    <th>No. Pregunta</th>
                                    <th>Respuesta</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>


    <script>
         $(document).ready(function () {
            $('#data{{$id}}').DataTable({
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/responses-answers/data/'.$id) }}",
                "columns": [
                    {data: 'id'},
                    {data: 'question_id'},
                    {data: 'answer'}
                ]
            });
        });

        function test(){
            

        }
    </script>

