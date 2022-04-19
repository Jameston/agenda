<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Usuarios;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsuariosController extends Controller
{

    public function register(Request $request)
    {
        return Usuarios::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
    }

}
