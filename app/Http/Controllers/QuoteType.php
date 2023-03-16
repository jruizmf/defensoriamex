<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteType extends Controller
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
        $list = QuoteType::get();
        return view('quoteType.index')->with('list', $list);
    }
}
