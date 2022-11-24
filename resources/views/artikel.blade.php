@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Artikel</div>

                    <div class="card-body">
                        <div class="tambah">
                            <a href="{{ route('artikel.create') }}" data-bs-toggle="modal" data-bs-target="#tambah"
                                class="btn btn-primary">Tambah</a>
                        </div>
                        <table class="table table-bordered p-3">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Tanggal Artikel</th>
                                    <th>Kategori</th>
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikel as $key)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $key->foto) }}" style="width: 100px"
                                                alt=""></td>
                                        <td>{{ $key->judul }}</td>
                                        <td>
                                            <details>
                                                <summary>Isi</summary>
                                                {{ $key->isi }}
                                            </details>
                                        </td>
                                        <td>{{ $key->tanggal_artikel }}</td>
                                        <td>{{ $key->kategori->nama_kategori }}</td>
                                        <td>{{ $key->user->name }}</td>
                                        <td>
                                            <form action="{{ route('artikel.destroy', $key->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('artikel.edit', $key->id) }}" class="btn btn-warning"
                                                    data-bs-toggle="modal" data-bs-target="#ed{{ $key->id }}">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="ed{{ $key->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('artikel.update', $key->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" class="form-control" name="judul"
                                                                value="{{ $key->judul }}">
                                                            <label for="formFloatingInput">Judul</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" class="form-control" name="isi"
                                                                value="{{ $key->isi }}">
                                                            <label for="formFloatingInput">Isi</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <img src="{{ asset('storage/' . $key->foto) }}"
                                                                style="width: 100px" alt="">
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="file" class="form-control" name="foto"
                                                                value="{{ $key->foto }}">
                                                            <label for="formFloatingInput">Foto</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="date" class="form-control"
                                                                name="tanggal_artikel" value="{{ $key->tanggal_artikel }}">
                                                            <label for="formFloatingInput">Tanggal Artikel</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <select name="kategori_id" id="" class="form-select">
                                                                <option selected>Pilih Kategori</option>
                                                                @foreach ($kategori as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ $item->id == $key->kategori_id ? 'selected' : '' }}>
                                                                        {{ $item->nama_kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input type="hidden" class="form-control" name="user_id"
                                                                value="{{ Auth::user()->id }}">
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="judul">
                        <label for="formFloatingInput">Judul</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="isi">
                        <label for="formFloatingInput">Isi</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="file" class="form-control" name="foto">
                        <label for="formFloatingInput">Foto</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="date" class="form-control" name="tanggal_artikel">
                        <label for="formFloatingInput">Tanggal Artikel</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="kategori_id" id="" class="form-select">
                            <option selected>Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" @selected(old('kategori_id' == $item->id))>
                                    {{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
