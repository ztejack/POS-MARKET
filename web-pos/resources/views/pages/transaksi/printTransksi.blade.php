@extends('layouts.print')
@section('content')
    <div class="invoice-print">

        <div class="d-flex justify-content-center flex-row">
            <div class="">
                <div class="d-flex svg-illustration  gap-2">
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
                    <span class="app-brand-text demo text-body fw-bolder">Data Transaksi </span>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between mb-4">

        </div>

        <div class="table-responsive">
            <table class="table border-top m-0">
                <thead>
                    <tr class="text-nowrap">
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>Nama User</th>
                        <th>Metode Bayar</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td></td>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->user->name }}</td>

                            <td>
                                @if ($transaksi->metode_Byr == 0)
                                    <strong> Tunai </strong>
                                @else
                                    <strong> Kredit </strong>
                                @endif
                            </td>
                            <td>{{ date('d/m/y', strtotime($transaksi->created_at)) }}</td>

                        </tr>
                        <tr>
                            <td>
                                @foreach ($details->where('id_Transaksi', $transaksi->id) as $detail)
                                @endforeach
                            </td>
                        </tr>
                        {{-- @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                <tr class="ctn">
                                    <td>{{ $detail->id_Produk }}</td>
                                </tr>
                            @endforeach --}}
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="row">
            <div class="col-12">
                <span class="fw-semibold">Note:</span>
                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future
                    freelance projects. Thank You!</span>
            </div>
        </div>
    </div>
@endsection
