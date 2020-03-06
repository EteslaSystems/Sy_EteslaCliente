<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class verificacionController extends Controller
{
	public static function validarToken($token)
	{
		$key = 'eTeslaSecret';
		$encrypt = ['HS256'];

		if(!empty($token))
		{
			try {
				return $decode = JWT::decode($token, $key, $encrypt);
			} catch (\Exception $e) {
				return false;
			}
		}
		return false;
	}
}
