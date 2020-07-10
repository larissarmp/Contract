@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <br/>
        <br/>

        <div class="col-lg-6 text-right">

            <a data-toggle="modal" href="#new-client" class="btn btn-info text-left btn-right-header btn-sm">
                <span class="fa fa-plus"></span> Novo Cliente
            </a>
            <a data-toggle="modal" href="#new-unity" class="btn btn-info text-left btn-right-header btn-sm">
                <span class="fa fa-plus"></span> Nova Unidade
            </a>
            <a data-toggle="modal" href="#new-attestations" class="btn btn-info text-left btn-right-header btn-sm">
                <span class="fa fa-plus"></span> Novo atestado
            </a>
        </div>
        <hr/>

        <form role="form" method="post" action="{!! route('client.update', $client->id) !!}">
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
                    <button type="submit" class="btn btn-right btn-success btn-right-header btn-sm">Alterar
                        </button>
                     <a href="{!! route('unity.destroy', $unity->id) !!}" data-method="delete"  class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-ban-circle"></span> Deletar
        </a>
        </form>
        <hr/>
        <form role="form" method="post" action="{!! route('unity.update', $unity->id) !!}">
        <div class="form-group col-md-4">
                <label>Nome fantasia</label>
                <input type="text" name="fantasy_name" class="form-control" value="{!! $unity->fantasy_name!!}" required>
            </div>
            <div class="form-group col-md-4">
                <label>Integração</label>
                <input type="text" name="integration" class="form-control" value="{!! $unity->integration!!}" required>
            </div>

            <div class="form-group col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{!! $unity->email!!}" required>
            </div>

            <div class="form-group col-md-4">
                <label>Estado</label>
                <input type="text" name="state_abbr" class="form-control" value="{!!$unity->state_abbr !!}" required>
            </div>

            <div class="form-group col-md-12">
                <label>Cidade</label>
                <textarea type="text" name="city" class="form-control" value="{!! $unity->city!!}" required></textarea>
            </div>

            {{-- <div class="form-group col-md-12">
                <label>Imagem</label>
                <input id="input-id" name="image" type="file" class="file form-control input-upload" data-preview-file-type="text">
                <small class="text-muted">Tamanho 620px por 360px</small>
            </div> --}}
            <div class="form-group col-md-6">
                <label>Status</label>
                <select name="status" class="form-control" disabled>
                    <option value="0" {!! $unity->status == \App\Models\Unity::ENABLED ? "selected": "" !!}>Ativado</option>
                    <option value="1" {!! $unity->status == \App\Models\Unity::ENABLED ? "selected": "" !!}>Desativado</option>
                </select>
            </div>
        <button type="submit" class="btn btn-right btn-success btn-right-header btn-sm">Alterar
                        </button>
         <a href="{!! route('unity.destroy', $unity->id) !!}" data-method="delete"  class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-ban-circle"></span> Deletar
        </a>
        </form>
        <hr/>

        <form role="form" method="post" action="{!! route('atestation.update', $attestation->id) !!}">
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
                    <button type="submit" class="btn btn-right btn-success btn-right-header btn-sm">Alterar
                        </button>
             <a href="{!! route('unity.destroy', $unity->id) !!}" data-method="delete"  class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-ban-circle"></span> Deletar
        </a>
        </form>
    </div>
</div>
@include('create_client')
@include('create_attestation')
@include('create_unity')
@endsection