@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Permissões</h1>
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Permissão</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupPermissions as $groupPermission)
                            <tr>
                                <th>{{ $groupPermission->permission->name }}</th>
                                <td>
                                    <span class="badge badge-{{ $groupPermission->active ? 'success' : 'secondary' }}">{{ $groupPermission->active ? 'Ativo' : 'Inativo' }}</span>
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('groups-permissions.edit', ['group' => $groupPermission->group_id, 'groupPermission' => $groupPermission->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
