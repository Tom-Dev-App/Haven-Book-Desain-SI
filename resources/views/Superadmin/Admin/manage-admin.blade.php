<x-base-admin title="Manage Admin">
    <x-slot:content>
        <x-sidebar-admin />
        <div class="main-content position-relative bg-gray-100" style="min-height: 100vh">
            <x-navbar-admin />
            <div class="container-fluid py-4">
                <div class="row" style="min-height: 100vh">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <a href="" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                    data-bs-target="#modal-default">
                                    Add Admin
                                </a>
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
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Account Bank</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Created at</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">
                                                                    {{ $admin->name }}
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $admin->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle ">
                                                        @if ($admin->accountBank)
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $admin->accountBank->bank->codename }} -
                                                                {{ $admin->accountBank->account_number }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($admin->deleted_at)
                                                            <span class="badge bg-gradient-danger">Suspended</span>
                                                        @else
                                                            <span class="badge bg-gradient-primary">Active</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-sm font-weight-bold">
                                                            {{ $admin['created_at'] }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if (!$admin->deleted_at)
                                                            <a href="{{ route('delete-admin', $admin['id']) }}"
                                                                class="my-auto btn bg-gradient-danger    fw-bold"
                                                                data-toggle="tooltip"
                                                                data-original-title="Edit user">Delete
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
                    aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content w-75">
                            <form action="{{ route('add-admin') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h6 class="modal-title" id="modal-title-default">
                                        Add new Admin
                                    </h6>

                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="book-title" class="form-control-label">
                                                Username
                                                <span class="text-danger text-sm">*</span>
                                            </label>
                                            <input required class="form-control @error('name') is-invalid @enderror"
                                                type="text" name="name" value="{{ @old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="book-title" class="form-control-label">
                                                Email
                                                <span class="text-danger text-sm">*</span>
                                            </label>
                                            <input required class="form-control @error('email') is-invalid @enderror"
                                                type="email" name="email" value="{{ @old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="book-title" class="form-control-label">
                                                Password
                                                <span class="text-danger text-sm">*</span>
                                            </label>
                                            <input required class="form-control @error('password') is-invalid @enderror"
                                                type="password" name="password" value="{{ @old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-gradient-dark">Add
                                        Book
                                    </button>
                                    <button type="button" class="btn btn-outline-link  ml-auto"
                                        data-bs-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
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
                                        target="_blank">Creative Tim</a>
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
                                        <a href="https://www.creative-tim.com/presentation"
                                            class="nav-link text-muted" target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                            target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license"
                                            class="nav-link pe-0 text-muted" target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </x-slot:content>
</x-base-admin>
