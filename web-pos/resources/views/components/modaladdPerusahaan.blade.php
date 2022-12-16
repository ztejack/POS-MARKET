<!-- Modal -->
<div class="modal fade" id="modalAddPerusahaan" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="nav-align-top">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-perushaan" aria-controls="navs-justified-perushaan"
                            aria-selected="true"><i class="tf-icons bx bx-buildings"></i> Perusahaan </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-satker" aria-controls="navs-justified-satker"
                            aria-selected="false"><i class="tf-icons bx bx-hard-hat"></i> Satuan Kerja</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="navs-justified-perushaan" role="tabpanel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambah Data Perusahaan
                                <strong></strong>
                            </h5>
                            <button type="button" class="btn-close close-pill" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('perusahaan.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3 text-start">
                                        <label for="perusahaan_id" class="form-label">Nama Perusahaan</label>
                                        <input id="perusahaan_id" name="nama_perusahaan" type="perusahaan_id"
                                            class="form-control @error('perusahaan_id') is-invalid @enderror" required>
                                        @error('nama_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Tambah Perusahaan</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-satker" role="tabpanel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambah Data Satuan Kerja
                                <strong></strong>
                            </h5>
                            <button type="button" class="btn-close close-pill" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('satker.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3 text-start">
                                        <label for="perusahaan_id" class="form-label">Nama Perusahaan</label>
                                        <select class="form-select @error('perusahaan_id') is-invalid @enderror"
                                            id="perusahaan_id" name="perusahaan_id" aria-label="Default select example">
                                            @foreach ($perusahaans as $perusahaan)
                                                <option value="{{ $perusahaan->id }}">
                                                    {{ $perusahaan->nama_perusahaan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('perusahaan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 text-start">
                                        <label for="satker" class="form-label">Nama Satuan Kerja</label>
                                        <input id="satker" name="satker" type="satker"
                                            class="form-control @error('satker') is-invalid @enderror" required>
                                        @error('satker')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Tambah Satker</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
