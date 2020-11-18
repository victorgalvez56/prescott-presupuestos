<?php

namespace App\Http\Controllers;

use App\Models\administrator\Brandings;
use App\Models\administrator\DetailsLogos;
use App\Models\administrator\Logos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralManager extends Controller
{
    public function index(Request $request)
    {
        $customers = User::where('role_id', '=', 4)->get()->toArray();
        return view('general_manager.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        return view('general_manager.show', compact('customer'));
    }

    public function show_logos($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('customer_id','=',$id)
            ->get()
            ->toArray();
        return view('general_manager.show_logos', compact('customer', 'logos'));
    }

    public function add_logo($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        return view('general_manager.add_logo', compact('customer'));
    }

    public function store_logo(Request $request)
    {
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->get()
            ->toArray();
        $customer = User::where('id', '=', $request->get('customer'))->get()->toArray();
        $customer = $customer[0];
        $logo = $request->file('image');
        $extension = $logo->getClientOriginalExtension();
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('brandings.customer_id', '=', $request->get('customer'))
            ->get()
            ->toArray();
        $quantity_logos = count($logos) + 1;

        $filename = "cliente_" . $request->get('customer') ."_number". $quantity_logos . "." . $extension;
        $logo->move('storage/administrator/uploads/logos/', $filename);

        $exist_branding = Brandings::where('customer_id', '=', $request->get('customer'))->get()->toArray();

        if (empty($exist_branding)) {
            $branding_save = new Brandings([
                'customer_id' => $request->get('customer')
            ]);
            $branding_save->save();

            $logo_save = new logos([
                'employee_id' => $request->get('employee'),
                'path' => 'storage/administrator/uploads/logos/' . $filename,
            ]);
            $logo_save->save();

            $details_logo = new DetailsLogos([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'logo_id' => $logo_save['id'],
                'branding_id' => $branding_save['id'],
            ]);
            $details_logo->save();


            return redirect(route('show.logos',$request->get('customer')));

        } else {
            $logo_save = new logos([
                'employee_id' => $request->get('employee'),
                'path' => 'storage/administrator/uploads/logos/' . $filename,
            ]);
            $logo_save->save();
            $details_logo = new DetailsLogos([
                'logo_id' => $logo_save['id'],
                'branding_id' => $exist_branding[0]['id'],
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);
            $details_logo->save();
            return redirect(route('show.logos',$request->get('customer')));

//            return view('general_manager.show_logos',compact('customer','logos'))->with('success', 'Logo  guardado!');
        }

    }
}
