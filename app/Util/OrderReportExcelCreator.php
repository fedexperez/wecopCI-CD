<?php
namespace App\Util;

use App\Exports\OrderExport;
use App\Interfaces\OrderReportCreator;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class OrderReportExcelCreator implements OrderReportCreator {
    public function createReport($id)
    {
        $fileName = "Order".$id.".xlsx";
        return Excel::download(new OrderExport, $fileName);
    }
}