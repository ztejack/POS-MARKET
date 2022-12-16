@extends('layouts.printpage')

@section('content')
    <div class="invoice-print p-5">

        <div class="d-flex justify-content-between flex-row">
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
                <div class="col-8">
                    <p class="mb-1">Kantor Terpadu PT Bukit Asam Tbk. Unit Pelabuhan Tarahan</p>
                    <p class="mb-1">Jl. Soekarno Hatta KM. 15, Tarahan, Srengsem, Kec. Panjang, Kota Bandar Lampung,
                        Lampung
                    </p>
                    <p class="mb-0">{{ $userx->phonenumber }}</p>
                </div>

            </div>
            <div>
                <h4>Invoice #{{ $transaksi->id }}</h4>
                <div class="mb-2">
                    <span>Tanggal:</span>
                    <span class="fw-semibold">{{ date('d/m/Y', strtotime($transaksi->created_at)) }}</span>
                </div>
            </div>
        </div>

        <hr>

        <div class="row d-flex mb-4">
            <div class="col-sm-2">
                <h6>Customer:</h6>
                <p class="mb-1 fw-semibold">Nama </p>
                <p class="mb-1 fw-semibold">Perusahaan </p>
                <p class="mb-1 fw-semibold">Satuan Kerja </p>
                <p class="mb-1 fw-semibold">Nomor Telepon </p>
                <p class="mb-0 fw-semibold">Email </p>
            </div>
            <div class="col-sm-4 pt-3">

                <p class="mb-1 mt-3">: {{ $transaksi->user->name }}</p>
                <p class="mb-1">: {{ $transaksi->user->satker->perusahaan->nama_perusahaan }}</p>
                <p class="mb-1">: {{ $transaksi->user->satker->satker }}</p>
                <p class="mb-1">: {{ $transaksi->user->phonenumber }}</p>
                <p class="mb-0">: {{ $transaksi->user->email }}</p>
            </div>
            <div class="col-sm-2">
                <h6>Pembayaran:</h6>
                <p class="mb-1 fw-semibold">Metode Pembayaran </p>
                <p class="mb-1 fw-semibold">ID Tagihan </p>
            </div>
            <div class="col-sm-4 pt-3">
                @if ($transaksi->metode_Byr > 0)
                    <p class="mb-1 mt-3">: <span class="badge bg-label-warning">Kredit</span> </p>
                @else
                    <p class="mb-1 mt-3">: <span class="badge bg-label-success">Tunai</span> </p>
                @endif
                @if ($transaksi->id_tagihan > 0)
                    <p class="mb-1 fw-semibold">: #{{ $transaksi->id_tagihan }}</p>
                @else
                    <p class="mb-1 ">: </p>
                @endif

            </div>
        </div>

        <div class="table-responsive">
            <table class="table border-top m-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalByr = 0;
                    @endphp
                    @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                        <tr class="noin">
                            <td class="noin"></td>
                            <td>{{ $detail->kodePrd }}</td>
                            <td>{{ $detail->namaPrd }}</td>
                            <td>@currency($detail->price)</td>
                            <td>{{ $detail->qty }}</td>
                            @php
                                $total = $detail->qty * $detail->price;
                                $totalByr += $total;
                            @endphp
                            <td>@currency($total) </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4" class="align-top px-2 py-3">
                            <p class="mb-2">
                                <span class="me-1 fw-semibold">Kasir:</span>
                                <span>{{ $userx->name }}</span>
                            </p>
                            <span>Terimaksih telah Berbelanja</span>
                        </td>
                        <td class="text-end px-4 py-3">
                            <p class="mb-0 fs-4">Total:</p>
                        </td>
                        <td class="px-0 py-3">
                            <p class="fw-semibold mb-0 fs-4">@currency($totalByr)</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-12">
                <span class="fw-semibold">Note:</span>
                <span>Barang yang sudah di beli tidak dapat di kembalikan</span>
            </div>
        </div>
    </div>
@endsection
