<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Horarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HorasController extends Controller
{

   public function hora(Request $request){
    $rules=[
        //'date'=>'required|date_format:"y-m-d',
        'medico_id'=>'required|exists:users,id'
    ];
    $this->validate($request, $rules);
    $date=$request->input('date');
    $dtaCarbon= new Carbon($date);
    $i=$dtaCarbon->dayOfWeek;
    $day=($i==0 ? 6 : $i-1);
    $dactoId=$request->input('medico_id');

    $horario=Horarios::where('active', true)
        ->where('day', $day)
        ->where('user_id', $dactoId)
        ->first([
            'morning_start','morning_end',
            'afternoon_start','afternoon_end'
        ]);
        if(!$horario){
            return[];
        }
        $afternoonIntervalos=$this->getIntervalos(
            $horario->afternoon_start, $horario->afternoon_end
        );
        $morningIntervalos=$this->getIntervalos(
            $horario->morning_start, $horario->morning_end
        );

        $data=[];
        $data['morning']=$morningIntervalos;
        $data['afternoon']=$afternoonIntervalos;
        return $data;
   }
   private function getIntervalos($start, $end){
    $start= new Carbon($start);
    $end= new Carbon($end);
    $intervalos =[];

    while($start < $end){
    $intervalo=[];
    $intervalo['start']=$start->format('g:i A');
    $start->addMinutes(30);
    $intervalo['end']=$end->format('g:i A');
    $intervalos[]=$intervalo;

    }
    return $intervalos;

   }
}
