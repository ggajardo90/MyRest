<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function index()
    {
        return view("reports.index");
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ], [
            'from.required' => 'Ingrese la fecha de inicio',
            'to.required' => 'Ingrese la fecha de termino',
        ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $sales = Sale::whereBetween("updated_at", [$startDate, $endDate])->where("payment_status", "pagado");
        return view("reports.index")->with([
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $sales->sum("total"),
            "sales" => $sales->get()
        ]);
    }

    public function generate(Request $request)
    {
        return Excel::download(new SalesExport($request->from, $request->to), 'ventas.xlsx');
    }
}
