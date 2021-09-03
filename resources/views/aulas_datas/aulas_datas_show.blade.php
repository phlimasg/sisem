@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<a href="{{ route('datas.create',['id' => $datas->aula->id]) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Novo local/horário</a>
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
                <a href="{{ route('vagas.create',['aula_data_id' => $datas->id]) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Turma/Vaga</a>
            <h3 class="box-title">Turmas autorizadas e Vagas</h3>
        </div>
            <div class="box-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody id="myTable">
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Vagas</th>
                                <th>Turma</th>
                            </tr>
                            @php
                            $vagas_id = 0;
                            $menu = 1;  
                            @endphp
                            @forelse ($turmas as $i)
                            @if ($vagas_id != $i->vagas_id)
                                @php
                                    $vagas_id = $i->vagas_id;
                                @endphp
                                <tr>
                                    <td><div class="btn-group">
                                        <a href="{{ route('vagas.edit', ['id'=>$i->vagas_id]) }}" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> Editar</a>
                                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">                                                
                                                <li><a data-toggle="modal" data-target="#modal{{$i->vagas_id}}"><span class="fa fa-remove"></span> Remover</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>{{$i->vagas_id}}</td>
                                    <td>{{$i->quantidade}}</td>                             
                               
                                <div class="modal fade" id="modal{{$i->vagas_id}}" style="display: none;">
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
                                    <td>{{$i->turma}}
                                
                            @else
                                <br>{{$i->turma}}
                            @endif
                            
                                    
                            
                            @empty
                                <h1>Nada Cadastrado</h1>
                            @endforelse                          
                               
                        </tbody>                
                    </table>                        
                </div>
            </div>        
    </div>
@stop