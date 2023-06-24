<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
S<div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Novo Paciente</h3>
              </div>
              <div class="col text-right">
                <a href="{{url('/pacients')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regressar
                </a>
              </div>

            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <div class="card-body">
                @if ($errors->any())
                @foreach ($errors->all() as $erros)
                  <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-trinagle"></i>
                    <strong>por favor </strong>{{ $erros }}
                  </div>
                @endforeach

                @endif
                <form  action=" {{ url('/pacients') }}  " method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome do Paciente</label>
                        <input type="text" name="name" class="form-control" required value=" {{old('nome')}} ">
                    </div>

                    <div class="form-group">
                        <label for="nome">Correio electronico</label>
                        <input type="email" name="email" class="form-control" required value=" {{old('correio')}} ">
                    </div>

                    <div class="form-group">
                        <label for="nome">Cédula</label>
                        <input type="text" name="cedula" class="form-control" required value=" {{old('cedula')}} ">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Telefone</label>
                        <input type="text" name="phone" class="form-control" value=" {{old('telefone')}} ">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Senha</label>
                        <input type="text" name="password" class="form-control" value=" {{old('password',Str::random(8))}} ">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Criar Pacient</button>
                </form>
              </div>
          </div>
        </div>



@endsection

