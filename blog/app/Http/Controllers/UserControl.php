<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Exception;

class UserControl extends Controller
{

	public function __construct(UserModel $users){
		$this->users = $users;
	}

    public function register(Request $request){

	$users = [
		"name" => $request->name,
		"email" => $request->email,
		"password" => md5($request->password)
	];

	try{
		$users = $this->users->create($users);
		return response ('Success', 201);
	}catch (Exception $ex){
		return response ('Failed', 400);
	}
	}

	public function show(){
		$users = $this->users->all();

		return response()->json($users, 200);
	}

	public function update(Request $request, $id){
		$users = [
			"name" => $request->name,
			"email" => $request->email,
			"password" => md5($request->password)
		];

		try{
			$this->users->where('id',$id)->update($users);
			return response ('Updated', 201);
		}catch(Exception $ex){
			return response ('Failed', 400);	
	}
}

	public function delete($id){
		$users = $this->users->find($id);
		try{
			$users->delete();
			return response('Deleted', 201);
		}catch(Exception $ex){
			return response ('Failed', 400);
		}

	}

	public function all(){
		try{
			$users = $this->users->with('items')->get();
			return $users;
		}catch(Exception $ex){
			return respons('Failed', 400);
		}
	}
}
