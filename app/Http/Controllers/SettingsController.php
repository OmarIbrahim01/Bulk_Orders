<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function index()
    {
    	$min_qty = Setting::where('name', 'min_quantity')->first();
    	return view('admin.settings.index')->withMin_qty($min_qty);
    }


    public function save_min_quantity(Request $request)
    {
    	$request->validate([
    		'min_qty' => 'required|numeric'
    	]);

    	$min_qty = Setting::where('name', 'min_quantity')->first();
    	$min_qty->value = $request->min_qty;
    	$min_qty->save();

    	session()->flash('message', 'Minimum Quantity Has been Saved Successfully');

    	return back();
    }
}
