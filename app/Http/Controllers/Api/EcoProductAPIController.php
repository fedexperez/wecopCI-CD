<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers\Api;

use App\Http\Resources\EcoProductResource;
use App\Http\Controllers\Controller;
use App\Models\EcoProduct;

/**
 * Class ecoProductController
 *
 * @package App\Http\Controllers
 */
class EcoProductAPIController extends Controller
{
    public function index()
    {
        return EcoProductResource::collection(EcoProduct::all());
    }

}
