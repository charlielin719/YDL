<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Items;

class StockController extends Controller
{
    //
    public function stockIn(Request $request)
    {
        $items = json_decode($request->data, true);
       // echo($request->input('data.0.itemIdd'));
       $itemModel = new Items;
        foreach($items as $item)
        {
            $item_past = $itemModel->GetItemByItemId($item['itemId']);
            if($item_past)
                $itemModel->StockIn($item_past,$item['itemNum']);
        }
      //  echo ($request->data);
    }
}
