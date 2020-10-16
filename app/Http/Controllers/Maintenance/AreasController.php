<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\AreasModel;

use App\Models\User;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = AreasModel::all();

        $areas = AreasModel:: join('users', 'users.id', '=', 'areas.representative_id')
            ->select('areas.*', 'users.name as name_representative')
            ->get();
        return view('maintenance.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representatives = User::where('status','=','available')->get();
        return view('maintenance.areas.create',compact('representatives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'representative_id'=>'required',

        ]);
        $area = new AreasModel([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'representative_id' => $request->get('representative_id'),
        ]);
        $area->save();
        return redirect('areas')->with('success', 'Área Guardada!');

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
        $area = AreasModel::find($id);
        $representatives = User::where('status','=','available')->get();
        return view('maintenance.areas.edit', compact('area','representatives'));
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
        $request->validate([
            'name'=>'required',
            'representative_id'=>'required',
        ]);

        $area = AreasModel::find($id);
        $area->name =  $request->get('name');
        $area->representative_id = $request->get('representative_id');
        $area->save();
        return redirect('/areas    ')->with('success', 'Área actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = AreasModel::find($id);
        $area->status = 'unavailable';
        $area->save();
        return redirect('/areas')->with('success', 'Área Suspendida!');
    }

    public function enable($id)
    {
        $area = AreasModel::find($id);
        $area->status = 'available';
        $area->save();
        return redirect('/areas')->with('success', 'Área Activada!');
    }

}
