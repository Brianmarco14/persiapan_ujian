@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Menghitung BMI</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 p-3">
                                <h2>Form Hitung</h2>
                                <form action="{{ route('dasboard.store') }}" method="POST" class="mt-3">
                                    @csrf
                                    <div class="mb-3 form-floating">
                                        <input type="text" class="form-control" name="nama">
                                        <label for="formFloatingInput">Nama</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="number" class="form-control" name="tinggi">
                                        <label for="formFloatingInput">Tinggi Badan</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="number" class="form-control" name="berat">
                                        <label for="formFloatingInput">Berat Badan</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="number" class="form-control" name="tahun">
                                        <label for="formFloatingInput">Tahun Lahir</label>
                                    </div>
                                    <label class="form-label">Hobi</label>
                                    <div class="mb-3 form-floating">
                                        <div class="row">
                                            <div class="col-4">

                                                <input type="text" class="form-control" name="hobi">
                                            </div>
                                            <div class="col-4">

                                                <input type="text" class="form-control" name="hobi">
                                            </div>
                                            <div class="col-4">

                                                <input type="text" class="form-control" name="hobi">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Hitung</button>
                                </form>
                                </form>
                            </div>
                            <div class="col-6 p-3">
                                <h2>Hasil</h2>
                                <div class="row">
                                    @isset($data)
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">

                                                    <label class="form-label"><strong>Nama : </strong></label>
                                                </div>
                                                <div class="col-7">

                                                    <span>{{ $data['nama'] }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">
                                                    
                                                    <label class="form-label"><strong>Tinggi Badan : </strong></label>
                                                </div>
                                                <div class="col-7">

                                                    <span>{{ $data['tinggi'] }} cm</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">

                                                    <label class="form-label"><strong>Berat Badan : </strong></label>
                                                </div>
                                                <div class="col-7">

                                                    <span>{{ $data['berat'] }} kg</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">

                                                    <label class="form-label"><strong>BMI : </strong></label>
                                                </div>
                                                <div class="col-7">

                                                    <span>{{ $data['bmi'] }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">
                                                    <label class="form-label"><strong>Status : </strong></label>
                                                </div>
                                                <div class="col-7">
                                                    <span>{{ $data['status'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">
                                                    <label class="form-label"><strong>Umur : </strong></label>
                                                </div>
                                                <div class="col-7">
                                                    <span>{{ $data['umur'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">
                                                    <label class="form-label"><strong>Hobi : </strong></label>
                                                </div>
                                                <div class="col-7">
                                                    <span>{{ $data['hobi'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-5">
                                                    <label class="form-label"><strong>Konsultasi Gratis : </strong></label>
                                                </div>
                                                <div class="col-7">
                                                    <span>{{ $data['konsultasi'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
