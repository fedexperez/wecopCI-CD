<?php
namespace App\Providers;

use App\Interfaces\OrderReportCreator;
use App\Util\OrderReportExcelCreator;
use App\Util\OrderReportPDFCreator;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OrderReportCreator::class, function ($app, $items){
            $order_report = $items["arrayOrder"];
            if ($order_report == "excel"){
                return new OrderReportExcelCreator($items);
            }else{
                return new OrderReportPDFCreator($items);
            }
        });
    }
}