<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class HomeController extends Controller
{
    public function sendContact(Request $request)
    {
        $mensaje = "";
        $header = 'From: ' . $request->email . " \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";

        $mensaje .= "Su e-mail es: " . $request->email . " \r\n";
        $mensaje .= "Mensaje: " . $request->consulta . " \r\n";
        $mensaje .= "Enviado el " . date('d/m/Y', time());

        $para = 'info@terciariourquiza.edu.ar';
        $asunto = 'Consulta';

        mail($para, $asunto, utf8_decode($mensaje), $header);

        return view('index');
    }
}
