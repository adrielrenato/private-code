@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Alterar telefone</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('customers.show', ['customer' => $phoneByCustomer->customer_id]) }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{ route('phone_by_customers.destroy', ['phone' => $phoneByCustomer->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Excluir telefone">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('phone_by_customers.update', ['phone' => $phoneByCustomer->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="phone">Número do telefone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ $phoneByCustomer->phone }}">
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

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
