<x-base-admin title="Dashboard">

    <x-slot:content>
        <x-sidebar-admin />
        <main class="main-content position-relative border-radius-lg " style="min-height: 100vh">
            <!-- Navbar -->
            <x-navbar-admin />
            <!-- End Navbar -->
            <div class="container-fluid">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('{{ asset('soft-ui-dashboard-main/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
                    <span class="mask bg-gradient-primary opacity-2"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="https://ui-avatars.com/api/?name=Ilham Soejud" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="">
                                    {{ $admin->name }}
                                </h5>
                                <p class="font-weight-bold text-sm">
                                    {{ $admin->email }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                    <li class="nav-item">
                                        <span class="badge badge-pill badge-lg bg-gradient-success">Administrator</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card h-100">
                            <div class="card-header pb-0 p-4">
                                <div class="row ">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h5 class="mb-0">Profile Information</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="name" type="text" class="form-control" id="username"
                                                aria-describedby="emailHelp" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" value="#######">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first-name" class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="first-name"
                                                aria-describedby="emailHelp" value="{{ $user->profile->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last-name" class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="last-name"
                                                aria-describedby="emailHelp" value="{{ $user->profile->last_name }}">
                                        </div>

                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 d-flex flex-column justify-content-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card h-100">
                            <h5 class="card-header">
                                Akun Rekening
                            </h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">A.N</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="{{ $bankAccount->accountBank->user->name }}">
                                </div>
                                <div class="">
                                    <label for="" class="form-label">Rekening Pembayaran</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="{{ $bankAccount->accountBank->bank->codename }} - {{ $bankAccount->accountBank->account_number }}">
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark mt-3 w-100">Tambah rekening</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-slot:content>
</x-base-admin>
