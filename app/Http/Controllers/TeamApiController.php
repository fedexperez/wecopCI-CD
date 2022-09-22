<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


/**
 * Class TeamApiController
 *
 * @package App\Http\Controllers
 */
class TeamApiController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $products = Http::get('http://fteam.tk/api/foodAvailable')->json();
        //$products = json_decode(file_get_contents("json/example.json"), true); 

        $data = [];
        $data['title'] = Lang::get('teamapi.team_api');
        $data['products'] = $products;  

        $average_value = 0;
        $average_ingredients= 0;

        for($i = 0; $i < count($data['products']); $i++ ){
            if($data['products'][$i]['price'] > 0){
                $average_value = $average_value + $data['products'][$i]['price'];
            }
        }

        for($i = 0; $i < count($data['products']); $i++ ){
            if($data['products'][$i]['ingredients'] > 0){
                $average_ingredients = $average_ingredients + count($data['products'][$i]['ingredients']);
            }
        }
 
        $data['average_value'] = ($average_value/count($data['products']));
        $data['average_ingredients'] = ($average_ingredients/count($data['products']));

        //dd($data);

        return view('teamApi.show')->with('data', $data);
        
    }
}

