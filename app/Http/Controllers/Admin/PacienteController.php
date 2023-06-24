<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacients=User::Pacients()->get();
       return view('pacient.index', compact('pacients'));
    }

    public function create(){

        return view('pacient.create');
    }
    public function delete($id){
        $espe=User::find($id);
            $espe->delete();
            $notifica='pacciente eliminado com sucesso!';

            return redirect('/pacients')->with(compact('notifica'));
    }

    public function sendData(Request $request){

        $rules=[
            'name'=> 'required|min:3'
        ];

        $message=[
            'name.required'=>'O nome do médico deve ser Obrigatório',
            'name.min'=>'O nome do médico deve ter mais de 3 caracteres',

        ];
        $this->validate($request,$rules,$message);
        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role'=> 'paciente',
                'password'=>bcrypt($request->input('password'))
            ]
            );

        $notifica='paciente inserido com sucesso!';

        return redirect('/pacients')->with(compact('notifica'));
    }
    public function edit($id){

        $data['pacients']=User::find($id);

        return view('pacient.edit', $data);
    }
    public function Update($id, Request $request){
        $data=User::find($id);
        $data->name=$request->input('nome');
        $data->email=$request->input('correio');
        $data->phone=$request->input('telefone');
        $data->cedula=$request->input('cedula');
        $data->update();

        $notifica='Paciente Alterado com sucesso!';

        return redirect('/pacients')->with(compact('notifica'));
    }
}
