<?php


namespace App\Http\Controllers;


use App\Models\VaccineShipment;
use App\Models\VaccineType;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{

    public function index() {

        $total = Redis::get('vaccine_total', 0);

        return view('welcome', compact('total'));

    }

}
