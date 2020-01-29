<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Menu;
use \App\Rules\RestoCategoryValidate;

class MenuController extends Controller
{
    public function itemSave(Request $request){
        $postData = $this->validate($request, [
            'price'=>'required|numeric',
            'item'=>'required',
            'category'=>['required', new RestoCategoryValidate()]
        ]);
        $menu = Menu::create([
            'name'=>$postData['item'],
            'description'=>'ma description',
            'price'=>$postData['price'],
            'resto_id'=>1,
            'category_id'=>1
        ]);
        $menu->save();
        return response()->json($menu, 201);
    }
}
