
@extends('layouts.admin.app')

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Edit User
            </li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk mengubah data user.</p>
        </div>

        <div>
            <a href="{{ route('user.index') }}"
                class="btn btn-primary">
                <i class="fas fa-arrow-left me-1"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

                <form action="{{ route('user.update', $dataUser->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row mb-4">

                        <!-- First Name -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">
                                    First Name
                                </label>

                                <input type="text"
                                    id="first_name"
                                    class="form-control"
                                    name="first_name"
                                    value="{{ old('first_name', $dataUser->first_name) }}"
                                    required>
                            </div>

                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">
                                    Last Name
                                </label>

                                <input type="text"
                                    id="last_name"
                                    class="form-control"
                                    name="last_name"
                                    value="{{ old('last_name', $dataUser->last_name) }}"
                                    required>
                            </div>
                        </div>

                        <!-- Birthday and Gender -->
                        <div class="col-lg-4 col-sm-6">

                            <div class="mb-3">
                                <label for="birthday" class="form-label">
                                    Birthday
                                </label>

                                <input type="date"
                                    id="birthday"
                                    class="form-control"
                                    name="birthday"
                                    value="{{ old('birthday', $dataUser->birthday) }}">
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">
                                    Gender
                                </label>

                                <select id="gender"
                                    name="gender"
                                    class="form-select">

                                    <option value="">Pilih Gender</option>

                                    <option value="Male"
                                        {{ old('gender', $dataUser->gender) == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>

                                    <option value="Female"
                                        {{ old('gender', $dataUser->gender) == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>

                                </select>
                            </div>
                        </div>

                        <!-- Email and Phone -->
                        <div class="col-lg-4 col-sm-12">

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                    id="email"
                                    class="form-control"
                                    name="email"
                                    value="{{ old('email', $dataUser->email) }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">
                                    Phone
                                </label>

                                <input type="text"
                                    id="phone"
                                    class="form-control"
                                    name="phone"
                                    value="{{ old('phone', $dataUser->phone) }}">
                            </div>

                            <!-- Buttons -->
                            <div>
                                <button type="submit"
                                    class="btn btn-primary">
                                    Simpan Perubahan
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

@endsection
