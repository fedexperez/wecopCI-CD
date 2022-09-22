<?php

/**
 * WECOP
 *
 * @author clopezr9
 * PHP: 8.0.2
 *
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\User;

/**
 * Class AdminHomeController
 *
 * @package App\Http\Controllers
 */
class AdminHomeController extends Controller
{
    /**
     * This function is run every time an AdminHomeController is instanced. It checks
     * if the user is a client or an admin for access permisions.
     *
     * @return next with the previous request
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

    public function index()
    {
        $data = [];
        $route = [];
        $route[0] = [Lang::get('breadcrumbs.admin'), 'admin.home.index'];
        $data['route'] = $route;
        return view('admin.home.index')->with('data', $data);
    }
}
