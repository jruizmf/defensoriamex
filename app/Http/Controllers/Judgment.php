<?php

namespace App\Http\Controllers;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\JudgmentTypeModel;
use App\Models\JudgmentSubTypeModel;
use App\Models\CorrespondentModel;
use App\Models\StateModel;
use App\Models\EventModel;
use Illuminate\Http\Request;
use DB;

class Judgment extends Controller
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
        $templates = TemplateModel::all();
        $events = EventModel::all();
        $list = DB::table('judgment')
        ->leftjoin('judgment_type', 'judgment.judgment_type', '=', 'judgment_type.id')
        ->leftjoin('correspondent', 'judgment.correspondent_id', '=', 'correspondent.id')
        ->leftjoin('states', 'judgment.state', '=', 'states.id')
        ->select('judgment.*', 'judgment_type.name as type_name', 'correspondent.name as correspondent_name', 'states.description as state_name')
        ->get();
        return view('judgment.index',compact( 'list', 'templates', 'events'));
    }
    public function create()
    {
        $correspondents = CorrespondentModel::all();
        $judgment_types = JudgmentTypeModel::all();
        $judgment_subtypes = JudgmentSubTypeModel::all();
        $states = StateModel::all();
        return view('judgment.create', compact( 'correspondents', 'judgment_types', 'judgment_subtypes', 'states'));
    }
    public function store(Request $request)
    {
        $item = new JudgmentModel();
        $item->expedient = $request->input('expedient');
        $item->judgment_type = $request->input('judgment_type');
        $item->judgment_subtype = $request->input('judgment_subtype');
        $item->intern_id = $request->input('intern_id');
        $item->applicant1 = $request->input('applicant1');
        $item->applicant2 = $request->input('applicant2');
        $item->lawyer = $request->input('lawyer');
        $item->defendant = $request->input('defendant');
        $item->deal  = $request->input('deal');
        $item->license = $request->input('license');
        $item->address  = $request->input('address');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
        $item->district  = $request->input('district');
        $item->court = $request->input('court');
        $item->status  = $request->input('status');
        $item->correspondent_id  = $request->input('correspondent_id');
        $data = array();
        for ($i=0; $i < count($request->input('title')); $i++) { 
            $data[$i]["name"] = $request->input('title')[$i];
            $data[$i]["value"] = $request->input('value')[$i];
         
        }
        $item->data = json_encode($data) ;
        $item->save();

        return redirect()->route('juicios');
    }
    public function edit($id)
    {
        $correspondents = CorrespondentModel::all();
        $item = JudgmentModel::find($id);
       
        $judgment_types = JudgmentTypeModel::all();
        $judgment_subtypes = JudgmentSubTypeModel::all();
        $states = StateModel::all();
        $items = json_decode($item->data);
    
        return view('judgment.edit', compact('item', 'correspondents', 'judgment_types', 'items', 'judgment_subtypes', 'states'));
    }
    public function update(Request $request)
    {
        
        $id = $request->input('id');
        $item = JudgmentModel::find($id);
        $item->judgment_type = $request->input('judgment_type');
        $item->judgment_subtype = $request->input('judgment_subtype');
        $item->expedient = $request->input('expedient');
        $item->intern_id = $request->input('intern_id');
        $item->applicant1 = $request->input('applicant1');
        $item->applicant2 = $request->input('applicant2');
        $item->lawyer = $request->input('lawyer');
        $item->defendant = $request->input('defendant');
        $item->deal  = $request->input('deal');
        $item->license = $request->input('license');
        $item->address  = $request->input('address');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
        $item->district  = $request->input('district');
        $item->court = $request->input('court');
        $item->status  = $request->input('status');
        $item->correspondent_id  = $request->input('correspondent_id');
        $data = array();
        
        for ($i=0; $i < count($request->input('title')); $i++) { 
            $data[$i]["name"] = $request->input('title')[$i];
            $data[$i]["value"] = $request->input('value')[$i];
         
        }
        $item->data = json_encode($data) ;
        $item->save();
        return redirect()->route('juicios');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = JudgmentModel::find($id);
         $pastel->delete();
         return redirect()->route('juicios');
     }
     
}
