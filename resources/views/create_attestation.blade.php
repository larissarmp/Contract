<div aria-hidden="true" aria-labelledby="new-attestations" role="dialog" tabindex="-1" id="new-attestations" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="post" action="{!! route('attestation.store') !!}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-folder"></i> Novo Atestado</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>ID Contrato</label>
                            <input type="text" name="contract_id" class="form-control" value = "" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nome fantasia</label>
                            <input type="text" name="	fantasy_name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Integração</label>
                            <input type="text" name="integration" class="form-control money" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-info" type="submit"><i class="fa fa-check"></i> Incluir</button>
                </div>
            </div>
        </form>
    </div>
</div>