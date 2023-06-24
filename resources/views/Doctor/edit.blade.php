@extends('layouts.panel')
@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Editar Médico</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/doctors')}} " class="btn btn-sm btn-success">
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
                <form  action=" {{url('/doctors/'. $doctors->id. '/edit/update')}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nome">Nome do Médico</label>
                        <input type="text" name="nome" class="form-control" required value=" {{$doctors->name}} ">
                    </div>
                    <div class="form-group">
                        <label for="nome">Especialidade</label>
                       <select name="especialidades[]" id="especialidade" class="form-control selectpicker"
                        data-style="btn-primary" title="Selecionar especialidade" required multiple>
                    @foreach ($especialidades as $espe)
                        <option value="{{$espe->id}}">{{$espe->nome}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="nome">Correio electronico</label>
                        <input type="email" name="correio" class="form-control" required value=" {{$doctors->email}} ">
                    </div>

                    <div class="form-group">
                        <label for="nome">Cédula</label>
                        <input type="text" name="cedula" class="form-control" required value=" {{$doctors->cedula}} ">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Telefone</label>
                        <input type="text" name="telefone" class="form-control" value=" {{$doctors->phone}} ">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Actualizar Médico</button>
                </form>
              </div>
          </div>
        </div>



@endsection
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(()=>{});

    $('#especialidade').selectpicker('val', @json($Ids));
</script>
@endsection

