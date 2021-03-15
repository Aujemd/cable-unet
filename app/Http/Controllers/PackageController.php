<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Package;
use App\Models\Plan;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('packages.index', [
            'services' => Service::all(),
            'packages' => Package::all(),
            'plans' => Plan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package();
        $package->price = 0;
        $package->user_id = 0;
        $package->name = "test";
        $package->save();
        $price = 0;

        foreach ($request->all() as $key => $value) {
            if ($key != "_token") {
                if (str_contains($key, 'service')) {
                    $service = Service::findOrFail($request->all()["service" . $value]);
                    $service->packages()->attach($package->id);
                    $service->save();
                    $price += $service->price;
                } else if (str_contains($key, 'plan')) {
                    $plan = Plan::findOrFail($request->all()["plan" . $value]);
                    $plan->packages()->attach($package->id);
                    $plan->save();
                    $price += $plan->price;
                }
            }
        }

        $package->price = $price;
        $package->save();
        return redirect('packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
