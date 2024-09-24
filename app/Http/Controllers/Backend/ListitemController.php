<?php

namespace App\Http\Controllers\Backend;

use App\Models\Listitem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ListitemController extends Controller
{
    public function index(){
        $menu = "listitem";
        return view('pagesbackend.listitem.index', compact('menu'));
    }
    function getAll(){
        $tbl = Listitem::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<a href="'.route('listitem.show',Crypt::encrypt($x->id)).'" class="btn btn-warning btn-sm" title="Edit List Item"><li class="fa fa-edit"></li></a> ';
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
                $pictures = $x->icons;
                if($pictures == "default.png"){
                    $gambar = asset('images/listitem/images.jpeg');
                } else {
                    $gambar = asset('storage/listitem/'.$pictures);
                }
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures', 'toggle'])
            ->addIndexColumn()
            ->make(true);
    }

    function create(){
        $menu = "listitem";
        return view('pagesbackend.listitem.create', compact('menu'));
    }

    //function store
    function store(Request $request){
        try {
            $request->validate([
                'title'      => 'required|unique:listitems,judul',
                'description'   => 'required',
                'icon'         => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            $dataStored = [
                'judul'         => $request->title,
                'slug'          => Str::slug($request->title,'-'),
                'description'   => $request->description,
            ];
            if($request->hasFile('icon')){
                $file = $request->file('icon');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('listitem', $filename);
                $dataStored['icons'] = $filename;
            }
            Listitem::create($dataStored);
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }
    //change status
    function changeStatus(Request $request, $id){
        try {
            $status = Listitem::find($id);
            if($status->is_active == 1){
                $update=[
                    'is_active' => 0
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil menonaktifkan List Item');
            } else {
                $update=[
                    'is_active' => 1
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil mengaktifkan List Item');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }

    function show($id){
        $data = Listitem::where('id', Crypt::decrypt($id))->first();
        $menu = "listitem";
        return view('pagesbackend.listitem.edit', compact('menu', 'data'));

    }

    function update(Request $request, $id){
        try {
            $request->validate([
                'title'         => 'required|unique:listitems,judul,'.Crypt::decrypt($id).',id',
                'description'   => 'required',
            ]);
            $dataStored = [
                'judul'         => $request->title,
                'slug'          => Str::slug($request->title,'-'),
                'description'   => $request->description,
            ];
            if($request->hasFile('icon')){
                $file = $request->file('icon');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('listitem', $filename);
                $dataStored['icons'] = $filename;
            }
            Listitem::where('id', Crypt::decrypt($id))->update($dataStored);
            return ResponseFormatter::success([], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }
}
