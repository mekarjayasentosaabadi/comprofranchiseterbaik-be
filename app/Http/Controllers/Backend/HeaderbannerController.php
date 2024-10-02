<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\Headerbanner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class HeaderbannerController extends Controller
{
    public function index(){
        $menu = "headerbanner";
        return view('pagesbackend.headerbanner.index', compact('menu'));
    }
    function getAll(){
        $tbl = Headerbanner::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<button onclick="editData(this, '.$x->id.')" class="btn btn-warning btn-sm" title="Edit List Item"><li class="fa fa-edit"></li></button> ';
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
                $pictures = $x->banners;
                $gambar = asset('storage/headerbanner/'.$pictures);
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures', 'toggle'])
            ->addIndexColumn()
            ->make(true);
    }
    //function store
    function store(Request $request){
        try {
            $request->validate([
                'title'         => 'required|unique:listitems,judul',
                'banner'        => 'required|max:2048',
                'subtitle'      => 'required'
            ],[
                'banner.max'    => 'Ukuran file gambar maximal 2 Mb',
            ]);
            $dataStored = [
                'title'         => $request->title,
                'subtitle'      => $request->subtitle,
                'slug'          => Str::slug($request->title,'-'),
            ];
            if($request->hasFile('banner')){
                $file = $request->file('banner');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('headerbanner', $filename);
                $dataStored['banners'] = $filename;
            }
            Headerbanner::create($dataStored);
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }

    //change status
    function changeStatus(Request $request, $id){
        try {
            $status = Headerbanner::find($id);

            if($status->is_active == 0){
                $update=[
                    'is_active' => 1
                ];
                $status->update($update);
                Headerbanner::where('id', '!=', $id)->update(['is_active' => 0]);
                return ResponseFormatter::success(['statusCode'=>200], 'Berhasil mengaktifkan Banner');
            } else {
                return ResponseFormatter::success(['statusCode'=>201], 'Banner hanya satu yang boleh aktif');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }

    //show
    function show($id){
        $data = Headerbanner::find($id);
        return ResponseFormatter::success([$data], 'berhasil mengambil data');
    }

     //function update
    function update(Request $request, $id){
        try {
            $request->validate([
                'title'         => 'required|unique:headerbanners,title,'.$id.',id',
                'subtitle'      => 'required'
            ]);
            $dataStored = [
                'title'         => $request->title,
                'subtitle'      => $request->subtitle,
                'slug'          => Str::slug($request->title,'-'),
            ];
            if($request->hasFile('banner')){
                $request->validate([
                    'banner'        => 'mimes:png,jpg,jpeg|max:2048',
                ],[
                    'banner.max'    => 'Ukuran file gambar maximal 2 Mb',
                ]);
                $file = $request->file('banner');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('headerbanner', $filename);
                $dataStored['banners'] = $filename;
            }
            Headerbanner::where('id', $id)->update($dataStored);
            return ResponseFormatter::success([], 'Berhasil memperbaharui data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal memperbaharui data');
        }
    }
}
