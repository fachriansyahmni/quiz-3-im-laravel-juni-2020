@extends('layouts.master')

@section('page-title','Artikel')
@section('page-heading','Artikel')
@section('content')
    <div class="card shadow col-lg">
        <div class="card-body">
            <div class="text-right mb-2 mt-2">
                <a href="{{route('new-artikel')}}" class="btn btn-success btn-sm">Tambah Artikel</a>
            </div>
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Judul</th>
                    <th class="text-center" scope="col">Dibuat Oleh</th>
                    <th class="text-center" scope="col">Tag</th>
                    <th class="text-center" scope="col">Tanggal Dibuat</th>
                    <th class="text-center" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($hitung == 0)
                        <tr><td colspan="6" class="text-center">Belum Ada Data</td></tr>
                    @else
                        @foreach ($data as $key => $artikel)    
                        <tr>
                        <th scope="row">{{ ++$key}}</th>
                        <td><a href="{{ route('show-artikel',['id' => $artikel->id]) }}">{{ $artikel->judul }}</a></td>
                        <td class="text-center">{{ $artikel->createby_id }}</td>
                        <td class="text-center">
                            @foreach (explode(',',$artikel->tag) as $tag)
                                @if ($tag == "")
                                @else
                                    <button class="btn btn-success">{{$tag}}</button>
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">{{ $artikel->created_at }}</td>
                        <td class="text-center text-inline">
                            <a href="{{ route('edit-artikel',['id' => $artikel->id]) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                            <form action="{{ route('delete-artikel',['id' => $artikel->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $data->links() }}
            </div>
        </div>
  </div>
@endsection

@push('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>   
@endpush