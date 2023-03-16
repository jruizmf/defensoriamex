<?php

namespace App\Http\Controllers;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\JudgmentTypeModel;
use App\Models\JudgmentSubTypeModel as SubTypeModel;
use Illuminate\Http\Request;

class JudgmentType extends Controller
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
        $list = JudgmentTypeModel::all();
        //$templates = TemplateModel::all();
       //$this->addItems();
        return view('judgment-type.index',compact( 'list'));
    }
   

    public function create()
    {
        $judmentSubType = SubTypeModel::all();
        return view('judgment-type.create', compact( 'judmentSubType'));
    }
    public function store(Request $request)
    {
        $item = new JudgmentTypeModel();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->data = $request->input('data');
        $item->save();

        return redirect()->route('juicios-tipo');
    }
    public function edit($id)
    {
        $judmentSubType = SubTypeModel::all();
        $item = JudgmentTypeModel::find($id);
        return view('judgment-type.edit', compact('item', 'judmentSubType'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = JudgmentTypeModel::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->data = $request->input('data');
        $item->save();
        return redirect()->route('juicios-tipo');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = JudgmentTypeModel::find($id);
         $pastel->delete();
         return redirect()->route('juicios-tipo');
     }
     
}
