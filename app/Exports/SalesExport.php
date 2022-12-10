<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Sale;

class SalesExport implements FromView
{
    private $to;
    private $from;
    private $sales;
    private $total;

    public function __construct($from, $to)
    {
        $this->to = $to;
        $this->from = $from;
        $this->sales = $sales = Sale::whereBetween("updated_at", [$from, $to])->where("payment_status", "paid")->get();
        $this->total = $this->sales->sum("total");
    }

    public function view(): View
    {
        return view('reports.export', [
            'total' => $this->total,
            'sales' => $this->sales,
            'startDate' => $this->from,
            'endDate' => $this->to
        ]);
    }
}
