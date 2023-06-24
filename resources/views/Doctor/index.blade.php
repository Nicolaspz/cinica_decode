@extends('layouts.panel')

@section('content')



        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Médicos</h3>
              </div>
              <div class="col text-right">
                <a href=" {{url('/doctors/create')}} " class="btn btn-sm btn-primary">Novo Médico</a>
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
                @foreach ($doctors as $doctor)
                   <tr>
                    <td>
                       {{$doctor->name}}
                    </td>
                    <td>
                        {{$doctor->email}}
                     </td>
                     <td>
                        {{$doctor->cedula}}
                     </td>
                    <td>

                        <form action="{{ route('doctor.delete',$doctor->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href=" {{url('/doctors/'. $doctor->id. '/edit')}} " class="btn btn-sm btn-primary">Editar</a>
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

