<div aria-hidden="true" aria-labelledby="new-contract" role="dialog" tabindex="-1" id="new-contract" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="post" action="{!! route('contract.store') !!}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-folder"></i> Novo contrato</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Cnpj</label>
                            <input type="text" name="cnpj" class="form-control" required>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Nome fantasia</label>
                            <input type="text" name="fantasy_name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Razão social</label>
                            <input type="text" name="social_season" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control money" required>
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label>Imagem</label>
                            <input id="input-id" name="image" type="file" class="file form-control input-upload" data-preview-file-type="text">
                            <small class="text-muted">Tamanho 620px por 360px</small>
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control" >
                                <option value="0">Desativado</option>
                                <option value="1">Ativado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-info" type="submit"><i class="fa fa-check"></i> Criar contrato</button>
                </div>
            </div>
        </form>
    </div>
</div>