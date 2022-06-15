<div class="row mt-3">
    <div class="col-sm-12">
        <div class="connect-sorting">
            <h5 class="text-center mb-2">DATOS DE VENTA</h5>

       

            <div class="connect-sorting-content mt-4">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">


                        <div class="row justify-content-between mt-5">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($total > 0)
                                <button onclick="Confirm('','clearCart','¿SEGURO DE ELIMINAR LA VENTA?')" class="btn btn-dark mtmobile">CANCELAR</button>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if ($total > 0)
                                <button wire:click.prevent="saveSale" class="btn btn-dark btn-md btn-block">GUARDAR</button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
