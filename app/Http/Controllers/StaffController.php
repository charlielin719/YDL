<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Staff;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{   
    public $StaffArray = ['111','222','444'];
    public function turnBegin(Request $request)
    {
        $fileString = Storage::disk('local')->get('staffqueue.txt');
        echo ($fileString);
        print_r(explode(" ",$fileString));
        Storage::disk('local')->put('staffqueue.txt', implode(" ",$this->StaffArray));
        
    }
    public function turnCurrent(Request $request)
    {

    }

}
