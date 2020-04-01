@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('customers.show', ['customer' => $customer->id]) }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ !isset($customer) ? route('customers.store') : route('customers.update', [$customer->id]) }}">
                        {{ csrf_field() }}
                        {{ isset($customer) ? method_field('PUT') : '' }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nome do cliente: </label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ isset($customer) ? $customer->name : '' }}" placeholder="Exemplo: Antônio">
                                @if ($errors->has('name'))
                                <ul>   
                                    @foreach($errors->get('name') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">E-mail do cliente: </label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ isset($customer) ? $customer->email : '' }}" placeholder="Exemplo: antonio@gmail.com">
                                @if ($errors->has('email'))
                                <ul>   
                                    @foreach($errors->get('email') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-12 text-right mt-3">
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
