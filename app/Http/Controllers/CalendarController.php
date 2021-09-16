<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //  追加
    public function index()
    {
        Calendar::all();
    }

    public function show(int $id)
    {
        return response()->json(Calendar::find($id));
    }
}
