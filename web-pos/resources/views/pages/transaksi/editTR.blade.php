@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card-datatable">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="table-responsive text-nowrap">
                        <table id="tableDetail" class="display table table-hover w-100">
                            <thead>
                                <tr class="text-nowrap">
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Kode Produk</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalByr = 0;
                                @endphp
                                @foreach ($transaksi->detail_transaksis as $detail)
                                    <tr class="noin">
                                        <td class="noin text-center"></td>
                                        <td>{{ $detail->kodePrd }}</td>
                                        <td>{{ $detail->namaPrd }}</td>
                                        <td>@currency($detail->price)</td>
                                        <td class="text-center">{{ $detail->qty }}</td>
                                        @php
                                            $total = $detail->qty * $detail->price;
                                            $totalByr += $total;
                                        @endphp
                                        <td>@currency($total) </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="d-flex justify-content-end">
                            {{-- <h4>Total : {{ $transaksi->total_Byr }} </h4> --}}
                            <h4>Total : @currency($totalByr) </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- footer --}}
        @include('components.footer')

        <div class="content-backdrop fade"></div>
    </div>


    <!-- Content wrapper -->
@endsection
