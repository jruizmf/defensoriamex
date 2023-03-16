<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateModel;
use Illuminate\Support\Facades\Storage;
 

class Template extends Controller
{
    public function index()
    {
        $list = TemplateModel::all();
        return view('template.index')->with('list', $list);
    }

    public function create()
    {
        return view('template.create');
    }
    public function store(Request $request)
    {
        //var_dump($request->file('file')->storeAs('uploads'));
        if ($request->hasFile('file')) {
    
            $request->validate([
                'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
            ]); 
            $fileName = $request->file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;
     
            $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
            $path = Storage::disk('public')->url($path);

            
            $item = new TemplateModel();
            $item->name = $request->input('name');
            $item->description  = $request->input('description');
            $item->url  = $filePath;
            $item->type = $request->input('type');

            $item->save();
            return redirect()->route('plantillas');
        } else{
            die();
        }
    }
    public function edit($id)
    {
        $item = TemplateModel::find($id);
        return view('template.edit')->with('item',$item);
    }
    public function update(Request $request)
    {
        $item = TemplateModel::find($id);
        $item->name = $request->input('name');
        $item->deal  = $request->input('description');
        $item->city  = $request->input('url');
        $item->state = $request->input('type');
        $item->save();
        return redirect()->route('template.index');
    }
     // Esta es la primer opcion
     public function destroy($id)
     {
         $pastel = TemplateModel::find($id);
         $pastel->delete();
         return redirect()->route('template.index');
     }
}
