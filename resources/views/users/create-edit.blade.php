@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ !isset($user) ? route('users.store') : route('users.update', ['user' => $user->id]) }}" method="post">
                        <div class="form-row">
                            {{ csrf_field() }}
                            {{ isset($user) ? method_field('PUT') : '' }}
                            <div class="form-group col-md-12">
                                <label for="name">Nome do usuário</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Antônio" value="{{ isset($user) ? $user->name : '' }}">
                                @if ($errors->has('name'))
                                <ul>   
                                    @foreach($errors->get('name') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ex: antonio@gmail.com" value="{{ isset($user) ? $user->email : '' }}">
                                @if ($errors->has('email'))
                                <ul>   
                                    @foreach($errors->get('email') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="password">Senha</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @if ($errors->has('password'))
                                <ul>   
                                    @foreach($errors->get('password') as $error)
                                    <li class="text-danger">{{ $error }}</li>   
                                    @endforeach   
                                </ul> 
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="password-confirmation">Repetir senha</label>
                                <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
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
