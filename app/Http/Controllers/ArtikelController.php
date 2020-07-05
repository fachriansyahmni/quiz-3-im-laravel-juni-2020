<?php

namespace App\Http\Controllers;

use App\ArtikelModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = ArtikelModel::latest()->paginate(10);
        $hitung = $data->count();
        return view('article.index', compact(['data', 'hitung']));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Thumbnail Article
        $thumb = $request->file('thumb');
        $new_thumb = time() . $thumb->getClientOriginalName();
        $lokasi_thumb = public_path('/uploads/artikel/thumb-800x549');
        $rethumb = Image::make($thumb->path());
        $rethumb->resize(800, 549)->save($lokasi_thumb . '/' . $new_thumb);
        $thumb->move('public/uploads/artikel/', $new_thumb);

        $tags = explode(',', $request->tag);
        $data = new ArtikelModel([
            'createby_id' => rand(10, 99),  //sementara untuk user masih random
            'judul' => $request->judul,
            'thumb' => 'public/uploads/artikel/thumb-800x549/' . $new_thumb,
            'isi' => $request->isi,
            'slug' => Str::slug($request->judul),
            'tag' => implode(",", $tags)
        ]);
        // dd($data);
        $data->save();
        return redirect('/artikel')->with('success', 'Artikel behasil dibuat');
    }

    public function show($id)
    {
        $data = ArtikelModel::find($id);
        return view('article.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ArtikelModel::find($id);
        return view('article.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required'
        ]);
        $data = ArtikelModel::findorfail($id);

        $tags = explode(',', $request->tag);
        if ($request->has('thumb')) {
            $thumb = $request->thumb;
            $new_thumb = time() . $thumb->getClientOriginalName(); //fungsi untuk ambil nama gambar
            $lokasi_gambar = public_path('/uploads/artikel/thumb-800x549');
            $rethumb = Image::make($thumb->path());
            $rethumb->resize(800, 549)->save($lokasi_gambar . '/' . $new_thumb); // ukuran resize 800x549
            $thumb->move('public/uploads/artikel/', $new_thumb);  // ukuran gambar asli

            $data_edited = [
                'judul' => $request->judul,
                'thumb' => 'public/uploads/artikel/thumb-800x549/' . $new_thumb,
                'isi' => $request->isi,
                'slug' => Str::slug($request->judul),
                'tag' => implode(",", $tags)
            ];
        } else {
            $data_edited = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'slug' => Str::slug($request->judul),
                'tag' => implode(",", $tags)
            ];
        }
        // dd($data_edited);
        $data->update($data_edited);

        return redirect('/artikel')->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ArtikelModel::find($id)->delete();
        return redirect('/artikel');
    }
}
