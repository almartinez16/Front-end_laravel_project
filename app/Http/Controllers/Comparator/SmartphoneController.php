<?php

namespace App\Http\Controllers\Comparator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class SmartphoneController extends Controller
{


    public function showDetailedList()
    {
        $response = Http::get('http://apirest-comparator.lndo.site/phone/');

        $phone_list = json_decode($response, true);
        //dd($response);

        return $phone_list['details'];

    }

    public function showNameList()
    {
        $phone_detailed_list = $this->showDetailedList();
        
        $phone_name_list = [];

        for ($i=0;$i<count($phone_detailed_list);$i++)
        {
            $phone_name_list[$i] = $phone_detailed_list[$i]['Smartphone'];
        }

        return $phone_name_list;
        
    }
    

    public function searchPhone(Request $request, $phone)
    {
        $phone_name = str($request->path())
            ->substr(7)
            ->replace('-',' ')
            ->title()
            ->whenIs('Apple Iphone *', function($phone_name) {
                return $phone_name->replace('Iphone', 'iPhone');
            });
        
        $phone_details = $this->showDetailedList();

        //dd($phone_detailed_list[0]['Smartphone']);

        for($i=0;$i<count($phone_details);$i++) {
            if ($phone_name == $phone_details[$i]['Smartphone']) {
                return $phone_details[$i];
            }
           else {
                return "Phone was not found.";
           }
        }

    }


}
