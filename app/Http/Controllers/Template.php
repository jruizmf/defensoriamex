<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateModel;
use App\Models\JudgmentTypeModel;
use App\Models\JudgmentSubTypeModel;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;

class Template extends Controller
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
        $list = DB::table('templates')
        ->leftjoin('judgment_subtype', 'templates.type', '=', 'judgment_subtype.id')
        ->select('templates.*', 'judgment_subtype.name as template_name')
        ->get();
        return view('template.index', compact('list'));
    }

    public function create()
    {
        $judgment_types = JudgmentTypeModel::all();
        return view('template.create', compact('judgment_types'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->file->getClientOriginalName();
            $filePath = $fileName;
            $request->file('file')->storeAs('documents/templates', $fileName);
        }
        $item = new TemplateModel();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->url = $filePath;
        $item->type = $request->input('judgment_subtype');

        $item->save();
        return redirect()->route('plantillas');
    }
    public function edit($id)
    {
        $item = TemplateModel::find($id);
        $judgment_types = JudgmentTypeModel::all();
        $judgment_subtypes = JudgmentSubTypeModel::all();
        var_dump($judgment_types);
        die();
        return view('template.edit', compact('item', 'id', 'judgment_types', 'judgment_subtypes'));
    }
    public function update(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->file->getClientOriginalName();
            $filePath = $fileName;

            $request->file('file')->storeAs('documents/templates', $fileName);
        }
        $item = TemplateModel::find($request->input('id'));

        $item->name = $request->input('name');
        $item->description = $request->input('description');
   
        $item->url = $request->hasFile('file') ? $filePath : $item->name;
        $item->type = $request->input('judgment_subtype');
        $item->save();
        
      
        return redirect()->route('plantillas');
    }
    // Esta es la primer opcion
    public function destroy($id)
    {
        $pastel = TemplateModel::find($id);
        $pastel->delete();
        return redirect()->route('plantillas');
    }
}