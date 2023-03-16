<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorrespondentModel;

use App\Models\TemplateModel;

class Correspondent extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $list = CorrespondentModel::all();
        $templates = TemplateModel::all();
        return view('correspondent.index',compact('templates', 'list'));
    }

    public function create()
    {
        return view('correspondent.create');
    }
    public function store(Request $request)
    {
        $item = new CorrespondentModel();
        $item->name = $request->input('name');
        $item->deal  = $request->input('deal');
        $item->license = $request->input('license');
        $item->telephone  = $request->input('telephone');
        $item->email = $request->input('email');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
        $item->district  = "";
        $item->court = "";
        $item->status  = $request->input('status');
        $item->correspondent_id  = $request->input('correspondent_id');

        $item->save();

        return redirect()->route('corresponsales');
    }
    public function edit($id)
    {
        $item = CorrespondentModel::find($id);
        return view('correspondent.edit')->with('item',$item);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');

        $item = CorrespondentModel::find($id);
        $item->name = $request->input('name');
        $item->deal  = $request->input('deal');
        $item->license = $request->input('license');
        $item->telephone  = $request->input('telephone');
        $item->email = $request->input('email');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
         $item->district  = "";
        $item->court = "";
        $item->status  = $request->input('status');
        $item->correspondent_id  = $request->input('correspondent_id');
        $item->save();
        return redirect()->route('corresponsales');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->query('id');
         $item = CorrespondentModel::find($id);
         $item->delete();
         return redirect()->route('corresponsales');
     }
}
