<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiKelasController extends Controller
{
    public function index()
    {
        $response=Http::get('localhost:8001/api/kelas');
        $kelas=json_decode($response->body());
        $data['kelas']=$kelas->data->data;
      
        return view('index.kelas',$data);

    }

    public function create(){
        try{
            $response=Http::post('localhost:8001/api/kelas/create');
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas?->data?->data;
           
            return view('create.kelas',$data);
            

    
        }catch(\Exception $e){
            return $e;
        }
    }

     public function store(Request $request){
        $input = $request->input();
        try{
            $response=Http::post('localhost:8001/api/kelas',$input);
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas?->data;
            return redirect(route('index'));;
        }catch(\Exception $e){
            dd($e);

        }  
     }
    
    //  public function show(Request $request){
    //     $input = $request->input();
    //     try{
            
    //         $response=Http::put('localhost:8001/kelas/{id_kelas}',$input);
    //         $kelas=json_decode($response->body());
    //         dd($response);
    //         $data['kelas']=$kelas?->data;
    //         return view('show.kelas');
    //     }catch(\Exception $e){
    //         dd($e);
    //     }
    //  }
}