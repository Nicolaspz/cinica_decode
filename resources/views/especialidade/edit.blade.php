@extends('layouts.panel')

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Editar Especialidades</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/especialidades')}} " class="btn btn-sm btn-success">
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
                <form  action=" {{url('/especialidades/'. $especialidade->id. '/edit/update')}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nome">Especialidade</label>
                        <input type="text" name="nome" class="form-control" required value=" {{ $especialidade->nome }} ">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" class="form-control" value=" {{$especialidade->descricao}} ">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Actualizar Especialidade</button>
                </form>
              </div>
          </div>
        </div>



@endsection

