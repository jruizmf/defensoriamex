<?php

namespace App\Http\Controllers;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\JudgmentTypeModel;
use App\Models\JudgmentSubTypeModel;
use App\Models\EventModel;
use Illuminate\Http\Request;
use DB;

class Event extends Controller
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
       // $list = JudgmentSubTypeModel::all();
        $list = DB::table('event')->get();
        return view('event.index',compact( 'list'));
    }
    public function byId($judmentTypeId)
    {
        $list = EventModel::find($judmentTypeId);
     
        return response()->json([
            'status' => 'success',
            'data' => $list,
        ], 200);
    }
    public function create()
    {   
        return view('event.create');
    }
    public function store(Request $request)
    {
        $item = new EventModel();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->file->getClientOriginalName();
            $item->url = $fileName;
            $request->file('file')->storeAs('documents/templates', $fileName);
        }
        
        $data = array();
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["description"] = $request->input('description_')[$i];
            $data[$i]["type"] = $request->input('type_')[$i];
            $data[$i]["options"] = explode(",",$request->input('options_')[$i]);
         
        }
       
        $item->data = json_encode($data) ;
        $item->save();

        return redirect()->route('ocursos');
    }
    public function edit($id)
    {
        $item = EventModel::find($id);
        $items = json_decode($item->data);
        
        return view('event.edit', compact('item', 'items'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = EventModel::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->file->getClientOriginalName();
            $item->url  = $fileName;
            $request->file('file')->storeAs('documents/templates', $fileName);
        }
        $data = array();
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["description"] = $request->input('description_')[$i];
            $data[$i]["type"] = $request->input('type_')[$i];
            $data[$i]["options"] = explode(",",$request->input('options_')[$i]);
         
        }
        
        $item->data = json_encode($data) ;
        $item->save();
        return redirect()->route('ocursos');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = EventModel::
         find($id);
         $pastel->delete();
         return redirect()->route('ocursos');
     }
     
}
