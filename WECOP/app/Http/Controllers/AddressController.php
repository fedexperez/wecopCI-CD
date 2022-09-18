<?php

/**
 * WECOP
 *
 * @author Shiroke-013
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

/**
 * Class AddressController
 *
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{

    public function options()
    {
        $data = [];
        $title = Lang::get('messages.address_options');
        $data['pageTitle'] = $title;
        $route = [[Lang::get('breadcrumbs.address'), 'address.options']];
        $data['route'] = $route;
        return view('address.options')->with('data', $data);
    }

    public function show($id)
    {
        $data = [];
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $title = Lang::get('messages.show_address');
        $data['pageTitle'] = $title;
        $route = [];
        $route[0] = [Lang::get('breadcrumbs.address'), 'address.options', 0];
        $route[1] = [Lang::get('breadcrumbs.list'), 'address.list', $id];
        $route[2] = [Lang::get('breadcrumbs.show'), 'address.show', $id];
        $data['route'] = $route;
        $address = Address::findOrFail($id);
        $data['address'] = $address;
        return view('address.show')->with('data', $data);
    }

    public function create()
    {
        $data = [];
        $title = Lang::get('messages.create_address');
        $data['pageTitle'] = $title;
        $route = [];
        $route[0] = [Lang::get('breadcrumbs.address'), 'address.options'];
        $route[1] = [Lang::get('breadcrumbs.create'), 'address.create'];
        $data['route'] = $route;
        return view('address.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Address::validate($request);

        $user = User::findOrFail(Auth::user()->getId());
        $address = new Address;
        $address->postal_code = $request['postal_code'];
        $address->address = $request['address'];
        $address->city = $request['city'];
        $address->country = $request['country'];
        $address->user_id = $user->getId();
        $address->save();
        
        $message = Lang::get('Succesfully added Address');
        return back()->with('success', $message);
    }

    public function delete($id)
    {
        $data = Address::find($id);
        $data->delete();
        return redirect()->route('address.options');
    }

    public function list()
    {
        $data = [];
        $title = Lang::get('messages.address_list');
        $data['pageTitle'] = $title;
        $route = [[Lang::get('breadcrumbs.address'), 'address.options'], [Lang::get('breadcrumbs.list'), 'address.list']];
        $data['route'] = $route;
        $data['address'] = Address::all();
        return view('address.list')->with('data', $data);
    }
}
