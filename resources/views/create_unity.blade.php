<div aria-hidden="true" aria-labelledby="new-unity" role="dialog" tabindex="-1" id="new-unity" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="post" action="{!! route('unity.store') !!}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-folder"></i> Nova unidade</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nome fantasia</label>
                            <input type="text" name="fantasy_name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Integração</label>
                            <input type="text" name="integration" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control money" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Estado</label>
                            <input type="text" name="state_abbr" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Cidade</label>
                            <textarea type="text" name="city" class="form-control" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Imagem</label>
                            <input id="input-id" name="image" type="file" class="file form-control input-upload" data-preview-file-type="text">
                            <small class="text-muted">Tamanho 620px por 360px</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control" disabled>
                                <option value="0">Desativado</option>
                                <option value="1">Ativado</option>
                            </select>
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