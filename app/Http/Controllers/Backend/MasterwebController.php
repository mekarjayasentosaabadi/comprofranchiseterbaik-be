<?php

namespace App\Http\Controllers\Backend;

use App\Models\Master;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MasterwebController extends Controller
{
    public function index(){
        $menu = "masterweb";
        $dataMaster = Master::first();
        return view('pagesbackend.masterweb.index', compact('menu', 'dataMaster'));
    }
    function storeheader(Request $request){
        try {
            $firstMaster = Master::first();
            $request->validate([
                'titleheader'       => 'required',
                'descriptionheader' => 'required'
            ]);
            $dataStored = [
                'titleheader'       => $request->titleheader,
                'descriptionheader' => $request->descriptionheader
            ];
            if($request->hasFile('imageheader')){
                $file = $request->file('imageheader');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('masterweb', $filename);
                $dataStored['thumbnailheader'] = $filename;
            }
            if($firstMaster == null){
                Master::create($dataStored);
            } else {
                $firstMaster->update($dataStored);
            }
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
    function storefooter(Request $request){
        try {
            $firstMaster = Master::first();
            $request->validate([
                'titlefooter'       => 'required',
                'descriptionfooter' => 'required'
            ]);
            $dataStored = [
                'titlefooter'       => $request->titlefooter,
                'descriptionfooter' => $request->descriptionfooter
            ];
            if($firstMaster == null){
                Master::create($dataStored);
            } else {
                $firstMaster->update($dataStored);
            }
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
    function storecontact(Request $request){
        try {
            $firstMaster = Master::first();
            $request->validate([
                'address'       => 'required',
                'phone'         => 'required',
                'whatsapp'      => 'required',
            ]);
            $dataStored = [
                'address'           => $request->address,
                'phone_number'      => $request->phone,
                'whatsapp_number'   => $request->whatsapp
            ];
            if($firstMaster == null){
                Master::create($dataStored);
            } else {
                $firstMaster->update($dataStored);
            }
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
}
