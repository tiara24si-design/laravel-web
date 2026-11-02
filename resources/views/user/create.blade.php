```php
@extends('layouts.admin.app')

@section('content')

    {{-- Start Main Content --}}

    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah User</h1>
                <p class="mb-0">Form untuk menambahkan data user baru</p>
            </div>

            <div>
                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">

                                {{-- Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Name
                                    </label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="form-control"
                                           required>
                                </div>

                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password
                                    </label>
                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control"
                                           required>
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           class="form-control"
                                           required>
                                </div>

                                {{-- Buttons --}}
                                <div>
                                    <button type="submit"
                                            class="btn btn-primary">
                                        Simpan
                                    </button>

                                    <a href="{{ route('user.index') }}"
                                       class="btn btn-outline-secondary ms-2">
                                        Batal
                                    </a>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- End Main Content --}}

@endsection

