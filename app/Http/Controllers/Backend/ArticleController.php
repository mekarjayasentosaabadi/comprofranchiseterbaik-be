<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){
        $menu = "article";
        return view('pagesbackend.article.index', compact('menu'));
    }
    function getAll(){
        $tbl = Article::all();

        return DataTables::of($tbl)
            ->addColumn('action', function($x){
                $btn = '<div>';
                $btn .='<a href="'.route('article.show',Crypt::encrypt($x->id)).'" class="btn btn-warning btn-sm" title="Edit Article"><li class="fa fa-edit"></li></a> ';
                $btn .='<button class="btn btn-danger btn-sm" onclick="deleteList(this,'.$x->id.')"><li class="fa fa-trash" ></li></button>';
                $btn .= '</div>';
                return $btn;
            })
            ->addColumn('toggle', function($x){
                $checked = $x->is_publish == 1 ? 'checked' : '';
                $toogle = '';
                $toogle .= '<div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" '.$checked.' id="paymentTerms" onclick="changeStatus(this, '.$x->id.')" />
                                <label class="form-check-label" for="paymentTerms"></label>
                            </div>';
                return $toogle;
            })
            ->addColumn('pictures', function($x){
                $pictures = $x->thumbnail;
                if($pictures == "default.png"){
                    $gambar = asset('images/article/images.jpeg');
                } else {
                    $gambar = asset('storage/article/'.$pictures);
                }
                $img = '<img src="'.$gambar.'" width="50px" class="img-fluid">';
                return $img;
            })
            ->rawColumns(['action', 'pictures', 'toggle'])
            ->addIndexColumn()
            ->make(true);
    }

    function create(){
        $menu = "article";
        return view('pagesbackend.article.create', compact('menu'));
    }

    //simpan
    function store(Request $request){
        try {
            $request->validate([
                'title'         => 'required|unique:articles,title',
                'description'   => 'required',
                'thumbnail'     => 'required|mimes:png,jpg,jpeg|max:2048',
                'tags'          => 'required'
            ],[
                'thumbnail.max'      => 'Ukuran Thumbnail maksimal 2 MB',
            ]);
            $dataStored = [
                'title'         => $request->title,
                'slug'          => Str::slug($request->title,'-'),
                'content'       => $request->description,
            ];
            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('article', $filename);
                $dataStored['thumbnail'] = $filename;
            }
            
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('article', $filename);
                $dataStored['logo'] = $filename;
            }
            $data = Article::create($dataStored);
            //save tags
            $tags = explode(',', $request->tags);
            $tags = array_map('trim', $tags);
            $savedTags =[];
            $skippedTags = [];
            foreach($tags as $tag){
                $existingTag = Tag::where('name', $tag)->first();
                if(!$existingTag){
                    $tagsData = Tag::create([
                        'name'  => $tag,
                        'slug'  => Str::slug($tag,'-')
                    ]);
                    $data->articletag()->create([
                        'tag_id' => $tagsData->id,
                        'article_id' => $data->id
                    ]);
                    $skippedTags[] = $existingTag;
                } else {
                    $data->articletag()->create([
                        'tag_id' => $existingTag->id,
                        'article_id' => $data->id
                    ]);
                }
            }
            return ResponseFormatter::success([$skippedTags], 'Berhasil menyimpan data');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Gagal menyimpan data');
        }
    }
    function changeStatus(Request $request, $id){
        try {
            $status = Article::find($id);
            if($status->is_publish == 1){
                $update=[
                    'is_publish' => 0
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil menonaktifkan Article');
            } else {
                $update=[
                    'is_publish' => 1
                ];
                $status->update($update);
                return ResponseFormatter::success([$status], 'Berhasil mengaktifkan Article');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([$error], 'Gagal Memperbaharui data');
        }
    }
    function delete($id){
        try {
            $find = Article::where('id', $id)->first();
            $find->delete();
            Storage::delete('article/'.$find->thumbnail);
            return ResponseFormatter::success([], 'Berhasil Menghapus Article');
        } catch (Exception $error) {
            return ResponseFormatter::error([], 'Something went wrong');
        }
    }
}
