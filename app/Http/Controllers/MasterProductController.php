<?php

namespace App\Http\Controllers;

use App\Models\Masterproduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    public function index(Request $req)
    {
        // dd($req->all());
        $product_id = 0;
        $rt = [];
        for ($i = 0; $i < count($req->title); $i++) {
            $product_id = (int) filter_var($req->main_prod, FILTER_SANITIZE_NUMBER_INT);
            $save = Masterproduct::create([
                'main_prod' => $req->main_prod,
                'product_id' => $req->product_id[$i],
                'title' => $req->title[$i],
                'order' => $req->order[$i],
                'handle' => $req->handle[$i],


            ]);
            $data = [
                'title' => $req->title[$i],
                'variant_id' => (int) filter_var($req->product_id[$i], FILTER_SANITIZE_NUMBER_INT),
                'handle' => $req->handle[$i],
                'order' =>  $req->order[$i]
            ];
            array_push($rt, $data);

            $save->save();
        }
         
        
        $shop  = User::first();
        $metafields["metafield"] = array(
            "id" => 735379628,
            "value" => json_encode($rt),
            "type" => "json"
        );
        $products = $shop->api()->rest("PUT" , "/admin/api/2022-07/products/".$product_id."/metafields/21457851809964.json" , $metafields);
      
        return redirect()->route('home');
    }
    public function bundle()
    {

        $bundle = Product::all();
        return view('bundle', compact('bundle'));
    }
    public function createbundle()
    {
      //  $shop  = User::first();
      ///  $products = $shop->api()->rest("GET" , "/admin/api/2022-07/products/7446777528492/metafields.json");
     ///   dd($products , $shop );
        return view('welcome');
    }
    public function destroy($id)
    {
        Product::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
