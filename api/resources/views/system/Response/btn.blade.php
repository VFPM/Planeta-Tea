<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<a href="#" data-toggle="modal" data-target="#modal-info-{{$id}}">Ver Información</a>

<!-- Modal Crear Tipo de Noticia -->
<div class="modal fade" id="modal-info-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Información de la respuesta</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
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
                    
                    <table id="data{{$id}}" class="dataindex table table-flush w-100 table-striped display print" style="width: 100%">
                        <thead class="thead-light">
                        <tr >
                            <th >Pregunta</th>
                            <th >Respuesta</th>
                            <th >Descripción</th>
                        </tr>
                        </thead>
                    </table>
                    
                </div>
                    
            </div>
           
            <div class="modal-footer" id="modal{{$id}}">
                 <!-- onClick="window.print()" -->
                <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="window.print()">Imprimir</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>

    <script>
         $(document).ready(function () {
       
            var table = $('#data{{$id}}').DataTable({
                // "dom": 'Bfrtip',
                // "buttons": [
                    
                //        'print'
                    
                // ],
                "dom": 'Bfrtip',
                "buttons" : [
                    {
                        "extend" : 'print',
                        "text" : 'Imprimir',
                        "exportOptions": {
                            "modifier": {
                                "page": 'current'
                            }
                        }
                    },
                    {
                        "extend" : 'pdf',
                        "text" : 'Descargar PDF',
                        "title" : '{{$name}} respuestas'
                    },
                    {
                        "extend" : 'excel',
                        "text" : 'Descargar EXCEL',
                        "title" : '{{$name}} respuestas'
                    }
                ],
                "columnDefs": [{
                    "targets": '_all',
                    "defaultContent": ""
                }],
                "serverSide": true,
                "header": {
                    "token": "{{ csrf_token() }}",
                },
                "ajax": "{{ url('sistema/test-answers/data/'.$id) }}",
                "columns": [
                    {data: 'question.description', "width": "33%" , "className" : 'text-center'}, 
                    {data: 'answer', "width": "33%"},
                    {data: 'answerDescription.description', "width": "33%"}
                ],                
                "lengthChange": false,
                "ordering": false,
                "searching" : false,
                "autoWidth": false,
                "language" : {
                    "info" : "_TOTAL_ Registro(s)",
                    "emptyTable": "No hay datos",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "paginate" : {
                        "next" : ">",
                        "previous" : "<"
                    }
                }
                
            });

            table.buttons().container()
                .appendTo(
                    $('#modal{{$id}}', table.table().container() )
                );

        });

      
    </script>

