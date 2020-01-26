<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function welcomeMail(Request $request)
    {
        try
        {   
            $nombre = $request->input('inpNombreUser');
            $correo = $request->input('inpMail');
            $passwd = $request->input('inpPasswd');

            $data = array(
                'name' => $nombre,
                'mail' => $correo,
                'passwd' => $passwd,
            );

            Mail::send('mail/welcomeMail', $data, function($msg) use($nombre,$correo){
                $msg->from('sistemas.etesla@gmail.com','A test mail');
                $msg->to('10789@utcv.edu.mx')->subject('Mensaje de prueba');
            });
            
            return 'Mensaje enviado';
            /*$subject = "<strong>Bienvenido a Etesla Paneles solares</strong>";
            $for = $correo;
            Mail::send('mail/welcomeMail',$request->all(), function($msj) use($subject,$for){
                $msj->from("sistemas.etesla@gmail.com","Etesla Paneles Solares: Area Sistemas");
                $msj->subject($subject);
                $msj->to($for);
            });*/
        }
        catch(\Exception $ex)
        {
            throw $ex;
        }
    }
}
