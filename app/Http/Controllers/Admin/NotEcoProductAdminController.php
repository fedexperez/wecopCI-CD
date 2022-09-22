<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers\Admin;

use App\Models\NotEcoProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\User;

/**
 * Class NotEcoProductAdminController
 *
 * @package App\Http\Controllers
 */
class NotEcoProductAdminController extends Controller
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
        $title = Lang::get('messages.create_not_eco_products');
        $data['title'] = $title;

        $route = [];
        $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
        $route[1] = [Lang::get('breadcrumbs.create_notecoproduct'), 'admin.notEcoProduct.create'];
        $data['route'] = $route;

        return view('admin.notEcoProduct.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        NotEcoProduct::validate($request);
        NotEcoProduct::create($request->only(['name', 'price', 'emision', 'product_life']));

        return back()->with('success', 'Item created successfully!');
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $title = Lang::get('messages.list_not_eco_products');
        $data['title'] = $title;

        $notEcoProducts = NotEcoProduct::All();
        $data['notEcoProducts'] = $notEcoProducts;
        $route = [];
        $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
        $route[1] = [Lang::get('breadcrumbs.list_notecoproducts'), 'admin.notEcoProduct.list'];
        $data['route'] = $route;

        return view('admin.notEcoProduct.list')->with('data', $data);
    }

    public function show($id)
    {
        $notEcoProduct = NotEcoProduct::find($id);
        if ($notEcoProduct == null) {
            return redirect()->route('admin.notEcoProduct.notFound', ['id' => $id]);
        } else {
            $data = []; //to be sent to the view
            $route = [];
            $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
            $route[1] = [Lang::get('breadcrumbs.list_notecoproducts'), 'admin.notEcoProduct.list'];
            $route[2] = [Lang::get('breadcrumbs.notecoproduct'), 'admin.notEcoProduct.show', $id];
            $data['route'] = $route;
            $data['title'] = $notEcoProduct->getName();
            $data['notEcoProduct'] = $notEcoProduct;
            return view('admin.notEcoProduct.show')->with('data', $data);
        }
    }

    public function notFound()
    {
        return view('admin.notFound');
    }

    public function delete($id)
    {
        $notEcoProduct = NotEcoProduct::findOrFail($id);
        $notEcoProduct->delete();

        return redirect()->route('admin.notEcoProduct.list');
    }
}
