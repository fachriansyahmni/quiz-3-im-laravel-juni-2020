@extends('layouts.master')

@section('page-title')
  {{ $data->judul }}
@endsection

@section('content')
    <div class="card shadow col-lg my-3">
        <div class="card-title"><a href="/artikel" class="btn btn-info btn-lg" style="margin-top: -2rem">back</a></div>
        <div class="card-body">
                <h5>Judul: {{$data->judul}}
                <br>
                slug: <a href="{{ route('show-artikel',['id' => $data->id]) }}" class="text-muted">{{ $data->slug }}</a></h5>
                <p>
                    {{$data->isi}}
                </p>
                @foreach (explode(',',$data->tag) as $tag)
                    @if ($tag == "")
                    @else
                    <button class="btn btn-success">{{$tag}}</button>
                    @endif
                @endforeach
                
        </div>
    </div>
@endsection