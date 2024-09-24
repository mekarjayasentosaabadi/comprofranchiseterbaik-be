<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mediasocial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MediasocialController extends Controller
{
    public function index(){
        $menu = "mediasocial";
        return view('pagesbackend.mediasocial.index', compact('menu'));
    }
    function getAll(){
        $tbl = Mediasocial::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<button onclick="editData(this, '.$x->id.')" class="btn btn-warning btn-sm" title="Edit Media Socials"><li class="fa fa-edit"></li></button> ';
                $btn .= '</div>';
                return $btn;
            })
            ->addColumn('toggle', function($x){
                $checked = $x->is_active == 1 ? 'checked' : '';
                $toogle = '';
                $toogle .= '<div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" '.$checked.' id="paymentTerms" onclick="changeStatus(this, '.$x->id.')" />
                                <label class="form-check-label" for="paymentTerms"></label>
                            </div>';
                return $toogle;
            })
            ->addColumn('pictures', function($x){
                $gambar = asset('storage/mediasocial/'.$x->icons);
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures', 'toggle'])
            ->addIndexColumn()
            ->make(true);
    }

    //store
    function store(Request $request){
        try {
            $request->validate([
                'nameMedia'     => 'required',
                'icons'         => 'required|mimes:png,jpg,jpeg|max:1024',
            ]);
            $dataStored = [
                'name'              => $request->nameMedia,
            ];
            if($request->hasFile('icons')){
                $file = $request->file('icons');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('mediasocial', $filename);
                $dataStored['icons'] = $filename;
            }

            Mediasocial::create($dataStored);
            return ResponseFormatter::success([], 'Berhasil Menyimpan Data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }
    //change status
    function changeStatus(Request $request, $id){
        try {
            $status = Mediasocial::find($id);
            if($status->is_active == 1){
                $update=[
                    'is_active' => 0
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil menonaktifkan Media Social');
            } else {
                $update=[
                    'is_active' => 1
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil mengaktifkan Media Social');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }
    function show($id){
        $data = Mediasocial::find($id);
        return ResponseFormatter::success([$data], 'Berhasil mengambil data');
    }

    function update(Request $request, $id){
        try {
            $request->validate([
                'nameMedia'     => 'required',
            ]);
            $dataStored = [
                'name'              => $request->nameMedia,
            ];
            if($request->hasFile('icons')){
                $request->validate([
                    'icons'         => 'mimes:png,jpg,jpeg|max:1024',
                ]);
                $file = $request->file('icons');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('mediasocial', $filename);
                $dataStored['icons'] = $filename;
            }

            Mediasocial::where('id', $id)->update($dataStored);
            return ResponseFormatter::success([], 'Berhasil memperbaharui Data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal memperbaharui data');
        }
    }
}
