<?php

namespace App\Http\Controllers\Backend;

use App\Models\Franchise;
use App\Models\Mediasocial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Franchisemedso;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $menu = "product";
        return view('pagesbackend.products.index', compact('menu'));
    }
    function getAll(){
        $tbl = Franchise::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<a href="'.route('product.edit',Crypt::encrypt($x->id)).'" class="btn btn-warning btn-sm" title="Edit Produtcs"><li class="fa fa-edit"></li></a> ';
                $btn .='<button class="btn btn-danger btn-sm" onclick="deleteProduct(this,'.$x->id.')"><li class="fa fa-trash" ></li></button>';
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
            ->addColumn('toggleMenu', function($x){
                $checked = $x->is_menu == 1 ? 'checked' : '';
                $toogle = '';
                $toogle .= '<div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" '.$checked.' id="paymentTerms" onclick="changeMenu(this, '.$x->id.')" />
                                <label class="form-check-label" for="paymentTerms"></label>
                            </div>';
                return $toogle;
            })
            ->addColumn('pictures', function($x){
                $pictures = $x->thumbnail;
                $gambar = asset('storage/products/'.$pictures);
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures', 'toggle', 'toggleMenu'])
            ->addIndexColumn()
            ->make(true);
    }
    function create(){
        $menu = "product";
        return view('pagesbackend.products.create', compact('menu'));
    }

    //store
    function store(Request $request){
        try {
            $request->validate([
                'judul'         => 'required|unique:franchises,judul',
                'title'         => 'required',
                // 'description'   => 'required',
                'prices'        => 'required',
                'contact'       => 'required',
                'thumbnail'     => 'required|mimes:png,jpg,jpeg|max:2048',
            ],[
                'thumbnail.max' => 'Ukuran file gambar maximal 2 Mb',]);

            $dataStored = [
                'judul'             => $request->judul,
                'slug'              => Str::slug($request->judul,'-'),
                'title'             => $request->title,
                'description'       => $request->descriptions,
                'prices'            => $request->prices,
                'discount'          => $request->discount,
                'contact'           => $request->contact,
            ];
            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('products', $filename);
                $dataStored['thumbnail'] = $filename;
            }
            $save = Franchise::create($dataStored);
            $dataArraynya = json_decode($request->dataMedsos, true);
            $franchiseMedsos = [];
            foreach ($dataArraynya as $key => $value) {
                $franchiseMedsos[] = [
                    'franchises_id' => $save->id,
                    'medsos_id'     => $value['iMedsos'],
                    'medsos_name'   => $value['nameSave'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];
            }
            Franchisemedso::insert($franchiseMedsos);
            return ResponseFormatter::success([$dataArraynya], 'Berhasil Menyimpan data Products');

        } catch (Exception $error) {
            return ResponseFormatter::success([$error], 'Something went wrong');
        }
    }
    //change status
    function changeStatus(Request $request, $id){
        try {
            $status = Franchise::find($id);
            if($status->is_active == 1){
                $update=[
                    'is_active' => 0
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil menonaktifkan Products');
            } else {
                $update=[
                    'is_active' => 1
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil mengaktifkan Products');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }
    //change menu
    function changeMenu(Request $request, $id){
        try {
            $status = Franchise::find($id);
            if($status->is_menu == 1){
                $update=[
                    'is_menu' => 0
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil menonaktifkan menu products');
            } else {
                $update=[
                    'is_menu' => 1
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil mengaktifkan menu products');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }
    //edit products
    function edit($id){
        $menu = "product";
        $data = Franchise::where('id', Crypt::decrypt($id))->first();
        return view('pagesbackend.products.edit', compact('menu', 'data'));
    }

    //get detail medsos
    function getdetailmedsos($id){
        $data = Franchisemedso::with(['mediasocial'])->where('franchises_id', Crypt::decrypt($id))->get();
        return ResponseFormatter::success(['medsos'=>$data], 'Berhasil Mengambil data');
    }

    function update(Request $request, $id){
        try {
            $request->validate([
                'judul'         => 'required|unique:franchises,judul,'.Crypt::decrypt($id).',id',
                'title'         => 'required',
                'prices'        => 'required',
                'contact'       => 'required',
                // 'thumbnail'     => 'required|mimes:png,jpg,jpeg|max:1024',
            ]);

            $dataStored = [
                'judul'             => $request->judul,
                'slug'              => Str::slug($request->judul,'-'),
                'title'             => $request->title,
                'description'       => $request->descriptions,
                'prices'            => $request->prices,
                'discount'          => $request->discount,
                'contact'           => $request->contact,
            ];
            if($request->hasFile('thumbnail')){
                $request->validate([
                    'thumbnail'     => 'mimes:png,jpg,jpeg|max:2048',
                ], [
                    'thumbnail.max' => 'File tidak boleh lebih dari 2 MB',
                ]);
                $file = $request->file('thumbnail');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('products', $filename);
                $dataStored['thumbnail'] = $filename;
            }
            $find = Franchise::where('id', Crypt::decrypt($id))->first();
            Franchise::where('id', Crypt::decrypt($id))->update($dataStored);
            $dataArraynya = json_decode($request->dataMedsos, true);
            $franchiseMedsosOld = [];
            $franchiseMedsosnew = [];
            foreach ($dataArraynya as $key => $value) {
                if($value['status'] == "Old"){
                    $franchiseMedsosOld[] =[
                        'id'            => $value['iMedsos'],
                        'medsos_name'   => $value['nameSave'],
                        'updated_at'    => now(),
                    ];
                }
                if($value['status'] == "New"){
                    $franchiseMedsosnew[] =[
                        'franchises_id' => $find->id,
                        'medsos_id'     => $value['iMedsos'],
                        'medsos_name'   => $value['nameSave'],
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }
            }
            foreach ($franchiseMedsosOld as $key => $value) {
                $updateFranchises = Franchisemedso::find($value['id']);
                $updateFranchises->update(['medsos_name' => $value['medsos_name'], 'updated_at' => now()]);
            }
            if(count($franchiseMedsosnew) > 0){
                Franchisemedso::insert($franchiseMedsosnew);
            }
            return ResponseFormatter::success([$dataArraynya], 'Berhasil Memperbaharui data Products');

        } catch (Exception $error) {
            return ResponseFormatter::success([$error], 'Something went wrong');
        }
    }

    function getDataMedsos(){
        $tbl = Mediasocial::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<button onclick="chooseData(this, '.$x->id.')" class="btn btn-success btn-sm" title="Pilih Media Socials"><li class="fa fa-check"></li></button> ';
                $btn .= '</div>';
                return $btn;
            })
            ->addColumn('pictures', function($x){
                $gambar = asset('storage/mediasocial/'.$x->icons);
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures'])
            ->addIndexColumn()
            ->make(true);
    }

    function chooseMedsos($id){
        $data = Mediasocial::find($id);
        return ResponseFormatter::success([$data], 'Berhasil mengambil data');
    }

    //delete products
    function delete($id){
        try {
            $find = Franchise::where('id', $id)->first();
            $find->delete();
            Storage::delete('products/'.$find->thumbnail);
            return ResponseFormatter::success([], 'Berhasil Menghapus Products');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
}
