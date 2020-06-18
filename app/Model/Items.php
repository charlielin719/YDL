<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    //
    public function StockIn($item, $itemNum)
    {
        $item->inventory += $itemNum;
        $item->save();
    }

    public function GetItemByItemId($itemId)
    {
        $item = DB::table('items')->where('item_id',$itemId)->first();
        $item = Items::where('item_id',$itemId)->first();
        return $item;
    }
}
