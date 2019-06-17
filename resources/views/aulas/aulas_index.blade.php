@extends('adminlte::page')

@section('title', 'AdminLTE')
@section('content_header')
<a href="{{ route('aulas.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar</a>
    <h1>Aulas/Simulados</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="box box-primary">
        <div class="box-header">
            
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="box-title">
                            Listagem das aulas e/ou simulados
                        </h3>
                    </div>                    
                    <div class="col-sm-3 pull-right">
                        <div class="box-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" id="table_search" class="form-control pull-right" placeholder="Procurar">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    
                                </div>                    
                            </div>                
                        </div>
                    </div>                   
                </div>
        </div>
        
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
                        @forelse ($aula as $i) 
                        <tr>
                            <td>{{$i->id}}</td>
                            <td>{{$i->tema}}</td>
                            <td>{{$i->disciplina}}</td>
                            <td>{{$i->professor}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('aulas.show',['id'=>$i->id])}}"  class="btn btn-sm btn-primary"><span class="fa fa-eye"></span>  Ver</a>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('aulas.edit', ['id'=>$i->id]) }}"><span class="fa fa-edit"></span> Editar</a></li>
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
                                    <a type="button" href="{{ action('AulasController@destroy', ['id'=>$i->id]) }}" class="btn btn-success" id="confirmo{{$i->id}}" style="display:none">Confirmo</a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>                        
                        @empty
                            <h3>Nada cadastrado</h3>
                        @endforelse                        
                </tbody>                
            </table>
            <div class="box-footer clearfix">                
                {{ $aula->links() }}
            </div>
        </div>

    </div>
</div>
@stop
@section('adminlte_js')
<script>
$(document).ready(function(){
  $("#table_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@stop