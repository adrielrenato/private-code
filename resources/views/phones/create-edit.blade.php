@extends('adminlte::page')

@section('title', 'Telefones')

@section('content_header')
    <h1 class="m-0 text-dark">Telefones</h1>
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
                    @if (isset($phoneByCustomer))
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{ route('phones.destroy', ['customer' => $customer->id, 'phone' => $phoneByCustomer->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Excluir telefone">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                    <form action="{{ !isset($phoneByCustomer) ? route('phones.store', ['customer' => $customer->id]) : route('phones.update', ['customer' => $customer->id, 'phone' => $phoneByCustomer->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ isset($phoneByCustomer) ? method_field('PUT') : '' }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="phone">Número do telefone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ isset($phoneByCustomer) ? $phoneByCustomer->phone : '' }}">
                                @if ($errors->has('phone'))
                                <ul>   
                                    @foreach($errors->get('phone') as $error)
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

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
