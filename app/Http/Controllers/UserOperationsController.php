<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;
use App\Operation;

use Illuminate\Http\Request;

class UserOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('user.operations.create');

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
        // $user = Auth::user();

        // $data = [
        //     'vehicle_id' => $user->vehicles()->id,
        //     'name' => $request->name,
        //     'parts' => $request->parts,
        //     'price' => $request->price,
        // ];

        $data = $request->all();

        $validatedData = $request->validate([
            'name'       => 'required',
            'parts'      => 'required',
            'price'        => 'required',
        ],
        [
            'name.required'       => 'The operation name is required',
            'parts.required'      => 'The parts changed is required',
            'price.required'        => 'The price  is required',
        ]);
        
        Operation::create($data);


        return redirect()->back();

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
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();

        $vehicle = Vehicle::findOrFail($id);
        $operations = Operation::where("vehicle_id", "=", $vehicle->id)->get();
        return view('user.operations.show', compact('operations', 'vehicle','vehicles'));
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
        
        $operation = Operation::findOrFail($id);
        return view('user.operations.edit', compact('vehicles','operation'));
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
    
        $userId = Auth::user()->id;
        $vehicles = Vehicle::where('user_id',$userId)->get();

        $validatedData = $request->validate([
            'name'       => 'required',
            'parts'      => 'required',
            'price'        => 'required',
        ],
        [
            'name.required'       => 'The operation name is required',
            'parts.required'      => 'The parts changed is required',
            'price.required'        => 'The price  is required',
        ]);


        Operation::findOrFail($id)->update($request->all());
        return view('user.vehicles.index', compact('vehicles'));
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
        Operation::findOrFail($id)->delete();
        return redirect()->back();
    }
}
