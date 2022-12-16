{{-- @include('components.cardbtnlaporan') --}}

<div class="card">
    {{-- <div class="card-header flex-column flex-md-row pb-0"> --}}
    <div class="card-header d-flex justify-content-between flex-md-row flex-column pb-0">

        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data Transaksi</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <a type="button" class="btn btn-label-dark me-2" href="/cetak/tagihan" target="_blank">
                    <span>
                        <i class="bx bx-export me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Cetak Laporan</span>
                    </span>
                </a>

                <button class="create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top"
                    data-color="secondary" title="" data-bs-original-title="Layanan Belum Tersedia">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data Transaksi</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-responsive text-nowrap">
                <table id="tableUser" class="table table-hover" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Tanggal Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Nama User</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @can('userlevel')
                        <tbody>
                            @foreach (Auth::user()->tagihan as $tagihan)
                                <tr class="no">
                                    <td class="no"></td>
                                    <td>{{ date('d/m/y', strtotime($tagihan->created_at)) }}</td>

                                    <td>{{ $tagihan->id }}</td>
                                    <td>{{ $tagihan->user->name }}</td>

                                    <td>
                                        @if ($tagihan->status == 0)
                                            <span class="badge bg-label-success"> Belum Lunas </span>
                                        @else
                                            <span class="badge bg-label-warning"> Lunas </span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-sm btn-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#modalTR{{ $tagihan->id }}">
                                                <i class='bx bx-receipt'></i>
                                                Detail
                                            </button>

                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    {{-- <a class="dropdown-item"target="_blank"
                                                        href="/tagihan/{{ $tagihan->id }}/edit">
                                                        <i class='bx bx-edit'></i>
                                                        Edit
                                                    </a> --}}
                                                    <a class="dropdown-item"target="_blank"
                                                        href="/tagihan/cetakdetailtransaksi/{{ $tagihan->id }}">
                                                        <i class='bx bx-printer'></i>
                                                        Print
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <form id="userDelete-form" action="/tagihan/{{ $tagihan->id }}/destroy"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item text-danger"
                                                            onclick="return confirm('Apa anda yakin?')">
                                                            <i class="bx bx-x-circle"></i> Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        @include('components.modalDetailTransaksi')
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endcan

                    @can('kasiradminlevel')
                        <tbody>
                            @foreach ($tagihans as $tagihan)
                                <tr class="no">
                                    <td class="no"></td>
                                    <td>{{ date('d/m/y', strtotime($tagihan->created_at)) }}</td>

                                    <td>{{ $tagihan->id }}</td>
                                    <td>{{ $tagihan->user->name }}</td>

                                    <td>
                                        @if ($tagihan->status == 0)
                                            <span class="badge bg-label-success"> Belum Lunas </span>
                                        @else
                                            <span class="badge bg-label-warning"> Lunas </span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-sm btn-primary me-2"
                                                data-bs-toggle="modal" data-bs-target="#modalTR{{ $tagihan->id }}">
                                                <i class='bx bx-receipt'></i>
                                                Detail
                                            </button>

                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    {{-- <a class="dropdown-item"target="_blank"
                                                        href="/tagihan/{{ $tagihan->id }}/edit">
                                                        <i class='bx bx-edit'></i>
                                                        Edit
                                                    </a> --}}
                                                    <a class="dropdown-item"target="_blank"
                                                        href="/tagihan/cetakdetailtransaksi/{{ $tagihan->id }}">
                                                        <i class='bx bx-printer'></i>
                                                        Print
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <form id="userDelete-form"
                                                        action="/tagihan/{{ $tagihan->id }}/destroy" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item text-danger"
                                                            onclick="return confirm('Apa anda yakin?')">
                                                            <i class="bx bx-x-circle"></i> Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- @include('components.modalDetailTransaksi') --}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endcan


                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Nama User</th>
                            <th>Metode Bayar</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
