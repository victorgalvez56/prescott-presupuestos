<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\RolesModel;
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
        $users = User::join('roles','users.role_id','=','roles.id')
            ->select('users.*','roles.name as name_rol')
        ->get();
        return view('maintenance.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RolesModel::where('status','=','available')->get();
        return view('maintenance.users.create',compact('roles'));
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
            'email'=>'required',
            'password'=>'required',
            'role_id'=>'required',
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role_id' => $request->get('role_id')
        ]);
        $user->save();
        return redirect('users')->with('success', 'Usuario Guardado!');

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
        $roles = RolesModel::where('status','=','available')->get();
        $user = User::find($id);
        return view('maintenance.users.edit', compact('roles','user'));
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
            'email'=>'required',
            'role_id'=>'required',
        ]);

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role_id');
        $user->save();
        return redirect('/users    ')->with('success', 'Usuario Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batchs  $batchs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->status = 'unavailable';
        $user->save();
        return redirect('/users')->with('success', 'Usuario Desactivado!');
    }

    public function enable($id)
    {
        $user = User::find($id);
        $user->status = 'available';
        $user->save();
        return redirect('/users')->with('success', 'Usuario Activado!');
    }


}
