@extends('template.main')
@section('content')

  <div class="container mt-4">
    <h1>OasisApp | Pilih Kandidat </h1>
    <p>Ini adalah program pemilihan osis berbasis tech.</p>
  </div>


  <div class="container">
    <div class="row form-container">
    <!-- Form sebelah kiri -->
    <div class="col-md-6 form-left">
      <form action="{{ route('pemilihan.update') }}" method="POST">
      @csrf
      <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">
      <input type="hidden" name="status_memilih" value="sudah">
      <div class="mb-3">
        <label for="nama_kandidat">Nama Kandidat : </label>
        <input type="text" id="nama_kandidat" class="form-control" required value="{{ $kandidat->nama_kandidat }}"
        readonly>
      </div>
      <div class="mb-3">
        <label for="kelas">Kelas : </label>
        <input type="text" id="kelas" class="form-control" required value="{{ $kandidat->kelas }}" readonly>
      </div>
      <div class="mb-3">
        <label for="visi">Visi : </label>
        <input type="text" id="visi" class="form-control" required value="{{ $kandidat->visi }}" readonly>
      </div>
      <div class="mb-3">
        <label for="misi">Misi : </label>
        <input type="text" class="form-control" id="misi" required value="{{ $kandidat->misi }}" readonly>
      </div>
    </div>
    </div>

    <!-- Tombol Submit -->
    <div class="row">
    <div class="col-md-12 submit-button">
      <button type="submit" class="btn btn-success">Pilih</button>
      <a href="/pemilihan" class="btn btn-secondary">kembali</a>
      </form>
    </div>
    </div>
  </div>


@endsection