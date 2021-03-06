<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\User;
use App\Vehicle;


class UserVehiclesController extends Controller
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
        
        return view('user.vehicles.index', compact('vehicles'));
       
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
        return view('user.vehicles.create', compact('vehicles'));
        
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
        $user = Auth::user();

        $validatedData = $request->validate([
            'name'       => 'required',
            'model'      => 'required',
            'cmc'        => 'required',
            'horsepower' => 'required',
        ],
        [
            'name.required'       => 'The car brand is required',
            'model.required'      => 'The car model is required',
            'cmc.required'        => 'The engine capacity  is required',
            'horsepower.required' => 'The car horsepower is required'
        ]);

        $user->vehicles()->create($input);

        return redirect('/user/vehicles');
    }

   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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

        $vehicle = Vehicle::findOrFail($id);
        return view('user.vehicles.edit', compact('vehicle', 'vehicles'));
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
            'name'       => 'required',
            'model'      => 'required',
            'cmc'        => 'required',
            'horsepower' => 'required',
        ],
        [
            'name.required'       => 'The car brand is required',
            'model.required'      => 'The car model is required',
            'cmc.required'        => 'The engine capacity  is required',
            'horsepower.required' => 'The car horsepower is required'
        ]);

        $input = $request->all();
        Auth::user()->vehicles()->whereId($id)->first()->update($input);

        return redirect('user/vehicles');
  
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
        Vehicle::findOrFail($id)->delete();
        return redirect()->back();
    }

 


}
