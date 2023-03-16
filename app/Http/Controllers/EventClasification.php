<?php

namespace App\Http\Controllers;

use App\Models\EventClasificationModel;
use Illuminate\Http\Request;
use DB;

class EventClasification extends Controller
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
        $list = DB::table('event_clasification')->get();
        return view('event-clasification.index',compact( 'list'));
    }
    public function byId($judmentTypeId)
    {
        $list = EventClasificationModel::find($judmentTypeId);
     
        return response()->json([
            'status' => 'success',
            'data' => $list,
        ], 200);
    }
    public function create()
    {   
        return view('event-clasification.create');
    }
    public function store(Request $request)
    {
        $item = new EventClasificationModel();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
      
        $item->save();

        return redirect()->route('ocursos-clasificacion');
    }
    public function edit($id)
    {
        $item = EventClasificationModel::find($id);
   
        return view('event-clasification.edit', compact('item'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = EventClasificationModel::find($id);

        $item->name = $request->input('name');
        $item->description = $request->input('description');

        $item->save();
        return redirect()->route('ocursos-clasificacion');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = EventClasificationModel::find($id);
         $pastel->delete();
         return redirect()->route('ocursos-clasificacion');
     }
     
}
