<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\info;
use SebastianBergmann\Environment\Console;

class pagesController extends Controller
{
    public function add(){
        return view('add');
    }

    public function viewAllData(){
        $data= info::all();
        return view('view',['keys'=>$data]);
    }

    public function insertData(Request $request){
        //for single image upload
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image1' => 'required|mimes:jpeg,png,jpg,gif,svg,zip,pdf|max:2048',        
        ]);

            
        $info = new info;
        $imageName1 = $request->file('image1')->getClientOriginalName();
        $request->image1->move(public_path('images'), $imageName1);

        $info-> name = $request-> name;
        $info-> address =  $request -> address;
        $info-> image1 = $imageName1;
        $info->save(); 
        return redirect()->back()->with('success', 'Data Has been uploaded');
        
        
            
        
    }

    //Index page for edit Data
    function editData(Request $request){
        $info = $this->getDataSingle($request->pid);
        $data=$this->listData();
        return view('edit',["info" => $info,"data" => $data]);
    }

    //For single Data
    function getDataSingle($pid){
        $info = info::where("id", $pid)->first();
        if($info){ return $info; }
        return null;
    }

    //for Data list
    function listData(){
        return info::get();
    }

    //update data
    function updateData(Request $request){
        $info=info ::find($request->pid);

        $info->name = $request->name;
        $info->address =  $request->address;
        $info->encode_data1 = $request->annotate_encode;
        
        if($info -> save()){
            return redirect('view')->with('status', 'Data Has been Updated');
        }
    } 
    
    //delete data
    function deleteData(Request $request){
        $infoDelete= info::find($request->pid);
        if ($infoDelete->delete()){
            return redirect()->back()->with('status', 'Data Has been Deleted');;
        }
    }
}