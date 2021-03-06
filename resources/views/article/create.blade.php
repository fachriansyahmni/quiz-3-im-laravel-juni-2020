@extends('layouts.master')

@section('page-title','New Artikel')
@section('page-heading','New Artikel')
@section('content')
    <div class="card shadow col-lg">
        <div class="card-body">
            <div class="card-title"><a href="/artikel" class="btn btn-info btn-lg" style="margin-top: -2rem">back</a></div>
            <form action="{{ url('/artikel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="judul" class="col-sm-2 col-form-label col-form-label-sm text-lg">Judul</label>
                  <div class="col-sm-5">
                    <input type="text" name="judul" class="form-control form-control-sm" id="judul" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="isi" class="col-sm-2 col-form-label col-form-label-sm text-lg">Isi</label>
                  <div class="col-sm-10">
                    <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="tag" class="col-sm-2 col-form-label col-form-label-sm text-lg">Tag</label>
                    <div class="col-sm-5">
                      <textarea type="text" name="tag" class="form-control" id="tag" cols="20" rows="1" style="resize:vertical"></textarea>
                      <strong>Bila tag lebih dari 1, berikan tanda koma "," di tiap akhir kata atau kalimat<br>contoh: komputer, alat elektronik, IoT</strong>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="thumb" class="col-sm-2 col-form-label col-form-label-sm text-lg">Thumbnail</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control-file form-control-sm " name="thumb" required>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <label class="col-sm-2 col-form-label col-form-label-sm text-lg"></label>
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-info">Post</button>
                      <button type="reset" class="btn btn-outline-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
  </div>
@endsection