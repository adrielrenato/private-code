@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Grupo</h1>
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
                        </div>
                        <div id="phones" class="form-row"></div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block" onclick="addPhone();">Adicionar novo telefone</button>
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

    <div class="form-group col-md-12 border-top d-none" id="phone-number-to-clone">
        <div class="text-right mt-3">
            <button type="button" class="btn btn-danger">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <label>Número do telefone </label>
        <input type="text" name="phone[]" class="form-control">
    </div>
@stop

@section('js')
    <script> 
        function addPhone() {
            const id = Math.floor(Math.random() * 10000000);
            const content = $('#phone-number-to-clone').clone();

            content.removeClass('d-none').removeAttr('id').attr('id', 'div-phone-' + id);
            content.find('button').attr('onclick', 'removePhone(' + id + ')');
            content.find('label').attr('for', '#phone' + id)
            content.find('input').attr('id', '#phone' + id);
            content.appendTo('#phones');
        }

        function removePhone(index) {
            $('#div-phone-' + index).remove();
        }
    </script>
@stop
