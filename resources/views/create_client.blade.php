<div aria-hidden="true" aria-labelledby="new-client" role="dialog" tabindex="-1" id="new-client" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="post" action="{!! route('client.store') !!}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-folder"></i> Novo Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nome fantasia</label>
                            <input type="text" name="	fantasy_name" class="form-control" value = ""required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Cpf</label>
                            <input type="text" name="cpf" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-info" type="submit"><i class="fa fa-check"></i>Incluir</button>
                </div>
            </div>
        </form>
    </div>
</div>