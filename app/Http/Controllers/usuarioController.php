<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIUsuario;
use App\Http\Controllers\verificacionController;
use Firebase\JWT\JWT;

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
			return redirect('index');
		}
		return view('authentication/login');
	}

	public function paginaPrincipal()
	{
		if (session()->has('dataUsuario')) {
			return view('index');
		}
		return redirect('/vendedor');
	}

	public function mostrarRegistrarUsuario()
	{
		if (session()->has('dataUsuario')) {
			return redirect('index');
		}
		return view('authentication/register');
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
			return redirect('/');
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
			return redirect('/');
		}

		if (verificacionController::validarToken($validarUsuario->message) == false)
		{
			\Session::flash('message', 'Caducó su sesión.');
			return redirect('/');
		} else {
			$data = verificacionController::validarToken($validarUsuario->message);
			session(['dataUsuario' => $data]);
		}

		\Session::flash('message', 'Credenciales correctas.');
		return redirect('index');
	}

	public function visualizarPerfil()
	{
		if (session()->has('dataUsuario')) {
			return view('template/profileUser');
		}
		return redirect('/');
	}

	public function olvidoContrasenia()
	{
		if (session()->has('dataUsuario')) {
			return redirect('index');
		}
		return view('authentication/forgotPasswd');
	}

	public function cerrarSesion()
	{
		if (session()->has('dataUsuario')) {
			session()->forget('dataUsuario');
		}
		\Session::flash('message', 'Salió de la sesión.');
		return redirect('/');
	}

	public function verificarEmail($token)
	{
		$key = 'eTeslaSecret';
		$encrypt = ['HS256'];

		if(!empty($token))
		{
			try {
				$decode = JWT::decode($token, $key, $encrypt);
				$verificacion = $this->usuario->verificacion(['json' => $decode]);

				if ($verificacion->status == 200) {
						//Notificación indicando que se verificó correctamente el correo.
				} else {
						//Notificación indicando que ocurrió un error al verificar el correo en la API.
				}
			} catch (\Exception $e) {
				//Notificación indicando que el token expiró u ocurrió un error al decodificarlo.
				return redirect('/');
			}
		} else {
			//Notificación indicando que el token está vácio o no se recibió ningún token.
		}
		return redirect('/');
	}
}
