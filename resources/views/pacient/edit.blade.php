@extends('layouts.panel')

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Editar Paciente</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/pacients')}} " class="btn btn-sm btn-success">
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
                <form  action=" {{route('pacient.update',$pacients->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nome">Nome do Paciente</label>
                        <input type="text" name="nome" class="form-control" required value=" {{$pacients->name}} ">
                    </div>

                    <div class="form-group">
                        <label for="nome">Correio electronico</label>
                        <input type="email" name="correio" class="form-control" required value=" {{$pacients->email}} ">
                    </div>

                    <div class="form-group">
                        <label for="nome">Cédula</label>
                        <input type="text" name="cedula" class="form-control" required value=" {{$pacients->cedula}} ">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Telefone</label>
                        <input type="text" name="telefone" class="form-control" value=" {{$pacients->phone}} ">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Actualizar Paciente</button>
                </form>
              </div>
          </div>
        </div>



@endsection

