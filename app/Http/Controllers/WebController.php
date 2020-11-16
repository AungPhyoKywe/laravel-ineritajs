<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Inertia\Inertia;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return Inertia::render('welcome', ['data' => $data]);
    }
    
    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->has('id')) {
            Contact::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Contact::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }


    

}
