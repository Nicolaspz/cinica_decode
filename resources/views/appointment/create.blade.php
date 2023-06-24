<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
S<div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Nova Marcação</h3>
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
                <form  action=" {{ route('reservar.cita') }}  " method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="especialidade">Especialidade</label>
                            <select class="form-control" name="especialidade_id" id="especialidade">
                                <option value="">Selecione a Especialidade</option>
                                @foreach ($especialidade as $item)
                                <option value="{{$item->id}}"
                                    @if(old('especialidade_id')==$item->id) selected @endif >{{$item->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="medico">Médico</label>
                            <select class="form-control" name="medico_id" id="medico">
                                @foreach ($doctors as $item)
                                <option value="{{$item->id}}"
                                    @if(old('medico_id')==$item->id) selected @endif >{{$item->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="nome">Data</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input name="sheduled_date" class="form-control datepicker"
                            id="date" placeholder="Selecionar data"
                             type="date" value="{{ old('sheduled_date'), date('Y-m-d') }}" data-date-format="yyyy-mm-dd"
                             data-date-start-date="{{date('y-m-d')}}" data-date-end-date="+30d"
                             name="sheduled_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Hora de Atendimento</label>
                       <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4 class="m-3" id="titleMorning"></h4>
                                <div id="hoursMorning">
                                    <mark>
                                        <small class="text-warning">
                                            Selecione um Médico e uma Data para ver a Hora ...
                                        </small>
                                    </mark>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="m-3" id="titleAfternoon"></h4>
                                <div id="hoursAfternoon"></div>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="form-group">
                        <label>Tipo de consulta</label>


                <div class="custom-control custom-radio mt-3 mb-3">
                    <input type="radio" id="type1" name="type" class="custom-control-input" value="Consulta"
                    @if(old('type') == 'Consulta') checked @endif >
                    <label class="custom-control-label" for="type1">Consulta</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" id="type2" name="type" class="custom-control-input"
                     @if(old('type') == 'Exame') checked @endif value="Exame">
                    <label class="custom-control-label" for="type2">Exame</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="type3" name="type" class="custom-control-input" value="Operação"
                    @if(old('type') == 'Operação') checked @endif>
                    <label class="custom-control-label" for="type3">Operação</label>
                </div>

                    </div>
                    <div class="form-group">
                        <label for="description">Sintomas</label>
                        <textarea name="descricao" id="descricao" type="text" class="form-control"
                        rows="5" placeholder="Descreve os seus sintomas" required>

                       </textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Regitar Marcação</button>
                </form>
              </div>
          </div>
        </div>



@endsection
@section('scripts')
<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/appointments/create.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection

