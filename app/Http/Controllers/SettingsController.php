<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;


class SettingsController extends Controller
{
    public function index()
    {
    	$min_qty = Setting::where('name', 'min_quantity')->first();
        $admin_users = User::all()->where('permission', 1);
        $users =  User::all()->where('permission', 0);
    	return view('admin.settings.index')->withMin_qty($min_qty)->withAdmins($admin_users)->withUsers($users);
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

    public function set_admin(Request $request)
    {   

        $user = User::findOrFail($request->id);
        $user->permission = 1;
        $user->update();

        session()->flash('message', 'User Settings Saved Successfully');
        return back();
    }

    public function unset_admin(Request $request)
    {   

        $admin = User::findOrFail($request->id);
        $admin->permission = 0;
        $admin->update();

        session()->flash('message', 'User Settings Saved Successfully');
        return back();
    }
}
