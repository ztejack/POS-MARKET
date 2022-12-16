<section id="produk-form-create" class="">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">User /</span> Edit Data User
    </h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Edit User</h5>
            </div>
            <div class="card-body">
                <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3 text-start">
                            <label for="name" class="form-label">Nama User</label>
                            <input id="name" type="name" name="name" value="{{ old('name', $user->name) }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 text-start">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="text" name="username"
                                value="{{ old('username', $user->username) }}"
                                class="form-control @error('username') is-invalid @enderror" required>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" value="{{ old('email', $user->email) }}" type="text"
                                class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 text-start">
                            <label for="leveluser" class="form-label">Level User</label>
                            <select class="form-select @error('leveluser') is-invalid @enderror" id="leveluser"
                                name="level_id" required>
                                @foreach ($levels as $level)
                                    @if (old('level_id', $user->level_id) == $level->id)
                                        <option value="{{ $level->id }}" selected>{{ $level->level }}</option>
                                    @else
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('level_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 text-start">
                            <label class="form-label" for="phonenumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="phonenumber" name="phonenumber" class="form-control"
                                    placeholder="" value="{{ old('phonenumber', $user->phonenumber) }}" required>
                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 text-start">
                            <label for="perusahaan_idadd" class="form-label">Perusahaan</label>
                            <select class="form-select" id="perusahaan_idadd" name="perusahaan_id">
                                @foreach ($perusahaans as $perusahaan)
                                    @if (old('perusahaan_id', $user->perusahaan_id) == $perusahaan->id)
                                        <option value="{{ $perusahaan->id }}" selected>
                                            {{ $perusahaan->nama_perusahaan }}</option>
                                    @else
                                        <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="password" id="password" value="12345678">
                        <div class="col-md-6 mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <p>Password default untuk user adalah <mark> <strong
                                        class="text-warning">"12345678"</strong></mark> mohon arahkan kepada
                                user untuk mengganti password demi keamanan dan kenyamanan bersama.</p>
                        </div>

                        <div class="col-md-6 mb-3 text-start">
                            <label for="satker_idadd" class="form-label">Satuan Kerja</label>
                            <select id="satker_idadd" name="satker_id"
                                class="form-select @error('satker') is-invalid @enderror" required>
                                @foreach ($satkers as $satker)
                                    @if (old('satker_id', $user->satker_id) == $satker->id)
                                        <option value="{{ $satker->id }}" selected>
                                            {{ $satker->satker }}
                                        </option>
                                    @else
                                        <option value="{{ $satker->id }}">
                                            {{ $satker->satker }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('satker_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4 ">
                            <button type="submit" class="btn btn-primary"><i class="fw-icons bx bx-send"></i>
                                &nbsp; Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
