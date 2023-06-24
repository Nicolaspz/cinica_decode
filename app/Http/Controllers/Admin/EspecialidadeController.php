<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\especialidade;
use Illuminate\Http\Request;


class EspecialidadeController extends Controller
{



    public function index(){
        $data['especialidade']= especialidade::all();

        return view('especialidade.index',$data);
    }

    public function create(){

        return view('especialidade.create');
    }
    public function delete($especiali){
        $espe=especialidade::find($especiali);
            $espe->delete();
            $notifica='especialidade eliminada  com sucesso!';

            return redirect('/especialidades')->with(compact('notifica'));
    }

    public function sendData(Request $request){
        $rules=[
            'nome'=> 'required|min:3'
        ];

        $message=[
            'name.required'=>'O nome da especialidade deve ser Obrigatório',
            'name.min'=>'O nome da especialidade deve ter mais de 3 caracteres',

        ];
        $this->validate($request,$rules,$message);

        especialidade::create([
            'nome'=>$request->input('nome'),
            'descricao'=>$request['descricao'],
        ]);
        $notifica='especialidade inserida com sucesso!';

        return redirect('/especialidades')->with(compact('notifica'));
    }
    public function edit($especialidade){
        $data['especialidade']=especialidade::find($especialidade);
        //dd($data['especialidade']);
        return view('especialidade.edit', $data);
    }
    public function Update($especiali, Request $request){
        $data=especialidade::find($especiali);

        $data->nome=$request->input('nome');
        $data->descricao=$request->input('descricao');
        $data->update();

        $notifica='especialidade Alterada com sucesso!';

        return redirect('/especialidades')->with(compact('notifica'));
    }
}
