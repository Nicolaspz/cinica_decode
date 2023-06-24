@extends('layouts.panel')

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Especialidades</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/especialidades/create')}} " class="btn btn-sm btn-primary">Nova Especialidade</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            @if (session('notifica'))
               <div class="alert alert-success " role="alert">
               {{session('notifica')}}
               </div>

            @endif
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">nome</th>
                  <th scope="col">descrição</th>
                  <th scope="col">Opcões</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($especialidade as $espe)
                   <tr>
                    <td>
                       {{$espe->nome}}
                    </td>
                    <td>
                        {{$espe->descricao}}
                     </td>
                    <td>

                        <form action="{{ route('delete',$espe->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href=" {{url('/especialidades/'. $espe->id. '/edit')}} " class="btn btn-sm btn-primary">Editar</a>
                      <button type="submit"  class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                    </td>
                  </tr>
                @endforeach

               </tbody>
            </table>
          </div>
        </div>



@endsection

