<?php

namespace App\Http\Controllers;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\StateModel;
use App\Models\JudgmentSubTypeModel as SubTypeModel;
use Illuminate\Http\Request;

class State extends Controller
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
        $list = StateModel::all();
        //$templates = TemplateModel::all();
       //$this->addItems();
        return view('states.index',compact( 'list'));
    }
   

    public function create()
    {
        return view('states.create');
    }
    public function store(Request $request)
    {
        $item = new StateModel();
        $item->code = $request->input('code');
        $item->description = $request->input('description');
        $data = array();
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["value"] = $request->input('value_')[$i];
        }
        $item->data = json_encode($data) ;
        $item->save();

        return redirect()->route('estados');
    }
    public function edit($id)
    {
        $item = StateModel::find($id);
        $items = json_decode($item->data);
        return view('states.edit', compact('item','items', 'id'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = StateModel::find($id);
        $item->code = $request->input('code');
        $item->description = $request->input('description');
        $data = array();
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["value"] = $request->input('value_')[$i];
        }
        $item->data = json_encode($data) ;
        $item->save();
        return redirect()->route('estados');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = StateModel::find($id);
         $pastel->delete();
         return redirect()->route('estados');
     }
     
}
