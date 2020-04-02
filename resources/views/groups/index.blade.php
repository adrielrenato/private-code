@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Grupo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('groups.create') }}" class="btn btn-primary">
                Cadastrar novo grupo
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($groups) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>
                                    <form action="{{ route('groups.destroy', ['group' => $group->id]) }}" method="post">
                                        <a class="btn btn-warning btn-sm" href="{{ route('groups-permissions.index', ['group' => $group->id]) }}">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                        <a class="btn btn-secondary btn-sm" href="{{ route('groups.edit', ['group' => $group->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        Nenhum grupo a ser exibido!
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
