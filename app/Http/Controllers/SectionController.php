<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index()
    {
        return view('admin/sections');
    }

   public function getSections(){
        $sections = Section::all();

        return response()->json(['sections' => $sections]);
   }

   public function addSectionName(Request $request){

        $this->validate($request, [
          'name' => 'required|min:4'
        ]);

        Section::create(['name' => $request->name]);
   }

   public function updateSectionName(Request $request, $id){
        $this->validate($request, [
          'name' => 'required'
        ]);

        $section = Section::find($id);

        $section->name = $request->name;
        $section->save();
   }

}
