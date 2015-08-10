<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentingController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RentRequest $request
     * @param $id
     * @return Response
     */
    public function store(RentRequest $request, $id)
    {
        $values = explode('-', $request['hiddenTime']);

        $rented_at = $this->makeCarbonTime($values[0]);
        $return_at = $this->makeCarbonTime($values[1]);
        $tool_id = $id;

        Auth::user()->rentedTool()->attach($tool_id, ['rented_at' => $rented_at, 'return_at' => $return_at]);

        $message = 'You have rented the tool for the period from '. $rented_at. 'till'. $return_at;

        return view('tools.index')->with('message', $message);
    }

    public function makeCarbonTime($value)
    {
        $min = $value % 60;
        $hour = ($value - $min) / 60;

        $time = Carbon::create(null, null, null, $hour, $min);

        return $time;
    }
}
