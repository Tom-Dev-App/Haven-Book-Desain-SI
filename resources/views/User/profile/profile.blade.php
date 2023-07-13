<x-base>
    <x-slot:content>
        <x-navbar />
        <section class="profile py-7" id="" style="min-height: 100%">
            <div class="modal fade" id="add-rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Rekening</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('bank-user-profile', $user->id) }}" method="POST">
                            <div class="modal-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="">Bank</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="bank">
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->codename }} -
                                                {{ $bank->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rekening</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="account_number" oninput="formatPrice(event) ">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="container-fluid py-4">
                    <ul class="nav nav-pills mb-5" id="myTab" role="tablist">
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
                    </ul>
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">


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
                                                <input type="hidden" value="{{ $user->email }}" name="old_email">
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
                                                            @if ($user->profile->first_name)
                                                                <input readonly class="form-control hide-readonly"
                                                                    type="text" name="first_name"
                                                                    value="{{ $user->profile['first_name'] }}">
                                                            @else
                                                                <input readonly class="form-control hide-readonly"
                                                                    type="text" name="first_name" value="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-control-label">Nama
                                                                Belakang</label>
                                                            @if ($user->profile->last_name)
                                                                <input readonly class="form-control hide-readonly"
                                                                    type="text" name="last_name"
                                                                    value="{{ $user->profile['last_name'] }}">
                                                            @else
                                                                <input readonly class="form-control hide-readonly"
                                                                    type="text" name="last_name" value="">
                                                            @endif
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
                                            <a href="" id="btn-changes" class="mr-2 btn btn-outline-danger"
                                                onclick="update()" data-bs-toggle="modal" data-bs-target="#">
                                                Ubah Biodata</a>
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
                                                                class="img-fluid">
                                                        @else
                                                            <img src="{{ asset('image/user.png') }}"
                                                                class="img-fluid">
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

                                    <div class="mb-3">
                                        <label for="" class="form-label"><strong>A.N</strong></label>
                                        <input type="text" readonly class="form-control bg-light" id=""
                                            value="{{ $user->name }}">
                                    </div>
                                    @foreach ($userAccounts as $userAccount)
                                        <div class="mb-3">
                                            @if ($userAccount)
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label for="" class="form-label"><b>Rekening
                                                                Pembayaran {{ $loop->iteration }}</b> </label>
                                                        <input type="text" readonly class="form-control bg-light"
                                                            id=""
                                                            value="{{ $userAccount->bank->codename }} - {{ $userAccount->account_number }}">
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                        <a href="{{ route('delete-bank-user-profile', $userAccount->id) }}"
                                                            class="btn-delete-rekening my-3" style="display: none">
                                                            <i class="fa-solid fa-xmark fa-lg"
                                                                style="color: #dc3545;"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <label for="" class="form-label"><strong>Rekening
                                                        Pembayaran</strong></label>
                                                <input type="text" readonly class="form-control" id=""
                                                    value="">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-footer d-flex justify-content-between">
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#add-rekening">+ akun rekening</button>
                                    @if (!$userAccounts->isEmpty())
                                        <a href="#" class="btn btn-danger" id="btn-edit-rekening"
                                            onclick="deleteRekening(event)">Hapus rekening</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <script>
            function formatPrice(event) {
                // Mengambil nilai input
                var value = event.target.value;

                // Menghapus semua karakter non-digit
                var formattedValue = value.replace(/\D/g, '');

                // // Memisahkan nilai menjadi bagian pecahan dan desimal
                var fraction = formattedValue.slice(0, -3); // Bagian pecahan
                var decimal = formattedValue.slice(-3); // Bagian desimal

                // Menggabungkan bagian pecahan dan desimal dengan tanda titik sebagai pemisah ribuan
                var formattedPrice = fraction.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1') + '' + decimal;

                // Mengatur nilai input dengan format harga
                event.target.value = formattedPrice;
            }

            var counterDeleteRekening = 1;

            function deleteRekening(event) {
                // mengambil button edit
                var btnDelete = document.querySelectorAll(".btn-delete-rekening");

                counterDeleteRekening += 1;
                for (var i = 0; i < btnDelete.length; i++) {

                    if (counterDeleteRekening % 2 === 0) {

                        btnDelete[i].style.display = 'block';
                    } else {

                        btnDelete[i].style.display = 'none';
                    }
                }


            }

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
