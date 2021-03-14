<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $price = 0;

        foreach ($user->packages as $package) {
            $price += $package->price;
        }

        return view('bill', [
            'user' => $user,
            'price' => $price
        ]);
    }
}
