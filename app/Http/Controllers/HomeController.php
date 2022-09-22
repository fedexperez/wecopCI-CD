<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 * */

namespace App\Http\Controllers;

use App\Models\EcoProduct;
use App\Models\NotEcoProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Http;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['ecoProducts'] = EcoProduct::all();
        $data['temperature'] = Http::get('http://temperature.global/api.php')->json();
        $data['temp']['c'] = round(($data['temperature']['temp'] - 32) * 5/9, 2);
        $data['temp']['f'] = $data['temperature']['temp'];
        $data['dev']['c'] = round(($data['temperature']['dev'] - 32) * 5/9, 2);
        $data['dev']['f'] = $data['temperature']['dev'];

        return view('home.index')->with('data', $data);
    }

    /**
     * This function calculates the emision not emited when selecting any EcoProduct.
     * Using the next fromula: notEcoProductEmison * (ecoProductLife/notEcoProductLife) - ecoProductEmision
     *
     * @param request is an ecoProduct colected from a form.
     * @return back with a messages.
     */
    public function calculateEmision(Request $request)
    {
        $ecoProductId = $request->input('eco_product_id');
        $ecoProduct = EcoProduct::find($ecoProductId);
        $ecoProductEmision = floatval($ecoProduct->getEmision());
        $ecoProductLife = floatval($ecoProduct->getProductLife());
        $notEcoProductId = $ecoProduct->notEcoProduct;
        $notEcoProduct = NotEcoProduct::find($notEcoProductId->getId());
        $notEcoProductEmision = floatval($notEcoProduct->getEmision());
        $notEcoProductLife = floatval($notEcoProduct->getProductLife());

        //Calculate emision
        $emision = $notEcoProductEmision * ($ecoProductLife/$notEcoProductLife) - $ecoProductEmision;
        $IfCalculateMessage = Lang::get('messages.if_calculate_message');
        $StopCalculateMessage = Lang::get('messages.stop_calculate_message');
        $GramsCalculateMessage = Lang::get('messages.grams_calculate_message');
        $message = $IfCalculateMessage . $ecoProduct->getName() . $StopCalculateMessage . strval($emision) . $GramsCalculateMessage;

        return back()->with('emision', $message);
    }
}
