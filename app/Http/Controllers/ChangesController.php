<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Package;

class ChangesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        return view('changes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'accepted')) {
                $user = User::findOrFail($value);
                $package = Package::findOrFail($user->change);
                $package->users()->detach($user->id);
                $user->change = 0;
                $user->status = false;
                $user->save();
                $package->save();
                return redirect('http://localhost:8000/dashboard');
            } else if (str_contains($key, 'rejected')) {
                $user = User::findOrFail($value);
                $user->change = 0;
                $user->status = false;
                $user->save();
                return redirect('http://localhost:8000/dashboard');
            }
        }


        $user = User::findOrFail($request->all()['user_id']);
        $user->change = $request->all()['change'];
        $user->status = true;
        $user->save();
        return redirect('http://localhost:8000/dashboard');
    }
}
