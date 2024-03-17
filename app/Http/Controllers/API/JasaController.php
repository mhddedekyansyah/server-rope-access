<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use Exception;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index(){
        try {

            $jasas = Jasa::with(['galleries'])->get();
            $respone = [
                'message' => 'Get All Data Jasa Success',
                'status_code' => 200,
                'data' => [
                    'jasas' => $jasas,
                ],
            ];

            return response()->json($respone);
        } catch (Exception $err) {
             $respone = [
                'message' => 'Get All Data Jasa Failed',
                'status_code' => 401,
            ];

            return response()->json($respone);
        }
    }
}
