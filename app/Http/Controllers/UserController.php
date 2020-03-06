<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Vehicle;
use App\Operation;
use App\Visit;


use Illuminate\Http\Request;


class UserController extends Controller
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


        return view('user.index', compact('vehicles', 'visits'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $users = User::findOrFail($id);

        // return view('user.show', compact('users'));
    }


}
