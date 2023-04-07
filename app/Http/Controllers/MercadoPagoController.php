<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Payment;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    //
    public function criarPagamento()
    {
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
        
        $pagamento = new Payment();


    }
    
}
