@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<a href="{{ route('datas.create',['id' => $datas->aula->id]) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nova Aula</a>
    <h1>{{$datas->aula->tema}} - Detalhes</h1>
@endsection
@section('content')

<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">
            Informações da Aula Cadastrada
        </h3>
        <div class="box-body">
            <div class="table-responsive no-padding">
                <table class="table table-hover">
                    <tbody id="myTable">
                        <tr>
                            <th>#</th>
                            <th>Sala</th>
                            <th>Prédio</th>
                            <th>Dia</th>
                            <th>Hora</th>
                            <th></th>
                        </tr>                                                        
                        <tr>
                            <td>{{$datas->id}}</td>
                            <td>{{$datas->sala}}</td>
                            <td>{{$datas->predio}}</td>
                            <td>{{date("d/m/Y", strtotime($datas->dia))}}</td> 
                            <td>{{$datas->aula_ini}}</td> 
                            <td><a href="{{ route('datas.edit', ['id'=>$datas->id]) }}" ><span class="fa fa-pencil"></span></a></td>        
                        </tr>               
                    </tbody>                
                </table>                        
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
        <div class="box-header">
                <a href="{{ route('datas.create',['id' => $datas->id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Turma/Vaga</a>
            <h3 class="box-title">Turmas e Vagas</h3>
        </div>
            <div class="box-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody id="myTable">
                            <tr>
                                <th>#</th>
                                <th>Tema</th>
                                <th>Disc.</th>
                                <th>Prof.</th>                                
                                <th></th>
                            </tr>                            
                            <tr>
                                <td>{{$datas->aula->id}}</td>
                                <td>{{$datas->aula->tema}}</td>
                                <td>{{$datas->aula->disciplina}}</td>
                                <td>{{$datas->aula->professor}}</td>                               
                                <td class="pull-right"><div class="btn-group">
                                        <a href="{{ route('datas.show',['id'=>$datas->aula->id])}}"  class="btn btn-sm btn-primary"><span class="fa fa-eye"></span>  Ver</a>
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('datas.edit', ['id'=>$datas->aula->id]) }}"><span class="fa fa-edit"></span> Editar</a></li>
                                            <li><a data-toggle="modal" data-target="#modal{{$datas->aula->id}}"><span class="fa fa-remove"></span> Remover</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal{{$datas->aula->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Confirma exclusão?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Após o cancelamento, nada poderá ser recuperado!</p>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" onclick="$('#confirmo{{$datas->aula->id}}').toggle(150);">Estou ciente e quero continuar.</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="{{ route('datas.destroy', ['id'=>$datas->aula->id]) }}" class="btn btn-success" id="confirmo{{$datas->aula->id}}" style="display:none">Confirmo</a>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>  
                               
                        </tbody>                
                    </table>                        
                </div>
            </div>        
    </div>
@stop