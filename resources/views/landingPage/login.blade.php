@extends('layouts.app')

@section('content')
<h5 class="text-uppercase">Area do participante</h5>

<!-- form -->
<form action="{{ route('do_login_lp') }}" method="post">
    @csrf
    <input type="hidden" name="typeUser" value="client">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Nome de usuário ou e-mail" name="email" required autofocus>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Senha" name="password" required>
    </div>
    {{--<div class="form-group d-flex justify-content-between align-items-center">--}}
    {{--<div class="custom-control custom-checkbox">--}}
    {{--<input type="checkbox" class="custom-control-input" checked="" id="customCheck1">--}}
    {{--<label class="custom-control-label" for="customCheck1">Lembre de mim</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    <button class="btn btn-primary btn-block">Entrar</button>

    <small class="d-block mt-2"><a href="ROTAAQUI">Quero criar meu cadastro</a></small>
</form>
<!-- ./ form -->
@endsection
