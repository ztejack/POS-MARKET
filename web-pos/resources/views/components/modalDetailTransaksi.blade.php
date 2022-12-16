<!-- Modal -->
<div class="modal fade" id="modalTR{{ $transaksi->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Detail Transaksi
                    <strong> #{{ $transaksi->id }}</strong>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                                    @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
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
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <a type="button" href="/transaksi/cetakdetailtransaksi/{{ $transaksi->id }}" target="_blank"
                    class="btn btn-primary">Cetak</a>
            </div>
        </div>
    </div>
</div>
