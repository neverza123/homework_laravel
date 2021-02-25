<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;


class JohnController extends Controller
{
    public function AddProduct(request $request)
    {
        $name = $request->name;
        $type = $request->type;
        $price = $request->price;
        $qty = $request->qty;
        $exp = $request->exp;

        $stock = new Stock();
        $stock->name = $name;
        $stock->type = $type;
        $stock->price = $price;
        $stock->qty = $qty;
        $stock->exp = $exp;
        $stock->save();


        return response()->json([
            'message' => 'เพิ่มสินค้าเข้า Stock สำเร็จแล้ว',
            'date' => $stock,
        ], 201);
    }
}
