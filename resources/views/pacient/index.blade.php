@extends('layouts.panel')

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Paciente</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/pacients/create')}} " class="btn btn-sm btn-primary">Novo Paciente</a>
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
                  <th scope="col">Correio</th>
                  <th scope="col">Cédula</th>
                  <th scope="col">Opções</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($pacients as $pacient)
                   <tr>
                    <td>
                       {{$pacient->name}}
                    </td>
                    <td>
                        {{$pacient->email}}
                     </td>
                     <td>
                        {{$pacient->cedula}}
                     </td>
                    <td>

                        <form action="{{ route('pacient.delete',$pacient->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href=" {{ route('pacient.edit',$pacient->id)}} " class="btn btn-sm btn-primary">Editar</a>
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

