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
    public function EditStock(request $request, $id)
    {   $name = $request->name;
        $type = $request->type;
        $price = $request->price;
        $qty = $request->qty;
        $exp = $request->exp;


        $stock = Stock::find($id);
        $stock->name = $name;
        $stock->type = $type;
        $stock->price = $price;
        $stock->qty = $qty;
        $stock->exp = $exp;
        $stock->save();


        return response()->json([
            'message' => 'แก้ไขสินค้าใน Stock สำเร็จแล้ว',
            'date' => $stock,
        ], 200);

    }

    public function DeleteStock($id)
    {
        $stock = Stock::find($id);
        $stock->delete();


        return response()->json([
            'message' => 'ลบสินค้าใน Stock สำเร็จแล้ว',
            'data' => '',
        ], 200);

    }


    public function ListStock()
    {
        $stock = Stock::all();

        return response()->json([
            'message' => 'แสดงสินค้าใน Stock สำเร็จแล้ว',
            'data' => $stock,
        ], 200);

    }

    public function ShowStock($id)
    {
        $stock = Stock::find($id);


        return response()->json([
            'message' => 'แสดงสินค้าใน Stock สำเร็จแล้ว',
            'data' => $stock,
        ], 200);

    }

    public function DataTableStock(Request $request)
    {
        $columns = $request->input('columns');
        $length = $request->input('length');
        $order = $request->input('order');
        $search = $request->input('search');
        $start = $request->input('start');
        $page = $start / $length + 1;

        $col = array('id', 'name', 'type', 'price', 'qty', 'exp');

        $d = Stock::select($col)
            ->orderby($col[$order[0]['column']], $order[0]['dir']);

        if ($search['value'] != '' && $search['value'] != null) {
            foreach ($col as &$c) {
                $d->orWhere($c, 'LIKE', '%' . $search['value'] . '%');
            }
        }

        $table = $d->paginate($length, ['*'], 'page', $page);

        return response()->json($table);
    }




}
