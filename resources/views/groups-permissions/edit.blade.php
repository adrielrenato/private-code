@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Permissões</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('groups-permissions.index', ['group' => $groupPermission->group_id]) }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $groupPermission->permission->name }}</h2>
                    <h6>Grupo: {{ $groupPermission->group->name }}</h6>
                    <form action="{{ route('groups-permissions.update', ['group' => $groupPermission->group_id, 'groupPermission' => $groupPermission->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="custom-control custom-radio">
                            <input type="radio" id="active" name="active" class="custom-control-input" value="1" {{ $groupPermission->active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="active">Ativar</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="inactive" name="active" class="custom-control-input" value="0" {{ !$groupPermission->active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inactive">Inativar</label>
                        </div>
                        <div class="form-group col-md-12 text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-bullseye"></i> Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
