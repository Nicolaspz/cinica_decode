@extends('layouts.panel')

@section('content')


<form action="{{url('/horario/store')}}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Gestão de Horário</h3>
            </div>
            <div class="col text-right">
              <button type="submit" class="btn btn-sm btn-primary">Salvar Actualização</button>
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
        <div class="card-body">
            @if (session('errors'))
               <div class="alert alert-danger " role="alert">
                a hora foi actualizada, mais houve os seguintes Erros:
                <ul>
                    @foreach ($errors as $error)
                       <li>{{$error}}</li>
                    @endforeach
                </ul>
               </div>

            @endif
          </div>


        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Dia</th>
                <th scope="col">Activo</th>
                <th scope="col">Turno da Manhã</th>
                <th scope="col">Turno da Tarde</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($horarios as $key=> $horario)
              <tr>
                  <th> {{$days[$key]}} </th>
                  <td>

                      <label class="custom-toggle">
                        <input type="checkbox" name="active[]" value="{{ $key }}"
                        @if($horario->active) checked @endif>
                        <span class="custom-toggle-slider rounded-circle"></span>
                      </label>

                      </td>
                      <td>
                          <div class="row">
                              <div class="col">
                                  <select name="morning_start[]" id="" class="form-control">
                                      @for ($i=8; $i<=11; $i++)
                                        <option value="{{ ($i<10 ? '0' : '') . $i }}:00:00"
                                      @if($i.':00 AM' == $horario->morning_start) @selected(true) @endif>
                                       {{ $i }}:00:00 AM </option>
                                      <option value="{{ ($i<10 ? '0' : '') . $i }}:30:00"
                                      @if($i.':30 AM' == $horario->morning_start) @selected(true) @endif
                                      > {{ $i }}:30:00 AM </option>


                                      @endfor
                                  </select>
                              </div>
                              <div class="col">
                                  <select name="morning_end[]" id="" class="form-control">
                                      @for ($i=8; $i<=11; $i++)

                                      <option value="{{ ($i<10 ? '0' : '') . $i }}:00:00"
                                      @if($i.':00 AM' == $horario->morning_end) @selected(true) @endif>
                                       {{ $i }}:00:00 AM </option>
                                      <option value="{{ ($i<10 ? '0' : '') . $i }}:30:00"
                                      @if($i.':30 AM' == $horario->morning_end) @selected(true) @endif>
                                       {{ $i }}:30:00 AM </option>


                                     @endfor
                                  </select>
                              </div>
                          </div>
                      </td>
                      <td>
                          <div class="row">
                              <div class="col">
                                  <select name="afternoon_start[]" id="" class="form-control">
                                      @for ($i=2; $i<=11; $i++)
                                      <option value="{{ $i+12 }}:00:00"
                                      @if($i.':00 PM' == $horario->afternoon_start) @selected(true) @endif>
                                       {{ $i }}:00 PM </option>
                                      <option value="{{ $i+12 }}:30:00"
                                      @if($i.':30 PM' == $horario->afternoon_start) @selected(true) @endif>
                                       {{ $i }}:30 PM </option>
                                      @endfor
                                  </select>
                              </div>
                              <div class="col">
                                  <select name="afternoon_end[]" id="" class="form-control">
                                      @for ($i=2; $i<=11; $i++)
                                      <option value="{{ $i+12 }}:00:00"
                                      @if($i.':00 PM' == $horario->afternoon_end) @selected(true) @endif>
                                       {{ $i }}:00 PM </option>
                                      <option value="{{ $i+12 }}:30:00"
                                       @if($i.':30 PM' == $horario->afternoon_end) @selected(true) @endif>
                                        {{ $i }}:30 PM </option>
                                      @endfor
                                  </select>
                              </div>
                          </div>
                      </td>
              </tr>
              @endforeach
             </tbody>
          </table>
        </div>
      </div>
</form>



@endsection

