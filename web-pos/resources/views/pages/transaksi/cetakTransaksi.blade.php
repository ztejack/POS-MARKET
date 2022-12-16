@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                    <div class="card invoice-preview-card">
                        <div class="card-body p-0"id="printarea">
                            <div class="d-flex justify-content-between flex-row  p-3">
                                <div class="mb-4">
                                    <div class="d-flex svg-illustration mb-3 gap-2">
                                        <span class="app-brand-logo demo">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290.27 304.48">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: #ffc40d;
                                                        }

                                                        .cls-1,
                                                        .cls-2 {
                                                            fill-rule: evenodd;
                                                        }

                                                        .cls-2 {
                                                            fill: #ce4147;
                                                        }
                                                    </style>
                                                </defs>
                                                <title>Logo_Bukit_Asam</title>
                                                <g id="Layer_2" data-name="Layer 2">
                                                    <g id="Layer_1-2" data-name="Layer 1">
                                                        <g id="svg825">
                                                            <g id="Layer1000">
                                                                <g id="Layer1001">
                                                                    <g id="Layer1002">
                                                                        <path id="path816" class="cls-1"
                                                                            d="M0,116.41c0,24.7,5.17,46.56,14.8,62.8,5.9,9.94,16.78,23.92,27.64,28.75,34.5,15.33,66.23-23.64,99.44-23.64,34.57,0,69.48,46.06,109.92,15.94,13.56-10.1,25.8-31.8,32.13-47.9,8.68-22,8.78-50.41-1.79-71.32-1.4-2.76-2.51-5.12-3.84-7.69-2.21-4.29-6.44-9.72-9.44-13.59A27.31,27.31,0,0,0,266,56.54c-1.39-1.42-1.49-1.92-2.72-3.33-5.55-6.38-18.56-15.12-26.63-19.46-22.89-12.32-54.5-13.48-76.6,3.23-3.27,2.48-6.8,5.07-9.09,8.49,19.75,1.65,34.88,15.08,43.24,30.12A103.08,103.08,0,0,1,199,85.91c2.26,5.34,4.75,17.91,4.29,24.73-1.48,21.75-8.2,35.42-25.51,48.39-38.73,29-91.13-2.87-91.13-45.65,0-22.18,17.86-55.1,29.21-73.86,2.18-3.59,22.35-37,22.93-39.52H42.42c-2.33.17-2.58.8-4,2.67-9.28,12.42-7.84,10-16,24C9.43,49.12,0,89.31,0,116.41Z" />
                                                                        <path id="path818" class="cls-2"
                                                                            d="M.77,304.48H289.49V194.07H289c-7.12,13.08-16.29,26-26.07,33.37-44.65,33.65-83.19-17.81-121.35-17.81-36.66,0-71.69,43.55-109.77,26.42-12-5.4-24-21-30.52-32.13l-.48-.83Z" />
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>

                                        </span>
                                        <span class="app-brand-text demo text-body fw-bolder">Kopkarbara</span>
                                    </div>
                                    {{-- <p class="mb-1">San Diego County, CA 91905, USA</p>
                                    <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p> --}}
                                </div>
                                <div>
                                    <h4>Laporan Transaksi</h4>
                                    <div class="mb-2">
                                        <p class="mb-1">Data Transaksi</p>

                                        <span id="tgl" class="me-1">Tanggal:
                                            {{ date('d/m/yy', strtotime($date)) }}</span>
                                        <span class="fw-semibold" id="date1"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <hr class="my-0">
                                <table class="table" style="width:100%;  page-break-inside: auto; ">
                                    <thead style="display: table-header-group;">
                                        <tr class="text-nowrap">
                                            <th>ID</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Nama User</th>
                                            <th>Metode Bayar</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">
                                        @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td class="text-info">#{{ $transaksi->id }}</td>
                                                <td>{{ date('d/m/yy', strtotime($transaksi->created_at)) }}</td>
                                                <td>{{ $transaksi->user->name }}</td>
                                                <td>
                                                    @if ($transaksi->metode_Byr == 0)
                                                        <span class="badge bg-label-success"> Tunai </span>
                                                    @else
                                                        <span class="badge bg-label-warning"> Kredit </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $totalByr = 0;
                                                    @endphp
                                                    @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                                        @php
                                                            $total = $detail->qty * $detail->price;
                                                            $totalByr += $total;
                                                        @endphp
                                                    @endforeach
                                                    @currency($totalByr)
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <th>ID</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama User</th>
                                        <th>Metode Bayar</th>
                                        <th>Total Bayar</th>
                                    </tfoot>
                                </table>
                                {{-- </div> --}}
                                <div class="row m-3">
                                    <div class="col-12">
                                        <span class="fw-semibold">Note:</span>
                                        <span>Laporan Data Penjualan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                    <div class="card">
                        <div class="card-body">
                            {{-- <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                                data-bs-target="#sendInvoiceOffcanvas">
                                <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                        class="bx bx-paper-plane bx-xs me-3"></i>Send Invoice</span>
                            </button> --}}
                            <label for="inputdate">Metode Pembayaran</label>
                            <select class="form-select" id="metode_byr" aria-label="Default select example">
                                <option selected="">Metode Transaksi</option>
                                <option value="0">Tunai</option>
                                <option value="1">Kredit</option>
                            </select>

                            <label for="inputdate" class="mt-2">Tanggal Transaksi</label>
                            <input id="inputdate" type="date" class="form-control mb-3" value=""
                                placeholder="{{ date('d/m/yy', strtotime($date)) }}">

                            <button class="btn btn-label-secondary  w-100 mb-3" id="searchButton">
                                <i class="bx bx-search"></i> Cari Data
                            </button>
                            <button class="btn btn-primary w-100 mb-3" id="printButton">
                                <i class="bx bx-printer"></i> Print
                            </button>
                            {{-- <a href="./app-invoice-edit.html" class="btn btn-label-secondary d-grid w-100 mb-3">
                                Edit Invoice
                            </a> --}}
                            {{-- <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas"
                                data-bs-target="#addPaymentOffcanvas">
                                <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                        class="bx bx-dollar bx-xs me-3"></i>Add Payment</span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
