<section id="produk-form-create" class="">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Produk /</span> Form Tambah Produk
    </h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Tambah Produk</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- @method('post') --}}
                    @csrf
                    {{-- {{ dd($validatedData) }} --}}


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="kode">Kode Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('kodePrd') is-invalid @enderror"
                                id="kodePrd" placeholder="Kode Produk" name="kodePrd" value="{{ old('kodePrd') }}"
                                required>
                            @error('kodePrd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="namaPrd">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('namaPrd') is-invalid @enderror"
                                id="namaPrd" placeholder="Nama Produk" name="namaPrd" value="{{ old('namaPrd') }}"
                                required>
                            @error('namaPrd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="satuan">Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                id="satuan" placeholder="satuan" name="satuan" value="{{ old('satuan') }}" required>
                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="modalprice">Harga Modal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('modalprice') is-invalid @enderror"
                                id="modalprice" placeholder="Harga" name="modalprice" value="{{ old('modalprice') }}"
                                required>

                            @error('modalprice')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="price">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                id="price" placeholder="Harga" name="price" value="{{ old('price') }}" required>

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="stok">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                id="stok" placeholder="stok" name="stok" value="{{ old('stok') }}" required>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fw-icons bx bx-send"></i>
                                &nbsp; Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
