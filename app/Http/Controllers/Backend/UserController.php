<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index(){
        $menu = "user";
        return view('pagesbackend.user.index', compact('menu'));
    }
    // get data All
    function getAll(){
        $tbl = User::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<a href="'.route('user.edit',Crypt::encrypt($x->id)).'" class="btn btn-warning btn-sm" title="Edit User"><li class="fa fa-edit"></li></a> ';
                $btn .= '<button class="btn btn-sm btn-danger" title="Reset Password" onclick="resetPassword(this,'.$x->id.')"><li class="fa fa-recycle"></li></button>';
                $btn .= '</div>';
                return $btn;
            })
            ->addColumn('pictures', function($x){
                $pictures = $x->photos;
                if($pictures == "default.png"){
                    $gambar = asset('images/user/images.jpeg');
                } else {
                    $gambar = asset('storage/user/'.$pictures);
                }
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures'])
            ->addIndexColumn()
            ->make(true);
    }

    //create
    function create(){
        $menu = "user";
        return view('pagesbackend.user.create', compact('menu'));
    }

    //store
    function store(Request $request){
        try {
            $request->validate([
                'nameUser'      => 'required',
                'phoneNumber'   => 'required',
                'email'         => 'required|unique:users,email',
                'password'      => 'required'
            ]);
            $dataStored = [
                'name'              => $request->nameUser,
                'phonenumber'       => $request->phoneNumber,
                'role'              => 'admin',
                'password'          => Hash::make($request->password),
                'email'             => $request->email
            ];
            if($request->hasFile('photos')){
                $file = $request->file('photos');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('user', $filename);
                $dataStored['photos'] = $filename;
            }
            User::create($dataStored);
            return ResponseFormatter::success([], 'Berhasil Menyimpan Data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }
    //Edit
    function edit($id){
        $menu = "user";
        $dataUser = User::where('id', Crypt::decrypt($id))->first();
        return view('pagesbackend.user.edit', compact('menu', 'dataUser'));
    }
    //update
    function update(Request $request, $id){
        try {
            $request->validate([
                'nameUser'      => 'required',
                'phoneNumber'   => 'required',
                'email'         => 'required|unique:users,email,'.Crypt::decrypt($id).',id'
            ]);
            $dataStored = [
                'name'              => $request->nameUser,
                'phonenumber'       => $request->phoneNumber,
                'email'             => $request->email
            ];
            if($request->hasFile('photos')){
                $file = $request->file('photos');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('user', $filename);
                $dataStored['photos'] = $filename;
            }
            User::where('id', Crypt::decrypt($id))->update($dataStored);
            return ResponseFormatter::success([], 'Berhasil memperbaharui Data User');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal memperbaharui data User');
        }
    }
    //resetPassword
    function resetpassword($id){
        try {
            User::where('id',$id)->update([
                'password' => Hash::make('1234567')
            ]);
            return ResponseFormatter::success([], 'Berhasil mereset password Data User');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
}
