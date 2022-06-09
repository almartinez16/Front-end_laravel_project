<?php

namespace App\Http\Controllers\Comparator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Comparator\SmartphoneModel;

class SmartphoneController extends Controller
{
    public function showList()
    {
        $response = Http::get('http://apirest-comparator.lndo.site/phone/');

        $phoneList = json_decode($response, true);
        //dd($phoneList["details"]);

        foreach($phoneList["details"] as $phone)
        {  
            echo $phone["Smartphone"]."<br>";
        }
    }

    public function getPhone()
    {
        
    }


}
