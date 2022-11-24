@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Artikel</div>

                    <div class="card-fluid">
                        <div class="row">
                            @foreach ($artikel as $key)
                                <div class="col-3 m-3">
                                    <div class="card p-3" style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $key->foto) }}" class="card-img-top"
                                            alt="foto artikel{{ $key->id }}">
                                        <div class="card-body text-center">
                                            <h2 class="card-text"><strong>
                                                    {{ $key->judul }}
                                                </strong></h2>
                                            <h5 class="card-text mb-3">{{ $key->isi }}</h5>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="card-text">{{ $key->tanggal_artikel }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card-text">{{ $key->user->name }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card-text">{{ $key->kategori->nama_kategori }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card-text bg-success text-light rounded">Tersedia</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
