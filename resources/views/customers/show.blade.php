@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h2>{{ $customer->name }}</h2>
                    <h6>{{ $customer->email }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Telefones para contato</h2>
                            <a href="{{ route('phones.create', ['customer' => $customer->id]) }}" class="btn btn-success btn-sm">
                                Adicionar telefone <i class="fas fa-phone"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @forelse ($customer->phonesByCustomer as $phoneByCustomer)
                                <li class="list-group-item">
                                    {{ $phoneByCustomer->phone }}
                                    <a href="tel:{{ $phoneByCustomer->phone }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?phone=+55{{ $phoneByCustomer->phone }}" class="btn btn-success btn-sm" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="{{ route('phones.edit', ['customer' => $customer->id, 'phone' => $phoneByCustomer->id]) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </li>
                                @empty
                                <li class="list-group-item">Nenhum telefone a ser exibido!</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
