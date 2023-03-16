<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuotesModel;
use App\Models\TemplateModel;

class Quotes extends Controller
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
        $list = QuotesModel::all();
        $templates = TemplateModel::all();
        return view('quotes.index',compact( 'list', 'templates'));
    }

    public function create()
    {
        return view('quotes.create');
    }
    public function store(Request $request)
    {
        $item = new QuotesModel();
        $item->name = $request->input('name');
        $item->deal  = $request->input('deal');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
        $item->district  = $request->input('district');
        $item->judgment = $request->input('judgment');
        $item->matter  = $request->input('matter');
        $item->amount  = $request->input('amount');

        $item->save();

        return redirect()->route('cotizaciones');
    }
    public function edit($id)
    {
        $item = QuotesModel::find($id);
        return view('quotes.edit')->with('item',$item);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $item = QuotesModel::find($id);
        $item->name = $request->input('name');
        $item->deal  = $request->input('deal');
        $item->city  = $request->input('city');
        $item->state = $request->input('state');
        $item->district  = $request->input('district');
        $item->judgment = $request->input('judgment');
        $item->matter  = $request->input('matter');
        $item->amount  = $request->input('amount');

        $item->save();
        return redirect()->route('cotizaciones');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->input('id');
         $pastel = QuotesModel::find($id);
         $pastel->delete();
         return redirect()->route('cotizaciones');
     }
}
