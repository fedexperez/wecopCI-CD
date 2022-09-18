<?php
namespace App\Util;
use App\Interfaces\OrderReportCreator;
use Illuminate\Http\Request;
use App\Models\Order;
//use Barryvdh\DomPDF\Facade\PDF;
use PDF;

class OrderReportPDFCreator implements OrderReportCreator {

    public function createReport($id)
    {

        $data = []; //to be sent to the view
        $order = Order::findOrFail($id);
        $data['order'] = $order;
        $data['address'] = $order->address;
        $id = strval($order->getId());
        $items = $order->items;
        $ecoProducts = [];
        foreach ($items as $item) {
            array_push($ecoProducts, $item->ecoProduct);
        }

        $data['items'] = $ecoProducts;
        view()->share('data', $data);
        $pdf = PDF::loadView('order.createPDF');
        $fileName = 'order'.$id.'.pdf';
        // download PDF file with download method
        return $pdf->download($fileName);
    }
}
