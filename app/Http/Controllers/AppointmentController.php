<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\especialidade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create(){
        $especialidade= especialidade::all();
        $especialitId= old('especialidade_id');
        if($especialitId){
            $especialidade = especialidade::find($especialitId);
           dd($especialidade);
        }
        else {
            $doctors=collect();
        }
        return view('appointment.create', compact('especialidade', 'doctors'));
    }
    public function store(Request $request){
        //dd($request->all());
        $rules=[
        'sheduled_time'=>'required',
        'type'=>'required',
        'descricao'=>'required',
        'medico_id'=>'exists:users,id',
        'especialidade_id'=>'exists:especialidades,id'
        ];
        $messages=[
        'sheduled_time'=>'Deve selecionar Hora válida.',
        'type'=>'Deve selecionar o Tipo de consulta.',
        'descricao'=>'Deve descrever os seus sintomas.',

        ];

        $this->validate($request, $rules, $messages);

        $data=$request->only([
        'sheduled_date',
        'sheduled_time',
        'type',
        'descricao',
        'medico_id',
        'especialidade_id'
        ]);
        $data['pacient_id']=auth()->id();
        $CarbonTime = Carbon::createFromFormat('g:i A', $data['sheduled_time']);
        $data['sheduled_time']= $CarbonTime->format('H:i:s');
        Appointment::create($data);
        $notification= 'Marcação feita com sucesso.!';

        return back()->with(compact('notification'));
    }
}
