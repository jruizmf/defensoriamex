<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorrespondentModel;

use App\Models\User as UserModel;

class User extends Controller
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
        $list = UserModel::all();
        return view('user.index',compact('list'));
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $item = new UserModel();
        $item->name = $request->input('name');
        $item->email  = $request->input('email');
        $item->password = $request->input('password');
        $item->role  = $request->input('role');

        $item->save();

        return redirect()->route('usuarios');
    }
    public function edit($id)
    {
        $item = UserModel::find($id);
        return view('user.edit')->with('item',$item);
    }
    public function update(Request $request)
    {
        $id = $request->input('id');

        $item = UserModel::find($id);
        $item->name = $request->input('name');
        $item->email  = $request->input('email');
        $item->password = $request->input('password');
        $item->role  = $request->input('role');
        $item->save();
        return redirect()->route('usuarios');
    }
     // Esta es la primer opcion
     public function destroy(Request $request)
     {
         $id = $request->query('id');
         $item = UserModel::find($id);
         $item->delete();
         return redirect()->route('usuarios');
     }
}
