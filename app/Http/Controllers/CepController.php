<?php

namespace App\Http\Controllers;

use App\Models\Cep as Cep;
use App\Http\Resources\Cep as CepResource;
use Illuminate\Http\Request;

class CepController extends Controller {

  public function index(){
    $cep = Cep::orderBy('id', 'DESC')->get();
    return $cep;
  }

  public function fuzzySearch($any){
    $search = array();
    $search['cep'] = Cep::where('cep', 'like', "%".$any."%")->get();
    $search['logradouro'] = Cep::where('logradouro', 'like', "%".$any."%")->get();

    return $search;

  }
 

  public function show($cep){

    $cepNaBase = Cep::where('cep', $cep)->first(['cep', 'logradouro']);    

    if(!$cepNaBase){
        $contents = file_get_contents("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);
        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json);

        

        $classCep = new Cep;
        $classCep->cep = $cep;
        $classCep->logradouro = $array->logradouro;

        if( $classCep->save() ){
            return response()->json([
                'success'=>true, 
                'message'=>'CEP cadastrado com sucesso!'
            ]);
        }
    } else {
        return $cepNaBase;
    }

  }

  public function store(Request $request){
    $cep = new Cep;
    $cep->cep = $request->input('cep');
    $cep->logradouro = $request->input('logradouro');

    if( $cep->save() ){
        return response()->json([
            'success'=>true, 
            'message'=>'CEP cadastrado com sucesso!', 
            'data'=> new CepResource( $cep )
        ]);
    }
  }

   public function update(Request $request){
    $cep = Cep::findOrFail( $request->id );
    $cep->cep = $request->input('cep');
    $cep->logradouro = $request->input('logradouro');

    if( $cep->save() ){
      return response()->json([
        'success'=>true, 
        'message'=>'CEP atualizado com sucesso!', 
        'data'=> new CepResource( $cep )
    ]);
    }
  } 

  public function destroy($id){
    $cep = Cep::findOrFail( $id );
    if( $cep->delete() ){
      return response()->json([
        'success'=>true, 
        'message'=>'CEP deletado com sucesso!', 
        'data'=> new CepResource( $cep )
    ]);
    }

  }
}


