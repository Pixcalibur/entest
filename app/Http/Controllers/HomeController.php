<?php


namespace App\Http\Controllers;


use App\Http\Requests\Volunteer\CreateRequest;
use App\Models\VaccineType;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{

    public function index()
    {
        $total = Redis::get('vaccine_total', 0);
        $vaccineTypes = VaccineType::all();

        return view('welcome', compact('total', 'vaccineTypes'));
    }

    public function volunteer(CreateRequest $request)
    {
        $fields = $request->except(['_method', '_token']);

        $volunteer = new Volunteer($fields);
        $volunteer->save();

        return redirect()->route('home');
    }

}
