<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;


class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $id = explode("/", $actual_link);
        $id = end($id);

        $order = Order::findOrFail($id);
        $data = [];
        $data['order'] = $order; 
        $data['address'] = $order->address;
        $items = $order->items;
        $ecoProducts = [];
        foreach ($items as $item) {
            array_push($ecoProducts, $item->ecoProduct->getName());
        }
        $data['items'] = $ecoProducts;

        return collect($data);
    }
}