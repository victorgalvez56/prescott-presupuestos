<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\AreasModel;
use App\Models\Maintenance\BatchsModel;

use Illuminate\Http\Request;

class BatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batchs = BatchsModel:: join('areas', 'areas.id', '=', 'batchs.area_id')
            ->orderby('batchs.id', 'asc')
            ->select('batchs.*', 'areas.name as name_area')
            ->get();

        return view('maintenance.batchs.index', compact('batchs'));
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
        $batchs = new Batchs([
            'name' => $request->get('name'),
            'area_id' => $request->get('area_id'),
        ]);
        $batchs->save();
        return redirect('batchs')->with('success', 'Batch saved!');

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
    public function edit(Batchs $batchs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batchs $batchs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batchs $batchs)
    {
        //
    }
}
