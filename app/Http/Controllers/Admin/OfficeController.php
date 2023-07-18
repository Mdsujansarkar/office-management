<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Office;
use App\Enums\OfficeEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficeResource;

class OfficeController extends Controller
{
    public function index()
    {
        //  $offices= DB::table('offices')->select()->get();

        $offices = Office::query()
            ->where('approval_status', OfficeEnum::APPROVAL_APPROVE)
            ->where('hidden', false)
            ->when(request('host_id'), fn ($builder) => $builder->whereUserId(request('host_id')))
            ->latest('id')
            ->paginate(10);

        return OfficeResource::collection(
            $offices
        );
    }
}
