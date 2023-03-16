<?php

namespace App\Http\Controllers;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\JudgmentTypeModel;
use App\Models\JudgmentSubTypeModel;
use App\Models\CorrespondentModel;
use Illuminate\Http\Request;
use DB;

class JudgmentSubType extends Controller
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
    public function index($typeId)
    {
       // $list = JudgmentSubTypeModel::all();
        $list = DB::table('judgment_subtype')
        ->leftjoin('judgment_type', 'judgment_subtype.judgment_type_id', '=', 'judgment_type.id')
        ->where('judgment_subtype.judgment_type_id', $typeId)
        ->select('judgment_subtype.*', 'judgment_type.name as type_name')
        ->get();
        $judmentTypeId = $typeId;
        return view('judgment-subtype.index',compact( 'list', 'judmentTypeId'));
    }
    public function byId($judmentTypeId)
    {
        $list = JudgmentSubTypeModel::find($judmentTypeId);
     
        return response()->json([
            'status' => 'success',
            'data' => $list,
        ], 200);
    }
    public function bytype($judmentTypeId)
    {
        $list = DB::table('judgment_subtype')->where('judgment_subtype.judgment_type_id', $judmentTypeId)->get();
     
        return response()->json([
            'status' => 'success',
            'data' => $list,
        ], 200);
    }
    public function create($judmentTypeId)
    {
        return view('judgment-subtype.create', compact( 'judmentTypeId'));
    }
    public function store(Request $request)
    {
        $item = new JudgmentSubTypeModel();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->judgment_type_id = $request->input('judgment_type_id');
        $data = array();
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["description"] = $request->input('description_')[$i];
            $data[$i]["type"] = $request->input('type_')[$i];
            $data[$i]["options"] = explode(",",$request->input('options_')[$i]);
         
        }
        $item->data = json_encode($data) ;
        $item->save();
        $typeId = $request->input('judgment_type_id');
        return redirect("/juicios-subtipo/{$typeId}");
    }
    public function edit($id)
    {
        $judgmentSubType = CorrespondentModel::all();
        $item = JudgmentSubTypeModel::find($id);
        $judmentTypeId = $item->judgment_subtype_id;
       
        
        $items = json_decode($item->data);
     
        return view('judgment-subtype.edit', compact('item', 'judgmentSubType', 'judmentTypeId', 'items'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = JudgmentSubTypeModel::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        for ($i=0; $i < count($request->input('name_')); $i++) { 
            $data[$i]["name"] = $request->input('name_')[$i];
            $data[$i]["description"] = $request->input('description_')[$i];
            $data[$i]["type"] = $request->input('type_')[$i];
            $data[$i]["options"] = explode(",",$request->input('options_')[$i]);
        
        }
        $item->data = json_encode($data) ;
      
        $item->save();
        return redirect("/juicios-subtipo/{$item->judgment_type_id}" );
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $item = JudgmentSubTypeModel::find($id);
         $item->delete();
         return redirect("/juicios-subtipo/{$item->judgment_type_id}");
     }
     
}
