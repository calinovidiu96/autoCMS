<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\User;
use App\Vehicle;
use App\Visit;

class UserVisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();

        $visits = Visit::where('user_id', $userId)->get();

        return view('user.visits.index', compact('vehicles', 'visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();
       

        $vehiclesForForm = Vehicle::where('user_id',$userId)->pluck('name', 'id')->all();
        return view('user.visits.create', compact('vehicles','vehiclesForForm', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();
        

        $input = $request->all();
       

        $validatedData = $request->validate([
            'operation_name'     => 'required',
            'schedule_date'      => 'required',
        ],
        [
            'operation_name.required'     => 'The operation name is required',
            'schedule_date'               => 'The schedule date  is required',
        ]);

        $visits = Visit::all();

        Visit::create($input);
        return redirect('/user/visits');

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
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();

        $vehiclesForForm = Vehicle::where('user_id',$userId)->pluck('name', 'id')->all();

        $visit = Visit::findOrFail($id);
        return view('user.visits.edit', compact('visit', 'vehicles', 'vehiclesForForm', 'userId'));
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
        $validatedData = $request->validate([
            'operation_name'     => 'required',
            'schedule_date'      => 'required',
        ],
        [
            'operation_name.required'     => 'The operation name is required',
            'schedule_date'               => 'The schedule date  is required',
        ]);

        $input = $request->all();
        Visit::findOrFail($id)->update($request->all());

        return redirect('user/visits');
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
        Visit::findOrFail($id)->delete();
        return redirect()->back();
    }
}
