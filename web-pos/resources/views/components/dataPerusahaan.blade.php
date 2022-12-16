@include('components.modaladdPerusahaan')

<div class="accordion-item card mb-4">
    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
            data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1" aria-expanded="false">
            Daftar Perusahaan
        </button>
        <button class="dt-button create-new btn btn-primary" tabindex="0" data-bs-toggle="modal"
            data-bs-target="#modalAddPerusahaan" type="button">
            <span>
                <i class="bx bx-plus me-sm-2"></i>
                <span class="d-none d-sm-inline-block">Add New Record</span>
            </span>
        </button>
    </h2>

    <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon" style="">
        <div class="accordion-body">
            <div class="card-datatable">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="table-responsive text-nowrap">
                        <table id="tablePerusahaan" class="table table-hover " style="width:100%">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>NO</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Jumlah Satuan Kerja</th>
                                    <th>Jumlah Kariawan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perusahaans as $perusahaan)
                                    @php
                                        $pcount = 0;
                                    @endphp
                                    @foreach ($satkers->where('perusahaan_id', $perusahaan->id) as $satker)
                                        @foreach ($users->where('satker_id', $satker->id) as $user)
                                            @php
                                                $pcount += 1;
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                                        <td>{{ $perusahaan->satker->count() }}</td>
                                        <td>{{ $pcount }}</td>
                                        <td>
                                            <a href="perusahaan/{{ $perusahaan->id }}/detail"
                                                class="btn btn-sm btn-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Jumlah Satuan Kerja</th>
                                    <th>Jumlah Kariawan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
