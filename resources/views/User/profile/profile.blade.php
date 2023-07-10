<x-base>
    <x-slot:content>
        <x-navbar />
        <section class="profile py-7" id="" style="min-height: 100%">
            <div class="modal fade" id="add-rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="container-fluid py-4">
                    <ul class="nav nav-pills mb-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Biodata</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#rekening"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Rekening</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#faktur"
                                type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Faktur</button>
                        </li>
                    </ul>
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">

                                        <input type="hidden" value="{{ $user->email }}" name="old_email">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0">Ubah Biodata</p>
                                                <span class="badge bg-primary ms-auto">User - Active</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if (session('alert') && session('alertType') == 'Danger')
                                                <script>
                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: '{{ Session::get('alert') }}'
                                                    })
                                                </script>
                                            @elseif(session('alert') && session('alertType') == 'Success')
                                                <script>
                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: '{{ Session::get('alert') }}'
                                                    })
                                                </script>
                                            @endif
                                            <p class="text-uppercase text-sm">Informasi Dasar</p>
                                            <form action="{{ route('upload-user-profile', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="username" class="form-control-label">Foto
                                                            Profil</label>
                                                        <input class="form-control" type="file" name="image">
                                                    </div>
                                                    <div class="col-md-6 align-center my-auto">
                                                        <button class="btn btn-outline-secondary    "
                                                            type="submit">upload</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="{{ route('update-user-profile', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="username"
                                                                class="form-control-label">Username</label>
                                                            <input class="form-control hide-readonly" readonly
                                                                type="text" name="name"
                                                                value="{{ $user['name'] }}" id="username">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email" class="form-control-label">Email
                                                            </label>
                                                            <input readonly class="form-control hide-readonly"
                                                                type="email" name="email"
                                                                value="{{ $user['email'] }}" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Nama
                                                                Depan</label>
                                                            <input readonly class="form-control hide-readonly"
                                                                type="text" name="first_name"
                                                                value="{{ $user->profile['first_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Nama
                                                                Belakang</label>
                                                            <input readonly class="form-control hide-readonly"
                                                                type="text" name="last_name"
                                                                value="{{ $user->profile['last_name'] }}">
                                                        </div>
                                                    </div>
                                                    {{-- disini --}}
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-success"
                                                            id="btn-save-changes" style="display: none">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="card-footer d-flex">
                                            <a href="" id="btn-changes" style="display: "
                                                class="mr-2 btn btn-outline-secondary" onclick="update()"
                                                data-bs-toggle="modal" data-bs-target="#">Ubah
                                                Biodata</a>
                                            <a href="" id="btn-cancel" style="display: none"
                                                class="mr-2 btn btn-secondary text-light"
                                                onclick="cancelUpdate()">Cancel</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <img src="{{ asset('image/books/book3.jpg') }}" alt="Image placeholder"
                                            class="card-img-top">
                                        <div class="row justify-content-center">
                                            <div class="col-4 col-lg-4 order-lg-2">
                                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                                    <a href="javascript:;">
                                                        @if ($user->profile->profile_path)
                                                            <img src="{{ asset($user->profile->profile_path) }}"
                                                                class="rounded-circle img-fluid border border-2 border-white">
                                                        @else
                                                            <img src="{{ asset('image/user.png') }}"
                                                                class="rounded-circle img-fluid border border-2 border-white">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                            </div>
                                            <div class="text-center mt-4">
                                                <h5>
                                                    {{ $user->name }}<span class="font-weight-light"></span>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade]" id="rekening" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card w-50">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Informasi Rekening</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">A.N</label>
                                            <input type="text" readonly class="form-control" id=""
                                                value="{{ $user->name }}">
                                        </div>
                                        <div class="">
                                            <label for="" class="form-label">Rekening Pembayaran</label>
                                            <input type="text" readonly class="form-control" id=""
                                                value="{{ $user->accountBank->bank->codename }} - {{ $user->accountBank->account_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#add-rekening">+ akun rekening</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade w-100" id="faktur" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Informasi Transaksi</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Faktur Pembayaran</p>
                                    <div class="container">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Buku</td>
                                                    <td>Harga</td>
                                                    <td>Tanggal Transaksi</td>
                                                    <td>Batas Waktu</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="{{ asset('soft-ui-dashboard-main/img/small-logos/logo-spotify.svg') }}"
                                                                    class="rounded-circle me-2" alt="spotify"
                                                                    style="max-width: 50px">
                                                            </div>
                                                            <div class="my-auto ">
                                                                <h6 class="text-sm mb-0">Spotify</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">4 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">5 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#" class="btn btn-primary">Cetak</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="{{ asset('soft-ui-dashboard-main/img/small-logos/logo-spotify.svg') }}"
                                                                    class="rounded-circle me-2" alt="spotify"
                                                                    style="max-width: 50px">
                                                            </div>
                                                            <div class="my-auto ">
                                                                <h6 class="text-sm mb-0">Spotify</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">4 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">5 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#" class="btn btn-primary">Cetak</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="{{ asset('soft-ui-dashboard-main/img/small-logos/logo-spotify.svg') }}"
                                                                    class="rounded-circle me-2" alt="spotify"
                                                                    style="max-width: 50px">
                                                            </div>
                                                            <div class="my-auto ">
                                                                <h6 class="text-sm mb-0">Spotify</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">4 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">5 July 2023</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#" class="btn btn-primary">Cetak</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function update() {
                var inputs = document.querySelectorAll('input.hide-readonly');
                var buttonSaveChanges = document.getElementById('btn-save-changes');
                var buttonChanges = document.getElementById('btn-changes');
                var buttonCancel = document.getElementById('btn-cancel');

                // Loop through the input elements and remove the readonly attribute
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].removeAttribute("readonly");
                }

                buttonCancel.style.display = 'block'
                buttonChanges.style.display = 'none'
                buttonSaveChanges.style.display = 'block'

            }

            function cancelUpdate() {
                var inputs = document.querySelectorAll('input.hide-readonly');
                var buttonSaveChanges = document.getElementById('btn-save-changes');
                var buttonChanges = document.getElementById('btn-changes');
                var buttonCancel = document.getElementById('btn-cancel');

                // Loop through the input elements and remove the readonly attribute
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].setAttribute("readonly", 'readonly');
                }

                buttonCancel.style.display = 'block'
                buttonChanges.style.display = 'none'
                buttonSaveChanges.style.display = 'block'
            }
        </script>
    </x-slot:content>
</x-base>
