<?php

namespace App\Http\Controllers\Produtos;

use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Services\Prod\ProdService;
use App\Events\Prod;

class ProdController extends Controller
{
    public function index($id) {        
        $prodService = new ProdService();   
        $prod = $prodService->get($id);
        $user = auth()->user();
        //dd($user);
        return view('prod.index',compact('prod','user'));
    }

    public function getProd($id){
        $prodService = new ProdService();
        $prod = $prodService->get($id);
        //broadcast(new Prod($prod)); //atualiza quem esta na escuta
        return response()->json($prod);// retorna a lista
    }

    public function updateProd($id){
        $prodService = new ProdService();
        $prod = $prodService->get($id);
        broadcast(new Prod($prod)); //atualiza quem esta na escuta
        //return response()->json($prod);// retorna a lista
    }

   
}
