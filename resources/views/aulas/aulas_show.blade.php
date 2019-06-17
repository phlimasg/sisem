@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<a href="{{ route('aulas.create') }}" class="btn btn-primary pull-right"><i class="fa fa-file"></i> Novo Tema</a>
    <h1>{{$aula->tema}} - Detalhes</h1>
@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            Informações da aula/simulado
        </h3>
        <div class="box-body">
            <div class="table-responsive no-padding">
                <table class="table table-hover">
                    <tbody id="myTable">
                        <tr>
                            <th>#</th>
                            <th>Tema</th>
                            <th>Disciplina</th>
                            <th>Professor</th>
                            <th></th>
                        </tr>                                                        
                        <tr>
                            <td>{{$aula->id}}</td>
                            <td>{{$aula->tema}}</td>
                            <td>{{$aula->disciplina}}</td>
                            <td>{{$aula->professor}}</td> 
                            <td><a href="{{ route('aulas.edit', ['id'=>$aula->id]) }}" ><span class="fa fa-pencil"></span></a></td>        
                        </tr>               
                    </tbody>                
                </table>                        
            </div>
        </div>
    </div>
</div>

<div class="box box-danger">
        <div class="box-header">
                <a href="{{ route('datas.create',['id'=>$aula->id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Aula</a>
            <h3 class="box-title">Aulas Cadastradas</h3>
        </div>
            <div class="box-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody id="myTable">
                            <tr>
                                <th>#</th>
                                <th>Sala</th>
                                <th>Prédio</th>
                                <th>Dia</th>
                                <th>Liberação</th>
                                <th>Bloqueio</th>
                                <th>Hora</th>
                                <th>Final</th>
                                <th></th>
                            </tr> 
                            @forelse ($aula->datas as $i)                                                       
                            <tr>
                                <td>{{$i->id}}</td>
                                <td>{{$i->sala}}</td>
                                <td>{{$i->predio}}</td>
                                <td>{{date("d/m/Y", strtotime($i->dia))}}</td>
                                <td>{{date("d/m/Y H:i:s", strtotime($i->dia_libera))}}</td>
                                <td>{{date("d/m/Y H:i:s", strtotime($i->dia_bloqueia))}}</td>
                                <td>{{$i->aula_ini}}</td>
                                <td>{{$i->aula_fim}}</td> 
                                <td class="pull-right"><div class="btn-group">
                                        <a href="{{ route('datas.show',['id'=>$i->id])}}"  class="btn btn-sm btn-primary"><span class="fa fa-eye"></span>  Ver</a>
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ route('datas.edit', ['id'=>$i->id]) }}"><span class="fa fa-edit"></span> Editar</a></li>
                                            <li><a data-toggle="modal" data-target="#modal{{$i->id}}"><span class="fa fa-remove"></span> Remover</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal{{$i->id}}" style="display: none;">
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
                                            <label><input type="checkbox" value="" onclick="$('#confirmo{{$i->id}}').toggle(150);">Estou ciente e quero continuar.</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="{{ route('datas.destroy', ['id'=>$i->id]) }}" class="btn btn-success" id="confirmo{{$i->id}}" style="display:none">Confirmo</a>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>  
                            @empty
                                <h1 class="text-danger"></h1>
                                <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                                        Nenhuma data cadastrada.
                                      </div>
                            @endforelse              
                        </tbody>                
                    </table>                        
                </div>
            </div>        
    </div>
@stop