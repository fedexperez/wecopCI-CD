<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers;

use App\Interfaces\OrderReportCreator;
use App\Models\EcoProduct;
use App\Models\Order;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $route = [];
        $route[0] = [Lang::get('order.orders'), 'order.list'];
        $route[1] = [Lang::get('breadcrumbs.show'), 'order.show', $id];

        $data['route'] = $route;
        $order = Order::findOrFail($id);
        $data['order'] = $order;
        $data['address'] = $order->address;
        $title = Lang::get('messages.show_order');
        $id = strval($order->getId());
        $data['pageTitle'] = $title." ".$id;
        $items = $order->items;
        $ecoProducts = [];
        foreach ($items as $item) {
            array_push($ecoProducts, $item->ecoProduct);
        }

        $data['items'] = $ecoProducts;
        return view('order.show')->with('data', $data);
    }

    public function createDocument($type, $id){
        if ($type == 'excel'){
            $reportCreator = app()->makeWith(OrderReportCreator::class, ['arrayOrder' => $type]);
            return $reportCreator->createReport($id);
        }else{
            $reportCreator = app()->makeWith(OrderReportCreator::class, ['arrayOrder' => $type]);
            return $reportCreator->createReport($id);
        }
    }

    public function return($id)
    {
        $data = [];
        $data = Order::find($id);
        $data->return();
        return redirect()->route('order.list');
    }

    public function list()
    {
        $data = [];
        $route = [];
        $route[0] = [Lang::get('order.orders'), 'order.list'];
        $data['route'] = $route;
        $title = Lang::get('order.orders');
        $data['pageTitle'] = $title;
        $data['orders'] = Order::where('user_id', Auth::user()->getId())->get();
        return view('order.list')->with('data', $data);
    }

    public function add($id, Request $request)
    {
        $ecoProducts = $request->session()->get('ecoProducts');
        $ecoProducts[$id] = $request->input('quantity');
        $request->session()->put('ecoProducts', $ecoProducts);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('ecoProducts');
        return back();
    }

    public function showTempOrder(Request $request)
    {
        $data = []; //to be sent to the view

        $user = User::findOrFail(Auth::user()->getId());
        $addresses = $user->address;

        $title = Lang::get('order.order');
        $data['pageTitle'] = $title;
        $listProducts = array();
        $total = 0;
        $ids = $request->session()->get('ecoProducts');
        if ($ids) {
            $listProducts = EcoProduct::findMany(array_keys($ids));
            foreach ($listProducts as $ecoProduct) {
                $qnty = $ids[$ecoProduct->getId()];
                $total = $total + ($ecoProduct->getPrice()*$qnty);
            }
        }

        $route = [];
        $route[0] = [Lang::get('breadcrumbs.order'), 'order.order', 0];
        $data['route'] = $route;

        $data['ids'] = $ids;
        $data['ecoProducts'] = $listProducts;
        $data['total'] = $total;
        $data['addresses'] = $addresses;
        
        return view('order.temp')->with('data', $data);
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $title = Lang::get('order.success');
        $total = 0;
        $ids = $request->session()->get('ecoProducts');
        if ($ids) {
            $listProducts = EcoProduct::findMany(array_keys($ids));
            foreach ($listProducts as $ecoProduct) {
                $qnty = $ids[$ecoProduct->getId()];
                $total = $total + ($ecoProduct->getPrice()*$qnty);
            }
        }

        $user = User::findOrFail(Auth::user()->getId());
        $order = new Order();
        $order->status = 'Ordered';
        $order->payment_type = 'Upon Delivery';
        $order->address_id = $request->input('address_id');
        $order->total = $total;
        $order->user_id = $user->getId();
        $order->save();

        if ($ids) {
            $listProducts = EcoProduct::findMany(array_keys($ids));
            foreach ($listProducts as $ecoProduct) {
                $qnty = $ids[$ecoProduct->getId()];

                $item = new Item();
                $item->subtotal = $ecoProduct->getPrice()*$qnty;
                $item->quantity = $qnty;
                $item->eco_product_id = $ecoProduct->getId();
                $item->order_id = $order->getId();

                $item->save();
            }
        }



        return view('order.buy')->with('data', $data);
    }
}
