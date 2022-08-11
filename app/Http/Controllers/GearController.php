<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;

class GearController extends Controller
{

    public function index()
    {
        $gear['gears'] = Gear::orderBy('id','asc')->paginate(5);
        return view('screens.result', $gear);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,svg,jpeg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('public/images');
        $gear = new Gear();
        $gear->item= $request->item;
        $gear->price=$request->price;
        $gear->image=$path;
        $gear->save();

        return redirect()->route('gears.index')->with('Success', 'The data inserted Successfully');
    }


    public function show(Gear $gear)
    {
        
    }

 
    // public function edit(Gear $gear)
    // {
    //     return view('screens.update', compact('gear'));
    // }

    public function update(Request $request, $id )
    {
        $request->validate([
            'item' => 'required',
            'price' => 'required',
        ]);
        
        $gear = Gear::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $gear->image = $path;
        }
        $gear->item = $request->item;
        $gear->price= $request->price;
        $gear->save();
    
        return redirect()->route('gears.index')
                        ->with('success','Post updated successfully');
    }

    public function destroy(Gear $gear)
    {
        $gear->delete();
        return redirect()->route('gears.index')->with('Deleted.');
    }
}
