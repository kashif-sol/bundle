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
        
        for ($i = 0; $i < count($req->title); $i++) {
            $product_id = (int) filter_var($req->main_prod, FILTER_SANITIZE_NUMBER_INT);
           if(!$req->order[$i]==0){
            $save = Masterproduct::create([
                'main_prod' => $req->main_prod,
                'product_id' => $req->product_id[$i],
                'title' => $req->title[$i],
                'order' => $req->order[$i],
                'handle' => $req->handle[$i],
            ]);
            $save->save();
        }
        
    }

        $all_bundles = Masterproduct::where("main_prod", $product_id)->get();

        $final_products = [];
        if (!empty($all_bundles) && isset($all_bundles)) {
            $old_products = "";
            foreach ($all_bundles as $key => $bunle_row) {
                $variant_arr = [];
                if ($old_products != $bunle_row->handle) {
                    foreach ($all_bundles as $keyy => $bunle_child) {

                        if ($bunle_child->handle == $bunle_row->handle) {
                            $variant_arr[] =  array(
                                "variant_id" => $bunle_child->product_id,
                                "order" => $bunle_child->order,
                            );
                        }
                    }
                         $final_products[] =  array(
                        "main" => $bunle_row->handle,
                        "variants" =>  $variant_arr
                    );
                }
                $old_products = $bunle_row->handle;
            }
        }
        // dd($all_bundles);
        $shop  = User::first();
        $metafields["metafield"] = array(
            "id" => 735379628,
            "value" => json_encode($final_products),
            "type" => "json"
        );
        $products = $shop->api()->rest("PUT", "/admin/api/2022-07/products/" . $product_id . "/metafields/21457851809964.json", $metafields);
        // dd($products);
        return back();
    }
    public function bundle()
    {

        $bundle = Product::all();
        return view('bundle', compact('bundle'));
    }
    public function createbundle($id = null)
    {
        $bundle_products = [];
        $bundle = [];
        if (isset($id)) {
            $bundle = Product::find($id);

            $bundle_products = Masterproduct::where('main_prod', '=', $bundle->id)->get();
        }




        return view('welcome', compact('bundle_products', 'bundle'));
    }
    public function destroy($id)
    {
        Product::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    public function destroy_variant($id)
    {
        Masterproduct::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
