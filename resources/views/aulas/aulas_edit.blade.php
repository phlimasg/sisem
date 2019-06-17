@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="pull-right"><a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar outra coisa</a></div>    
    <h1>Adicionar Aula</h1>
@stop

@section('content')
<div class="container-fluid">
    <form action="{{ route('aulas.update', ['id' => Request::segment(3)])}}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-5">
                <label for="">Tema</label>
            <input list="tema" type="text" name="tema" id="" class="form-control" value="{{$aula->tema}}">                
                @error('tema')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror 
            </div>
            <div class="col-sm-3">
                    <label for="">Disciplina</label>
                    <input list="disciplina" type="text" name="disciplina" id="" class="form-control" value="{{$aula->disciplina}}">                    
                    @error('disciplina')
                    <span class="text-danger">*{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-sm-3">
                    <label for="">Professor</label>
                    <input list="professor" type="text" name="professor" id="" class="form-control" value="{{$aula->professor}}">                    
                    @error('professor')
                        <span class="text-danger">*{{ $message }}</span>
                    @enderror
            </div>
        </div>               
        <hr>
        <div class="row">
            <div class="col-offset-sm-2 col-sm-3">
                <button type="submit" class="btn btn-danger"><span class="fa fa-save"></span> Salvar Dados</button>
            </div>
        </div>
    </form>
</div>
@stop