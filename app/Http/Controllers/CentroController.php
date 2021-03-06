<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Centro;
use App\Policies\CentroPolicy;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $centros = Centro::all();
        return view('centros.index', compact('centros'));
        // return view(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Centro $centro)
    {
        $this->authorize('create',$centro);
        return view('centros.create', compact('centro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $centro = Centro::create($request->all());
        // if($request->hasFile('avatar')){
        //     $centro->avatar = $request->file('avatar')->store('public');
        // }

        $centro = (new Centro)->fill($request->all() );
        $centro->avatar = $request->file('avatar')->store('public');

        $centro->save();
        // Ya lo hace automatico el create $centro->save();
        return redirect()->route('centros.index', $centro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function show(Centro $centro)
    {
        $this->authorize('view',$centro);
        return view('centros.show',compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function edit(Centro $centro)
    {
        $this->authorize('edit',$centro);
        return view('centros.edit',compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        $this->authorize('update',$centro);

        $centro = (new Centro)->fill($request->all() );
        $centro->avatar = $request->file('avatar')->store('public');

        $centro->save();

        return redirect()->route('centros.index', $centro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centro  $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro $centro)
    {
        $this->authorize('delete',$centro);
        $centro->delete();
        return redirect()->route('centros.index');
    }
}
