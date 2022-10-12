<?php

namespace App\Http\Controllers;

use App\Models\Masterproduct;
use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    public function index(Request $req){
        // dd($req->all());
        $save = Masterproduct::create([
            'product_id' => $req->product_id,
            'title' =>$req->title,
            'order' =>$req->order,
            

        ]);
        $save->save();
return redirect()->route('home');
    }
}
