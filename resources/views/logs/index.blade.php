@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Logs</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($logs) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Registro</th>
                                <th scope="col">ID do registro</th>
                                <th scope="col">Usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->log_name }}</td>
                                <td>{{ $log->description }}</td>
                                <td>{{ $log->subject_type }}</td>
                                <td>{{ $log->subject_id }}</td>
                                <td>{{ $log->causer_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            {{ $logs->links() }}
                        </div>
                    </div>
                    @else
                    <div class="text-center">
                        Nenhum log a ser exibido!
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
