<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemModel;
use Exception;

class ItemControl extends Controller
{
    public function __construct (ItemModel $items){
    	$this->items = $items;
    }

    public function register(Request $request){
    	$items = [
    		"user_id" => $request->user_id,
    		"name" => $request->name,
    		"price" => $request->price,
    		"stock" => $request->stock
    	];
		try{
			$items = $this->items->create($items);
			return response ('Success', 201);
		}catch(Exception $ex){
			return response ('Failed', 400);
		}
    }

    public function show (){
    	$items = $this->items->all();
    	return response()->json($items, 200);
    }

    public function update(Request $request, $id){
    	$items = [
    		'user_id' => $request->user_id,
    		'name' => $request->name,
    		'price' => $request->price,
    		'stock' => $request->stock
    	];
		try{
			$this->items->where('id',$id)->update($items);
			return response ('Success', 201);
		}catch(Exception $ex){
			return response ('Failed', 400);
		}
    }

    public function delete($id){
    	$items = $this->items->find($id);
    	try{
    		$items->delete();
    		return response ('Deleted', 201);
    	}catch(Exception $ex){
    		return response ('Failed', 400);
    	}
    }
}
