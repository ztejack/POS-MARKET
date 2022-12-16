<div class="modal-onboarding modal animate__animated animate__zoomIn" id="modalBRG{{ $product->id }}" tabindex="-1"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body onboarding-horizontal p-0">
                <div class="onboarding-media">
                    <img src="/img/illustrations/boy-with-laptop-light.png" alt="boy-verify-email-light" width="273"
                        class="img-fluid">
                </div>
                <div class="onboarding-content mb-0 w-100">
                    <h4 class="onboarding-title text-body">Edit Produk</h4>

                    <form action="{{ url('produk/update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="kodePrd" class="form-label">Kode Produk</label>
                                    <input class="form-control" placeholder="Masukkan Kode Produk" type="text"
                                        value="{{ $product->kodePrd }}" tabindex="0" id="kodePrd" name="kodePrd"
                                        required>
                                    @error('kodePrd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input class="form-control" placeholder="Masukkan Satuan Produk" type="text"
                                        value="{{ $product->satuan }}" tabindex="0" id="satuan" name="satuan"
                                        required>
                                    @error('satuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">Rp</span>
                                        <input class="form-control currency" placeholder="Masukkan harga Produk"
                                            type="text" value="@incurrency($product->price)" tabindex="0" id="price"
                                            name="price" required>
                                        @php
                                            $oldprice['$product->id'] = $product->price;
                                        @endphp
                                        <input type="hidden" name="oldprice" value="{{ $oldprice['$product->id'] }}">
                                    </div>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="namaPrd" class="form-label">Nama produk</label>
                                    <input class="form-control" placeholder="Masukkan Nama Produk" type="text"
                                        value="{{ $product->namaPrd }}" tabindex="0" id="namaPrd" name="namaPrd"
                                        required>
                                    @error('namaPrd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input class="form-control" placeholder="Stok" type="number"
                                        value="{{ $product->stok }}" tabindex="0" id="stok" name="stok"
                                        required>
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex">
                                @if (!empty($errors))
                                    @foreach ($errors->all() as $error)
                                        <input hidden type="checkbox" name="modalcbx" id="modalcbx" checked>
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                {{-- @if (session()->has('modal'))
                                @endif --}}


                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
