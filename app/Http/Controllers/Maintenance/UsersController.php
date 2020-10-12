<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('maintenance.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = AreasModel::where('status','=','available')->get();
        return view('maintenance.batchs.create',compact('areas'));
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
            'area_id'=>'required',
        ]);
        $batchs = new BatchsModel([
            'name' => $request->get('name'),
            'area_id' => $request->get('area_id'),
        ]);
        $batchs->save();
        return redirect('batchs')->with('success', 'Partida Guardada!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function show(Batchs $batchs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = AreasModel::where('status','=','available')->get();
        $batch = BatchsModel::find($id);
        return view('maintenance.batchs.edit', compact('batch','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'area_id'=>'required',
        ]);

        $batch = BatchsModel::find($id);
        $batch->name =  $request->get('name');
        $batch->area_id = $request->get('area_id');
        $batch->save();
        return redirect('/batchs    ')->with('success', 'Partida Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = BatchsModel::find($id);
        $batch->status = 'unavailable';
        $batch->save();
        return redirect('/batchs')->with('success', 'Partida Suspendida!');
    }
}
