<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EcoProduct;
use App\Models\NotEcoProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\User;

/**
 * Class ecoProductAdminController
 *
 * @package App\Http\Controllers
 */
class EcoProductAdminController extends Controller
{
    /**
     * This function is run every time an AdminHomeController is instanced. It checks
     * if the user is a client or an admin for access permisions.
     *
     * @return next with the previous request.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            function ($request, $next) {
                if (Auth::user()->getRole() == 'client') {
                    return redirect()->route('home.index');
                }
                return $next($request);
            }
        );
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $title = Lang::get('messages.create_eco_products');
        $data['title'] = $title;

        $route = [];
        $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
        $route[1] = [Lang::get('breadcrumbs.create_ecoproduct'), 'admin.ecoProduct.create'];
        $data['route'] = $route;
      
        $notEcoProducts = NotEcoProduct::all();
        $data['notEcoProducts'] = $notEcoProducts;

        return view('admin.ecoProduct.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        EcoProduct::validate($request);
        EcoProduct::create($request->only(['name', 'price', 'stock', 'facts', 'description', 'categories', 'emision', 'not_eco_product_id', 'product_life', 'photo']));

        return back()->with('success', 'Item created successfully!');
    }

    public function delete($id)
    {
        $notEcoProduct = EcoProduct::find($id);
        $notEcoProduct->delete();

        return redirect()->route('admin.ecoProduct.list');
    }

    public function list()
    {
        $data = [];
        $title = Lang::get('messages.list_eco_products');
        $data['title'] = $title;
        $route = [];
        $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
        $route[1] = [Lang::get('breadcrumbs.list_ecoproducts'), 'admin.ecoProduct.list'];
        $data['route'] = $route;
        $data['ecoProducts'] = ecoProduct::all();

        return view('admin.ecoProduct.list')->with('data', $data);
    }

    public function show($id)
    {
        $ecoProduct = EcoProduct::find($id);
        if ($ecoProduct == null) {
            return redirect()->route('admin.ecoProduct.notFound', ['id' => $id]);
        } else {
            $data = []; //to be sent to the view
            $data['title'] = $ecoProduct->getName();
            $data['ecoProduct'] = $ecoProduct;
            $route = [];
            $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
            $route[1] = [Lang::get('breadcrumbs.list_ecoproducts'), 'admin.ecoProduct.list'];
            $route[2] = [Lang::get('breadcrumbs.ecoproduct'), 'admin.ecoProduct.show', $id];
            $data['route'] = $route;
            return view('admin.ecoProduct.show')->with('data', $data);
        }
    }

    public function notFound()
    {
        return view('admin.notFound');
    }
}
