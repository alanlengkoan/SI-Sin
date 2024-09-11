<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Guru;
use App\Models\Kategori;
use App\Models\Staff;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'count_guru'  => Guru::count(),
            'count_staff' => Staff::count(),
            'informasi'   => Kategori::with(['toInformasi'])->get(),
        ];

        return Template::load('admin', 'Dashboard', 'dashboard', 'view', $data);
    }

    public function count_visitors_day()
    {
        $dates = get_all_dates_in_month(date('Y'), date('m'));

        foreach ($dates as $key => $value) {
            $visitors = Visitor::whereDate('created_at', $value)->count();
            $response[] = [
                'key'   => $value,
                'value' => $visitors,
            ];
        }

        return Response::json($response);
    }

    public function count_visitors_mon()
    {
        $years = get_all_months_in_year(date('Y'));

        foreach ($years as $key => $value) {
            $visitors = Visitor::whereMonth('created_at', $key)->whereYear('created_at', date('Y'))->count();
            $response[] = [
                'key'   => $value,
                'value' => $visitors,
            ];
        }

        return Response::json($response);
    }

    public function count_visitors_loc()
    {
        $visitors = DB::select('SELECT v.city, COUNT( v.city) AS total FROM visitors AS v GROUP BY v.city ORDER BY COUNT( v.city) DESC');

        $response = [];
        foreach ($visitors as $key => $value) {
            $response[] = [
                'key'   => $value->city,
                'value' => $value->total,
            ];
        }

        return Response::json($response);
    }
}
