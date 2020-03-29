@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                Cadastrar novo cliente
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('customers.index') }}" method="get">
                    <div class="card-header">Filtros</div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" value="{{ request()->get('search') }}" placeholder="Ex: email ou telefone">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (count($customers) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <form action="{{ route('customers.destroy', [$customer->id]) }}" method="post">
                                        <a class="btn btn-secondary" href="{{ route('customers.edit', [$customer->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
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
                        Nenhum cliente a ser exibido!
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
