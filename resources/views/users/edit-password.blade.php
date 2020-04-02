@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Alterar senha</h1>
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update_password') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="password">Nova senha: </label>
                                <input type="password" name="password" id="password" class="form-control"> 
                                @if ($errors->has('password'))
                                <ul>   
                                    @foreach($errors->get('password') as $error)
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

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
