<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcureSeuCepController extends Controller
{

    public function index(Request $request, $ceps = null)
    {

        if (!$ceps) {

            return "Informe Pelo menos um Cep";
        }

        $data  = [];
        $error = [];
        $ceps  = explode(',', $ceps);

        foreach ($ceps as $key => $cep) {

            $cep = preg_replace('/[^0-9]/', '', $cep);
            $cep = str_replace('-', '', $cep);
            $cep = str_replace(' ', '', $cep);
            dd($cep);

            $posicao = $key + 1;

            if (strlen($cep) != 8) {
                $error[] = "Cep na posição " . $posicao . " está incorreto";
                continue;
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/" . $cep . "/json/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);

            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array()
            );

            $response = curl_exec($ch);
            curl_close($ch);
            $data[] = json_decode($response, true);
        }

        $data = array_merge($data, $error);

        return json_encode($data);
    }
}
