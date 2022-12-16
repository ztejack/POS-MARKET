<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data Barang</h5>
        </div>

        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0"
                    aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <i class="bx bx-export me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </span>
                </button>
                <a href=" {{ route('produk.create') }}" class="dt-button create-new btn btn-primary" tabindex="0"
                    aria-controls="DataTables_Table_0">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New Record</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-responsive text-nowrap">
                <table id="tableBarang" class="table table-hover" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Kode Barang</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Harga Lama</th>
                            <th>Harga Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $product)
                            <tr>
                                <td class="no"></td>
                                <td>{{ $product->kodePrd }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>{{ $product->namaPrd }}</td>
                                <td>{{ $product->satuan }}</td>
                                <td>@currency($product->modalprice)</td>
                                <td>{{ $product->stok }}</td>
                                <td>@currency($product->price)</td>
                                <td>@currency($product->oldprice)</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalBRG{{ $product->id }}">Edit
                                    </button>
                                    @include('components.modaleditBarang')
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDEL{{ $product->id }}">
                                        Hapus
                                    </button>
                                    @include('components.modaldelBarang')
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Kode Barang</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Modal</th>
                            <th>Stok</th>
                            <th>Harga Lama</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
