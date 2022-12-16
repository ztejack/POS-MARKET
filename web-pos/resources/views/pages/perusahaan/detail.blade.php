<div class="col">
    <h2 class="text-muted">Data Satuan Kerja Perusahaan <strong
            class="text-primary">{{ $perusahaan->nama_perusahaan }}</strong> </h2>
    <div class="nav-align-top mb-4">
        <div class="nav-container">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                {{-- <div class="tablist-nav"> --}}
                @php
                    $i = 1;
                    $pcount = 0;
                @endphp
                @foreach ($satkers->where('perusahaan_id', $perusahaan->id) as $satker)
                    @foreach ($users->where('satker_id', $satker->id) as $user)
                        @php
                            $pcount += 1;
                        @endphp
                    @endforeach
                    @if ($i == 1)
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-{{ $satker->id }}"
                                aria-controls="navs-justified-{{ $satker->id }}" aria-selected="false"><i
                                    class="tf-icons bx bx-hard-hat"></i> {{ $satker->satker }}
                                <span class="badge h-px-20 w-mc badge-center bg-label-danger">
                                    <span class="bx bxs-group"></span>{{ $pcount }}
                                </span>

                            </button>
                        </li>
                    @else
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-{{ $satker->id }}"
                                aria-controls="navs-justified-{{ $satker->id }}" aria-selected="false"><i
                                    class="tf-icons bx bx-hard-hat"></i> {{ $satker->satker }} <span
                                    class="badge h-px-20 w-mc badge-center bg-label-danger">
                                    <span class="bx bxs-group"></span>{{ $pcount }}</span></button>
                        </li>
                    @endif
                    @php
                        $i = 0;
                    @endphp
                @endforeach
                {{-- </div> --}}
            </ul>
        </div>

        <div class="tab-content p-0">
            @php
                $i = 1;
            @endphp
            @foreach ($satkers->where('perusahaan_id', $perusahaan->id) as $satker)
                @if ($i == 1)
                    <div class="tab-pane fade active show" id="navs-justified-{{ $satker->id }}" role="tabpanel">

                        @if ($users->where('satker_id', $satker->id)->count() < 1)
                            <div class="d-flex m-4">
                                <h2 class="m-auto text-center">
                                    <i class='bx bx-ghost bx-tada bx-lg'></i>
                                    Belum ada Data
                                </h2>
                            </div>
                        @else
                            <div class="table-responsive text-nowrap mt-4">

                                <table id="tableUser{{ $satker->id }}" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>NO</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Level User</th>
                                            {{-- <th>Perusahaan</th>
                                                <th>Satuan Kerja</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users->where('satker_id', $satker->id) as $user)
                                            <tr>
                                                <td></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phonenumber }}</td>
                                                <td>
                                                    @if ($user->level->id == 1)
                                                        <span class="badge bg-label-danger">ADMIN</span>
                                                    @elseif($user->level->id == 2)
                                                        <span class="badge bg-label-info">KASIR</span>
                                                    @elseif($user->level->id == 3)
                                                        <span class="badge bg-label-success">USER</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/users/{{ $user->id }}/show"
                                                        class="btn btn-sm btn-primary">
                                                        Detail User
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endif
                    </div>
                @else
                    <div class="tab-pane fade" id="navs-justified-{{ $satker->id }}" role="tabpanel">
                        {{-- <div class="card-datatable">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"> --}}
                        @if ($users->where('satker_id', $satker->id)->count() < 1)
                            <div class="d-flex m-4">
                                <h2 class="m-auto text-center">
                                    <i class='bx bx-ghost bx-tada bx-lg'></i>
                                    Belum ada Data
                                </h2>
                            </div>
                        @else
                            <div class="table-responsive text-nowrap mt-4">

                                <table id="tableUser{{ $satker->id }}" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>NO</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nomor Telepon</th>
                                            <th>Level User</th>
                                            {{-- <th>Perusahaan</th>
                                                <th>Satuan Kerja</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users->where('satker_id', $satker->id) as $user)
                                            <tr>
                                                <td></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phonenumber }}</td>
                                                <td>
                                                    @if ($user->level->id == 1)
                                                        <span class="badge bg-label-danger">ADMIN</span>
                                                    @elseif($user->level->id == 2)
                                                        <span class="badge bg-label-info">KASIR</span>
                                                    @elseif($user->level->id == 3)
                                                        <span class="badge bg-label-success">USER</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $user->satker->perusahaan->nama_perusahaan }}</td>
                                                    <td>{{ $user->satker->satker }}</td> --}}
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a href="/users/{{ $user->id }}/show"
                                                        class="btn btn-sm btn-primary">
                                                        Detail User
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        @endif
                    </div>
                @endif
                @php
                    $i = 0;
                @endphp
            @endforeach

        </div>
    </div>
</div>
