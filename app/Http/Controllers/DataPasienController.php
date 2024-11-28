<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiData;


class DataPasienController extends Controller
{
    public function index()
    {
        $isidata = IsiData::orderBy('id', 'asc')->get();
        $total = IsiData::count();
        return view('admin.datapasien', compact(['isidata','total']));
    }

}
