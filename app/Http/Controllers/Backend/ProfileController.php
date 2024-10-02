<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $menu = "profile";
        return view('pagesbackend.profile.index', compact('menu'));
    }
    function update(Request $request){
        try {
            $request->validate([
                'nameUser'      => 'required',
                'phoneNumber'   => 'required',
                'email'         => 'required|unique:users,email,'.Auth()->user()->id.',id'
            ]);
            $dataStored = [
                'name'          => $request->nameUser,
                'phonenumber'   => $request->phoneNumber,
                'email'         => $request->email
            ];
            if($request->hasFile('photos')){
                $request->validate([
                    'photos' => 'required|mimes:png,jpg,jpeg|max:1024'
                ], [
                    'photos.max' => 'Ukuran file gambar maximal 1 Mb'
                ]);
                $file = $request->file('photos');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('user', $filename);
                $dataStored['photos'] = $filename;
            }
            User::where('id', Auth()->user()->id)->update($dataStored);
            return ResponseFormatter::success([], 'Berhasil Memperbaharui Profile');
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal memperbaharui Profile');
        }
    }
    //update password
    function updatepassword(Request $request){
        try {
            $request->validate([
                'oldPassword'      => 'required',
                'newPassword'      => 'required',
            ]);
            $checkHash = Hash::check($request->oldPassword, auth()->user()->password);
            if(!$checkHash){
                $pesan = "Password lama tidak sesuai";
                return ResponseFormatter::error([], $pesan, 422);
            }
            $dataStored = [
                'password'         => Hash::make($request->newPassword) ,
            ];
            User::where('id', Auth()->user()->id)->update($dataStored);
            Auth::logout();
            return ResponseFormatter::success([], 'Berhasil Memperbaharui Password');
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal memperbaharui Password');
        }
    }
}
