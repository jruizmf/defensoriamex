<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorrespondentModel;
use App\Models\QuotesModel;
use App\Models\JudgmentModel;
use App\Models\TemplateModel;
use App\Models\EventModel;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $type = $request->query('tipo');
        $filter = $request->query('filtro');
        $templates = TemplateModel::all();
        if(isset($type) && $type !== null){
            if($type == 1){
                $list = [];
                if(isset($filter) && $filter !== null){
                  
                    $list = CorrespondentModel::where('name','like', '%'.$filter.'%')->get();
                } else{
                    $list = CorrespondentModel::all();
                }
               
                return view("home",compact('type', 'list', 'templates', 'filter'));
            }
            else if($type == 2){
                $list = [];
                if(isset($filter) && $filter !== null){
                    $list = QuotesModel::where('name','like', '%'.$filter.'%')->get();
                } else{
                    $list = QuotesModel::all();
                }
                return view("home",compact('type', 'list', 'templates', 'filter'));
            }
            else if($type == 3){
                $list = [];
                if(isset($filter) && $filter !== null){
                    $list =  DB::table('judgment')::where('name','like', '%'.$filter.'%')
                            ->leftjoin('judgment_type', 'judgment.judgment_type', '=', 'judgment_type.id')
                            ->leftjoin('correspondent', 'judgment.correspondent_id', '=', 'correspondent.id')
                            ->leftjoin('states', 'judgment.state', '=', 'states.id')
                            ->select('judgment.*', 'judgment_type.name as type_name', 'correspondent.name as correspondent_name', 'states.description as state_name')
                            ->get();
                    $events = EventModel::all();
                    return view('judgment.index',compact( 'type', 'list', 'templates', 'filter', 'templates', 'events'));
                } else{
                    $list = JudgmentModel::all();
                    $events = EventModel::all();
                    return view("home",compact('type', 'list', 'templates', 'filter', 'events'));
                }
                
            }
            else {
                $list = CorrespondentModel::all();
                return view("home",compact('type', 'list', 'templates', 'filter'));
            }
           
        } else {
            $type = 1;
            $list = CorrespondentModel::all();
            return view('home', compact('type', 'list', 'templates', 'filter'));
        }
       
    }
}
