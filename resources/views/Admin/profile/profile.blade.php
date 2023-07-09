<x-base-admin title="Profile">

    <x-slot:content>
        <x-sidebar-admin />
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbar-admin />
            <div class="container-fluid">
                @if (session('alert') && session('alertType') == 'Success')
                    <script>
                        Toast.fire({
                            icon: 'success',
                            title: '{{ Session::get('alert') }}'
                        })
                    </script>
                @elseif(session('alert') && session('alertType') == 'Danger')
                    <script>
                        Toast.fire({
                            icon: 'error',
                            title: '{{ Session::get('alert') }}'
                        })
                    </script>
                @endif
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
                                    Ilham Soejud
                                </h5>
                                <p class="font-weight-bold text-sm">
                                    registered at
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
                    <div class="col-12 col-md-12">
                        <div class="card h-100">
                            <div class="card-header pb-0 p-4">
                                <div class="row ">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h5 class="mb-0">Profile Information</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update-admin-profile', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input name="name" type="text" class="form-control" id="username"
                                                    aria-describedby="emailHelp" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div> --}}
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div> --}}
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword1" value="#######">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div> --}}
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="first-name" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    id="first-name" aria-describedby="emailHelp"
                                                    value="{{ $user->profile->first_name }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div> --}}
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="last-name" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    id="last-name" aria-describedby="emailHelp"
                                                    value="{{ $user->profile->last_name }}">
                                            </div>

                                        </div>
                                        <div class="col-md-1 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="old_name" value="{{ $user->name }}">
                                    <input type="hidden" name="old_email" value="{{ $user->email }}">
                                    <input type="hidden" name="old_first_name"
                                        value="{{ $user->profile->first_name }}">
                                    <input type="hidden" name="old_last_name" value="{{ $user->profile->last_name }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </x-slot:content>
</x-base-admin>
