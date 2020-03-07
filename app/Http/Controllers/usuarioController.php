<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIUsuario;
use App\Http\Controllers\verificacionController;

class usuarioController extends Controller
{
	protected $usuario;

	public function __construct(APIUsuario $usuario)
	{
		$this->usuario = $usuario;
	}

	public function index()
	{
		if (session()->has('dataUsuario')) {
			if (session('dataUsuario')->rol == 5 && session('dataUsuario')->tipoUsuario == 'Vend') {
				return redirect('s');
			}
			return redirect('/');
		}
		return view('authentication/login');
	}

	public function registrarUsuario(Request $request)
	{
		if ($request->rol == 2) { $request["tipoUsuario"] = 'Operac'; }
		if ($request->rol == 3) { $request["tipoUsuario"] = 'GerenteIng'; }
		if ($request->rol == 4) { $request["tipoUsuario"] = 'Ing'; }
		if ($request->rol == 5) { $request["tipoUsuario"] = 'Vend'; }

		$request["telefono"] = 'N/A';
		$request["celular"] = 'N/A';

		$registrarUsuario = $this->usuario->insertar(['json' => $request->all()]);

		if ($registrarUsuario->status == 200) {
			\Session::flash('message', $registrarUsuario->message);
			return redirect('login');
		}
		else {
			\Session::flash('message', $registrarUsuario->message);
			return redirect('register');
		}
	}

	public function validarUsuario(Request $request)
	{
		$validarUsuario = $this->usuario->validar(['json' => $request->all()]);

		if($validarUsuario->status == 500)
		{
			\Session::flash('message', $validarUsuario->message);
			return redirect('login');
		}

		if (verificacionController::validarToken($validarUsuario->token) == false)
		{
			\Session::flash('message', 'Caducó su sesión.');
			return redirect('login');
		} else {
			$data = verificacionController::validarToken($validarUsuario->token);
			session(['dataUsuario' => $data]);
		}

		\Session::flash('message', 'Credenciales correctas.');
		return redirect('s');
	}
}
