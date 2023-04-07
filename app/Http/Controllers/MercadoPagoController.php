<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    //
    public function process_payment(Request $request)
    {
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));

        $payment = new Payment();

        $payment->transaction_amount    =   (float)$request->input("transaction_amount");
        $payment->token                 =   $request->input("token");
        $payment->description           =   $request->input("description");
        $payment->installments          =   $request->input("installments");
        $payment->payment_method_id     =   $request->input("payment_method_id");
        $payment->issuer_id             =   (int)$request->input("issuer_id");

        $payer = new Payer();

        $payer->email           = $request->input("payer.email");
        $payer->identification  = array(
            "type"      => $request->input("payer.identification.type"),
            "number"    => $request->input("payer.identification.number")
        );

        $payment->payer         = $payer;

        $payment->save();

        $response = array(
            'status'        => $payment->status,
            'status_detail' => $payment->status_detail,
            'id'            => $payment->id
        );

        return json_encode($response);

    }

    public function process_payment_boleto(Request $request)
    {
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));

        $payment = new Payment();
        $payment->transaction_amount    = (float)$request->input('transactionAmount');
        $payment->description           = $request->input('description');
        $payment->payment_method_id     = "bolbradesco";
        $payment->payer = array(
            "email"         => $request->input('email'),
            "first_name"    => $request->input('payerFirstName'),
            "last_name"     => $request->input('payerLastName'),
            "identification" => array(
                "type"   => $request->input('identificationType'),
                "number" => $request->input('identificationNumber')
            ),
            "address" =>  array(
                "zip_code"       => "56300000",
                "street_name"    => "Av. do Descobrimento",
                "street_number"  => "1500",
                "neighborhood"   => "Lapa",
                "city"           => "Rio de Janeiro",
                "federal_unit"   => "RJ"
            )
        );

        $payment->save();

        return view('obrigado', [
            'tipo'      =>  'boleto',
            'url'        =>  $payment->transaction_details->external_resource_url
        ]);
    }
}
