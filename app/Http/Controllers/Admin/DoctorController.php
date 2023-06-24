<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\especialidade;
use App\Models\especialidade_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=User::Doctor()->get();

        return view('Doctor.index', compact('doctors'));
    }

    public function create(){
        $especialidades= especialidade::all();
        return view('Doctor.create', compact('especialidades'));
    }
    public function delete($id){
        $espe=User::find($id);
            $espe->delete();
            $notifica='médico eliminado com sucesso!';

            return redirect('/doctors')->with(compact('notifica'));
    }

    public function sendData(Request $request){
        $qtd=count($request->input('especialidades'));
        $qtdd=$request->input('especialidades');

        $rules=[
            'name'=> 'required|min:3'
        ];

        $message=[
            'name.required'=>'O nome do médico deve ser Obrigatório',
            'name.min'=>'O nome do médico deve ter mais de 3 caracteres',

        ];
        $this->validate($request,$rules,$message);
        $user=User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role'=> 'doctor',
                'password'=>bcrypt($request->input('password'))
            ]
            );
            if($qtd > 0){
                for ($i=0; $i < $qtd-1 ; $i++) {
                    especialidade_user::create([
                        'user_id'=>$user->id,
                        'especialidade_id'=>$qtdd[$i]
                    ]);
                }

            }
            //$user->especialidade()->attach();
        $notifica='médico criado com sucesso!';

        return redirect('/doctors')->with(compact('notifica'));
    }
    public function edit($id){

        $doctors=User::find($id);
        $especialidades= especialidade::all();
        $Ids = DB::table('especialidades')
        ->join('especialidade_users', 'especialidades.id', '=', 'especialidade_users.especialidade_id')
        ->where('especialidade_users.user_id', $doctors->id)
        ->pluck('especialidades.id')
        ->toArray();

        //dd($Ids);
        return view('Doctor.edit', compact('doctors','especialidades','Ids'));
    }
    public function Update($id, Request $request){
        $data=User::find($id);
        $data->name=$request->input('nome');
        $data->email=$request->input('correio');
        $data->phone=$request->input('telefone');
        $data->cedula=$request->input('cedula');
        $data->update();
        $qtd=count($request->input('especialidades'));
        $qtdd=$request->input('especialidades');
        //dd($qtdd);
        especialidade_user::where('user_id', $data->id)->delete();

        for ($i = 0; $i < $qtd; $i++) {
            especialidade_user::create(
                [
                    'user_id' => $data->id,
                    'especialidade_id' => $qtdd[$i]
                ]
            );
        }

        $notifica='médico Alterado com sucesso!';


        return redirect('/doctors')->with(compact('notifica'));
    }
}
