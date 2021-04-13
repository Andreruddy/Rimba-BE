@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Item</strong>
            <div class="card-body card-block">
                <form action="{{ route('items.update', $items->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                <div class="form-group">
                    <label for="nama" class=" form-control-label">Nama</label>
                    <input type="text" 
                        name="nama_item"
                        value="{{ old('nama_item') ? old('nama_item') : $items->nama_item }}"
                        id="company" 
                        placeholder="Masukkan Nama" 
                        class="form-control">
                @error('nama_item') <div class="text-muted text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="unit" class=" form-control-label">Unit</label>
                    <select name="unit" 
                        id="select" 
                        class="form-control"
                        value="{{ old('unit') ? old('unit') : $items->unit }}"
                        >
                        <option value="0">Please select</option>
                        <option value="1">kg</option>
                        <option value="2">pcs</option>
                    </select>
                    @error('unit') <div class="text-muted text-danger">{{$message}}</div> @enderror

                </div>
                <div class="form-group">
                    <label for="stok" class=" form-control-label">Stok</label>
                    <input type="text" 
                        name="stok"
                        value="{{ old('stok') ? old('stok') : $items->stok }}"
                        id="stok" 
                        placeholder="Masukkan Jumlah Stok" 
                        class="form-control">
                @error('stok') <div class="text-muted text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="harga_s" class=" form-control-label">Harga Satuan</label>
                    <input type="number" 
                        name="harga_satuan" 
                        value="{{ old('harga_satuan') ? old('harga_satuan') : $items->harga_satuan }}"
                        id="harga_s" 
                        placeholder="Masukkan Harga" 
                        class="form-control">
                @error('harga_satuan') <div class="text-muted text-danger">{{$message}}</div> @enderror

                </div>
                <div class="form-group">
                    <label for="harga" class=" form-control-label">Harga Grosir</label>
                    <input type="number" 
                    name="harga_grosir" 
                    value="{{ old('harga_satuan') ? old('harga_satuan') : $items->harga_grosir }}"
                    id="harga" 
                    placeholder="Masukkan Harga" 
                    class="form-control">
                @error('harga_grosir') <div class="text-muted text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" name="image" id="file-input" name="file-input" class="form-control-file">
                @error('image') <div class="text-muted text-danger">{{$message}}</div> @enderror

                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-outline-success">Edit Items</button>
                </div>
            </div>
        </div>
    </div>
@endsection