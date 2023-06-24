<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\especialidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecialidadeController extends Controller
{
    public function doctors($id){

$users = DB::table('users')
->join('especialidade_users', 'users.id', '=', 'especialidade_users.user_id')
->join('especialidades', 'especialidade_users.especialidade_id', '=', 'especialidades.id')
->where('especialidades.id', $id)
->select('users.id','users.name')
->get();

return response()->json([
    'tickets'=>$users
]);
 }
}
