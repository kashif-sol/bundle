<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  public function index(Request $request)
  {

    $shop = Auth::user();

    $query = 'query {
      products(query: "sku:' . $request->product . '", first: 30) {
          edges {
            node {
              id
              title  
              variants(first: 10, reverse: true) {
                edges {
                  node {
                    id
                    title
                    sku
                  }
                }
              }
            }
          }
        }
      }';
    $products = $shop->api()->graph($query);

    $product = $products['body']->container['data']['products']['edges'];
    // dd($product);
    $arr = [];
    foreach ($product as $product) {

      // if($product->node['title']==$request->product){
      $title = [
        'title' => $product['node']['title']
      ];
      array_push($arr, $title);
      $id = [
        'id' => (int) filter_var($product['node']['id'], FILTER_SANITIZE_NUMBER_INT)
      ];
      array_push($arr, $id);

      //     return response($arr);
      // }
      // else{
      //     return response('No product Found');
      // }

    }
    return response($arr);
  }
  public function sku(Request $request)
  {
    // dd('x');
    $shop = Auth::user();

    $query = 'query {
      products(query: "sku:' . $request->product . '", first: 30) {
          edges {
            node {
              id
              title
              handle  
              variants(first: 10, reverse: true) {
                edges {
                  node {
                    id
                    title
                    sku
                  }
                }
              }
            }
          }
        }
      }';
    $products = $shop->api()->graph($query);

    $product = $products['body']->container['data']['products']['edges'];
    $handle = $product[0]['node']['handle'];
    $response = $product[0]['node']['variants']['edges'];
    $res = [];
    foreach ($response as $data) {
      // dd($data['node']['id']);
      $title = [
        'title' => $data['node']['title'],
        'id' => (int) filter_var($data['node']['id'], FILTER_SANITIZE_NUMBER_INT),
        'handle' => $handle,
      ];
      array_push($res, $title);
    }
    return response($res);
  }
  public function prod_save(Request $req)
  {
    // dd($req->all());
    $save = Product::create([

      'prod_id' => $req->product_id,
      'title' => $req->title,



    ]);
    $save->save();
    return response($save);
  }
}
