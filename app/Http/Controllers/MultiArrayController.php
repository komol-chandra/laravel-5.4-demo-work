<?php

namespace App\Http\Controllers;

use App\MultiArray;
use Illuminate\Http\Request;

class MultiArrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = array (
          array("class_1"=>
              array("id"=>"1","name"=>"komol"),
              array("id"=>"2","name"=>"Himel")
          ),
          array("class_2"=>
              array("id"=>"3","name"=>"komol"),
              array("id"=>"4","name"=>"Himel")
          ),
          array("class_3"=>
              array("id"=>"5","name"=>"komol"),
              array("id"=>"6","name"=>"Himel")
          )
        );
        return view ('Backend.MultiArray.multiArray',["student"=>$student]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MultiArray  $multiArray
     * @return \Illuminate\Http\Response
     */
    public function show(MultiArray $multiArray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MultiArray  $multiArray
     * @return \Illuminate\Http\Response
     */
    public function edit(MultiArray $multiArray)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MultiArray  $multiArray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MultiArray $multiArray)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MultiArray  $multiArray
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultiArray $multiArray)
    {
        //
    }
}
