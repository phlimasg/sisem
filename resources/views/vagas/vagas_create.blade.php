@extends('adminlte::page')

@section('title', 'Turmas/vagas')

@section('content_header')      
    <h1>Adicionar Turmas/vagas</h1>
@stop
@section('content')
<div class="container-fluid">
    <form action="{{ route('vagas.store') }}" method="post">
        @csrf    
        <input type="hidden" name="aula_data_id" value="{{$_GET['aula_data_id']}}">
        <div class="row">
                <div class="col-sm-2">
                    <label for="">Turmas</label>
                    <select multiple class="form-control" name="turma[]" size="10">
                        <option value="EMER01">1º EM</option>
                        <option value="EMER02">2º EM</option>
                        <option value="EMER03">3º EM</option>
                        <option value="EFER09">9º EF</option>
                        <option value="EFER08">8º EF</option>
                        <option value="EFER07">7º EF</option>
                        <option value="EFER06">6º EF</option>
                        <option value="EFER05">5º EF</option>
                        <option value="EFER04">4º EF</option>
                        <option value="EFER03">3º EF</option>
                        <option value="EFER02">2º EF</option>
                        <option value="EFER01">1º EF</option>
                      </select>
                    @error('turma')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
                </div>
                <div class="col-sm-3">
                        <label for="">Vagas</label>
                        <input type="text" name="quantidade" id="" class="form-control" value="{{@old('quantidade')}}" placeholder="50">
                        @error('quantidade')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
                </div>                
            </div>    
        <hr>
        <div class="row">
            <div class="col-offset-sm-2 col-sm-3">
                <button type="submit" class="btn btn-danger"><span class="fa fa-save"></span> Adicionar Dados</button>
            </div>
        </div>
    </form>
</div>
@stop
@section('adminlte_js')
<script>
    $(function (){
        $('#dia_libera').mask('00/00/0000 00:00');        
        $('#dia_bloqueia').mask('00/00/0000 00:00'); 
    });
</script>
@stop
