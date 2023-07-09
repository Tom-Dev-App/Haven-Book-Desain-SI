<x-base>
    <x-slot:content>
        <x-navbar />
        <section class="profile py-7" id="" style="min-height: 100%">
            <div class="container">
                {{-- <div class="card shadow-lg mx-4 card-profile-bottom">
                    <div class="card-body p-3">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class=" position-relative">
                                    <img src="{{ asset('argon-dashboard-master/img/team-1.jpg') }}" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm rounded img-thumbnail"
                                        style="width: 74px; height: 74px">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        Sayo Kravits
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        Public Relations
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="container-fluid py-4">
                    <ul class="nav nav-pills mb-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Biodata</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Transaksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#faktur"
                                type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Faktur</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <form action="{{ route('update-user-profile', $user->id) }}" method="POST">
                                            @csrf
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
                                                </div>

                                            </div>
                                            <div class="card-footer d-flex">
                                                <a href="" id="btn-changes" style="display: "
                                                    class="mr-2 btn btn-warning text-light" onclick="update()"
                                                    data-bs-toggle="modal" data-bs-target="#">Ubah
                                                    Biodata</a>
                                                <a href="" id="btn-cancel" style="display: none"
                                                    class="mr-2 btn btn-secondary text-light"
                                                    onclick="cancelUpdate()">Cancel</a>
                                                <button type="submit" class="btn btn-success" id="btn-save-changes"
                                                    style="display: none">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true" style="min-width: 80vw">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="username"
                                                                    class="form-control-label">Username</label>
                                                                <input class="form-control " readonly type="text"
                                                                    value="{{ $user['name'] }}" id="username">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email" class="form-control-label">Email
                                                                </label>
                                                                <input readonly class="form-control" type="email"
                                                                    value="{{ $user['email'] }}" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Nama
                                                                    Depan</label>
                                                                <input readonly class="form-control" type="text"
                                                                    value="{{ $user['first_name'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="" class="form-control-label">Nama
                                                                    Belakang</label>
                                                                <input readonly class="form-control" type="text"
                                                                    value="{{ $user['last_name'] }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
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
                                                        <img src="{{ asset('argon-dashboard-master/img/team-2.jpg') }}"
                                                            class="rounded-circle img-fluid border border-2 border-white">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="d-grid text-center">
                                                            <span class="text-lg font-weight-bolder">22</span>
                                                            <span class="text-sm opacity-8">Books</span>
                                                        </div>
                                                        <div class="d-grid text-center">
                                                            <span class="text-lg font-weight-bolder">89</span>
                                                            <span class="text-sm opacity-8">Comments</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <h5>
                                                    Mark Davis<span class="font-weight-light">, 35</span>
                                                </h5>
                                                <div class="h6 font-weight-300">
                                                    <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                                </div>
                                                <div class="h6 mt-4">
                                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager -
                                                    Creative
                                                    Tim Officer
                                                </div>
                                                <div>
                                                    <i class="ni education_hat mr-2"></i>University of Computer Science
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="payment" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Informasi Transaksi</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Tagihan</p>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Segera lunasi tagihan anda!
                                    </div>
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
                                                        <a href="#" class="btn btn-danger">Bayar</a>
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
                                                        <a href="#" class="btn btn-danger">Bayar</a>
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
                                                        <a href="#" class="btn btn-danger">Bayar</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="faktur" role="tabpanel" aria-labelledby="contact-tab">
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
                                                        <a href="#" class="btn btn-primary">Baca</a>
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
                                                        <a href="#" class="btn btn-primary">Baca</a>
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
                                                        <a href="#" class="btn btn-primary">Baca</a>
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
