<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
     id="modal-delete-{{$pqturistico->id_paq}}">

    {!! Form::Open(array('action'=>array('PaqueteTuristicoController@destroy',$pqturistico->id_paq),'method'=>'DELETE')) !!}

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span arial-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Paquete Turistico</h4>

            </div>
            <div class="modal-body">
                <p class="text-success">Confirme si desea Eliminar el Paquete Turístico</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>

        </div>

    </div>

    {{Form::Close()}}

</div>