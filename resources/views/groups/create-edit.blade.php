@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Grupo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('groups.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ !isset($group) ? route('groups.store') : route('groups.update', [$group->id]) }}">
                        {{ csrf_field() }}
                        {{ isset($group) ? method_field('PUT') : '' }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Nome do grupo: </label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ isset($group) ? $group->name : '' }}">
                                @if ($errors->has('name'))
                                <ul>   
                                    @foreach($errors->get('name') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-bullseye"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
