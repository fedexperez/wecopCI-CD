<?php
namespace App\Interfaces;

interface OrderReportCreator {
    public function createReport($items);
}