<?php

namespace App\Http\Controllers\Admin;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeResource;
use DB;

class OfficeController extends Controller
{
    public function index()
    {
    //  $offices= DB::table('offices')->select()->get();
      
     $offices = Office::query()->latest('id')->get();
     
        return OfficeResource::collection(
            $offices
        );
    }
}
