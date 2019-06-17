@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="pull-right"><a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar outra coisa</a></div>    
    <h1>Adicionar Dia/Hora da aula</h1>
@stop
@section('content')
<div class="container-fluid">
    <form action="{{ route('datas.store') }}" method="post">
        @csrf    
        <input type="hidden" name="aula_id" value="{{$_GET['id']}}">
        <div class="row">
                <div class="col-sm-5">
                    <label for="">Local/Sala </label>
                    <input type="text" name="sala" id="" class="form-control" value="{{@old('sala')}}">
                    @error('sala')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
                </div>
                <div class="col-sm-3">
                        <label for="">Prédio</label>
                        <input type="text" name="predio" id="" class="form-control" value="{{@old('predio')}}">
                        @error('predio')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
                </div>                
            </div>    
        <div class="row">
            <div class="col-sm-5">
                <label for="">Dia da Aula </label>
                <input type="date" name="dia" id="" class="form-control" value="{{@old('dia')}}">
                @error('dia')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-3">
                    <label for="">Dia/hora da Liberação</label>
                    <input type="text" name="dia_libera" id="dia_libera" class="form-control" value="{{@old('dia_libera')}}" placeholder="01/01/2019 09:00">
                    @error('dia_libera')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-3">
                    <label for="">Dia/hora do Bloqueio</label>
                    <input type="text" name="dia_bloqueia" id="dia_bloqueia" class="form-control" value="{{@old('dia_bloqueia')}}" placeholder="01/01/2019 09:00">
                    @error('dia_bloqueia')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Início da Aula </label>
                <input type="time" name="aula_ini" id="" class="form-control" placeholder="hora" value="{{@old('aula_ini')}}">
                @error('aula_ini')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-2">
                    <label for="">Fim da Aula</label>
                    <input type="time" name="aula_fim" id="" class="form-control" value="{{@old('aula_fim')}}">
                    @error('aula_fim')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>            
        </div>
        <hr>
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        <div class="row">
            <div class="col-offset-sm-2 col-sm-3">
                <button type="submit" class="btn btn-danger"><span class="fa fa-save"></span> Salvar Dados</button>
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
