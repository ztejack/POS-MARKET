@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @include('components.dataTransaksi')
            {{-- @can('admin')
                <div id="dashboard" class="">
                    @include('dashboard.components.comp1', [
                        'umkms' => $umkms,
                        'users' => $users,
                    ])
                </div>
                <div id="dashboard" class="">
                    @include('dashboard.components.comp2')
                </div>
            @else
                <div id="umkm">
                    @include('dashboard.components.comp3', [
                        'umkmUser' => $umkmUser,
                    ])
                </div>
            @endcan --}}

        </div>
        {{-- footer --}}
        @include('components.footer')

        <div class="content-backdrop fade"></div>
    </div>


    <!-- Content wrapper -->
@endsection
