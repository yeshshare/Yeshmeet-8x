<?php

namespace App\Services\Prod;


use Illuminate\Http\Request;
use DB;




class ProdService
{

    
    public function get($id){
        $customer_id = 155;
        $prod =  DB::table('plataforma_cursos')
        ->where('id', $id)
        ->where('customer_id', $customer_id)
        ->first();
        return $prod;
    }


    /*
    
    public function get($customer_id)
    {

        $transmissoes = Plataforma_curso::
        join('plataforma_landingpages_cursos','plataforma_cursos.id','plataforma_landingpages_cursos.plataforma_curso_id')
        ->where('customer_id',  $customer_id)
        ->get();

        //dd($transmissoes);
        return $transmissoes;

    }
    
    


    public function count($customer_id)
    {

        $contador = Plataforma_curso::
        selectRaw('plataforma_cursos.id')
        ->selectRaw('count("plataforma_participantes.id") as qtd, plataforma_cursos.titulo as titulo')
        ->join('plataforma_participantes','plataforma_participantes.plataforma_curso_id','plataforma_cursos.id')
        ->where('plataforma_cursos.customer_id',  $customer_id)
        ->where('plataforma_participantes.email', 'not like', '%yesh.com.br%')
        ->where('plataforma_participantes.email', 'not like', '%staff@%')
        ->groupBy('plataforma_cursos.id','plataforma_cursos.titulo')
        ->get();

        //dd($contador);
        return $contador;

    }
    
    
    public function getCards($customer_id)
    {

        $transmissoes = Plataforma_curso::
        join('plataforma_landingpages_cursos','plataforma_cursos.id','=','plataforma_landingpages_cursos.plataforma_curso_id')
        ->select('plataforma_cursos.*')
        -> where('customer_id',  $customer_id)
        ->orderBy('plataforma_landingpages_cursos.posicao_atual')
       ->get();

        //dd($transmissoes);
        return $transmissoes;

    }
    
    
    public function getTransmissao($transmissao_id)
    {

        $transmissao = Plataforma_curso::where('plataforma_cursos.id',  $transmissao_id)
        ->select('plataforma_cursos.*','plataforma_videos.link')
        ->join('plataforma_videos','plataforma_cursos.id','=','plataforma_videos.plataforma_curso_id')
        ->first();
        //dd($transmissao);
        return $transmissao;

    }
    
    
    public function atualizarconfiguracao(Request $request){
        $salaChatService = new  SalaChatService();
        $salaChatService->existe($request->transmissao_id);
        
        
        
        
        
        
        DB::table('plataforma_videos')
        ->where('plataforma_curso_id', $request->transmissao_id)
        ->update([
        	'link' => $request->link
        ]);
        
        if(isset($request->titulo)){
            DB::table('plataforma_cursos')
            ->where('id', $request->transmissao_id)
            ->update([
            	'titulo' => $request->titulo,
            	'plataforma_tipo_curso_id' => $request->plataforma_tipo_curso_id,
            	'chat_moderado' => $request->chat_moderado,
            	'status' => $request->status
            ]);
        }   
        
        if($request->plataforma_tipo_curso_id == 1){
            $salaChatService = new  SalaChatService();
            $existe = $salaChatService->existe($request->transmissao_id);
            if(!$existe){
                $salaChatService->create($request->transmissao_id);
            }
        }
        
        
        
         if(isset($request->data_inicio)){
            DB::table('plataforma_cursos')
            ->where('id', $request->transmissao_id)
            ->update([
            	'inicio' => $request->data_inicio." ".$request->hora_inicio,
            	'horario_agenda' => $request->data_inicio." ".$request->hora_evento
            ]);
        }   
    }
    */
}
