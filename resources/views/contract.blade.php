@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <br/>
            <br/>
            <div class="row title-page-header">
           
                <div class="col-lg-6">
                    <h2>Contrato <span class="label label-primary"></span></h2>
                </div>


                <div class="col-lg-6 text-right">

                    <a data-toggle="modal" href="#new-contract" class="btn btn-info text-left btn-right-header btn-sm">
                        <span class="fa fa-plus"></span> Novo Contrato
                    </a>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="filter">
                            <thead>
                            <tr>
                                <th></th>
                                <th>CNPJ</th>
                                <th >Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>email</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contract as $contract)
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                         <a href="{!! route('contract.show', $contract->id) !!}" class="btn-sm btn-link">#{!! $contract->id !!}-{!! $contract->cnpf !!}</a><br>
                                    </div>
                                </td>
                                <td>
                                    <a href="{!! route('contract.show', $contract->id) !!}" class="btn-sm btn-link">{!! $contract->fantasy_name !!}</a>
                                </td>
                                <td>
                                    <a href="{!! route('contract.show', $contract->id) !!}" class="btn-sm btn-link">{!! $contract->social_season !!}</a><br>
                                </td>
                                <td>
                                    <a href="{!! route('contract.show', $contract->id) !!}" class="btn-sm btn-link">{!! $contract->email !!}</a>
                                </td>
                                <td>
                                    {!! $contract->status_formatted !!}
                                </td>
                                <td>
                                
                                <a href="{!! route('contract.show', $contract->id) !!}" class="btn btn-default btn-xs">
                                    <i class="fa fa-folder"></i> Detalhes
                                </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@include('create_contract')

@endsection