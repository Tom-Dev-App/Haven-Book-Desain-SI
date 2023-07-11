    <x-base>
        <x-slot:content>
            <x-navbar></x-navbar>
            <section class="banner-main py-7" id="banner" style="min-height: 100vh">
                <div class="container py-4">
                    <h1 class="display mb-5"><strong>Rents Payment</strong></h1>

                    <form action="{{ route('pay-rent', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Data pembayaran user --}}
                        <div class="card p-0 border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- input type hidden --}}
                                        <input type="hidden" id="harga-buku" name="pricetag"
                                            value="{{ $book->price }}">
                                        <input type="hidden" id="hargaTotal2" name="total_price" value=""
                                            readonly>

                                        <div class="mb-3">
                                            <label for="" class="form-label"><strong>Username</strong></label>
                                            <input type="text" name="username" readonly class="bg-light form-control"
                                                id="" aria-describedby="emailHelp"
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label"><strong>Email
                                                    address</strong></label>
                                            <input type="email" name="email" class="form-control bg-light" readonly
                                                id="" aria-describedby="emailHelp"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        <p class="my-0">Pilih sumber dana</p>
                                                    </label>
                                                    <select @error('customer_bank_account_id') is-invalid @enderror"
                                                        class="form-select form-select-sm"
                                                        name="customer_bank_account_id"
                                                        aria-label=".form-select-sm example">
                                                        <option value="{{ $userAccounts->first()->id }}" selected>
                                                            {{ $userAccounts->first()->bank->codename }} -
                                                            {{ $userAccounts->first()->account_number }}</option>
                                                        @foreach ($userAccounts->skip(1) as $account)
                                                            <option value="{{ $account->id }}">
                                                                {{ $account->bank->codename }} -
                                                                {{ $account->account_number }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">
                                                        <p class="my-0">Pilih rekening tujuan</p>
                                                    </label>
                                                    <select @error('customer_bank_account_id') is-invalid @enderror"
                                                        class="form-select form-select-sm @error('company_bank_account_id') is-invalid @enderror"
                                                        name="company_bank_account_id"
                                                        aria-label=".form-select-sm example">
                                                        <option value="{{ $companyAccounts->first()->id }}" selected>
                                                            {{ $companyAccounts->first()->bank->codename }} -
                                                            {{ $companyAccounts->first()->account_number }}</option>
                                                        @foreach ($companyAccounts->skip(1) as $account)
                                                            <option value="{{ $account->id }}">
                                                                {{ $account->bank->codename }}
                                                                -
                                                                {{ $account->account_number }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('company_bank_account_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label"><small>Durasi
                                                        peminjaman</small></label>
                                                <input type="text"
                                                    class="form-control @error('number_of_month') is-invalid @enderror"
                                                    id="lamaSewa" oninput="formatPrice(event)"
                                                    aria-describedby="durasi-help" name="number_of_month" required>
                                                <div id="durasi-help" class="form-text"></div>
                                                @error('number_of_month')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile"
                                                class="form-label @error('image_proof') is-invalid @enderror"><strong>Upload
                                                    bukti
                                                    pembayaran</strong></label>
                                            <input class="form-control" type="file" id="formFile"
                                                name="image_proof">
                                            @error('image_proof')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr class="my-5">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="h6">Harga Buku</p>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <p class="h6">Rp {{ number_format($book->price, 0, ',', '.') }},-
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="h6">Durasi sewa </p>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <p class="h6" id="cetak-durasi-sewa"></p>
                                            </div>
                                        </div>
                                        <hr class="my-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="h6">Total Pembayaran</p>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <p class="h6" id="hargaTotal">Rp ....</p>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-danger w-100 mt-5 d-flex mx-auto justify-content-center">Kirim</button>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7">
                                        <div class="p-3 img w-100 d-flex justify-content-center">
                                            @if ($book->image)
                                                <img src="{{ Storage::url($book->image) }}" alt="Book Image"
                                                    class="card-img-top rounded img-thumbnail w-75">
                                            @else
                                                <div class="d-flex bg-secondary justify-content-center align-items-center rounded"
                                                    style="height: 300px">
                                                    <span class="text-center text-light">No Image Available</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="fw-bold card-title mb-3 mt-5">
                                                {{ $book->title }}
                                            </h5>
                                            <i class="card-text">{{ Str::substr($book->synopsis, 1, 400) . '...' }}
                                            </i>
                                            <p class="card-text mt-5"><small
                                                    class="text-muted">{{ $book->author }}</small>
                                            </p>
                                            <p class="card-text mt-2"><small
                                                    class="text-muted">{{ $book->publisher }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- <form class="mt-5" action="{{ route('pay-rent') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-6">
                            <div class="col-md-6">
                                <div class="card">
                                    <h5 class="card-header">
                                        Data Pembayaran
                                    </h5>
                                    <div class="card-body">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Username</span>
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username" aria-describedby="basic-addon1" readonly
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                            <input type="email" class="form-control" placeholder="Email"
                                                aria-label="email" aria-describedby="basic-addon1" readonly
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Lama sewa</span>
                                            <input type="number"
                                                class="form-control @error('number_of_month') is-invalid @enderror"
                                                placeholder="Berapa bulan" aria-label="number"
                                                aria-describedby="basic-addon1" min="1" value="1"
                                                id="" name="" required>
                                            @error('number_of_month')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="">Rekening Bank Saya</label>
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <select
                                                class="form-select @error('customer_bank_account_id') is-invalid @enderror"
                                                id="inputGroupSelect01" name="customer_bank_account_id">
                                                <option value="{{ $userAccounts->first()->id }}" selected>
                                                    {{ $userAccounts->first()->bank->codename }} -
                                                    {{ $userAccounts->first()->account_number }}</option>
                                                @foreach ($userAccounts->skip(1) as $account)
                                                    <option value="{{ $account->id }}">
                                                        {{ $account->bank->codename }} -
                                                        {{ $account->account_number }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_bank_account_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="">Rekening Bank Tujuan</label>
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <select
                                                class="form-select @error('company_bank_account_id') is-invalid @enderror"
                                                id="inputGroupSelect01" name="company_bank_account_id">
                                                <option value="{{ $companyAccounts->first()->id }}" selected>
                                                    {{ $companyAccounts->first()->bank->codename }} -
                                                    {{ $companyAccounts->first()->account_number }}</option>
                                                @foreach ($companyAccounts->skip(1) as $account)
                                                    <option value="{{ $account->id }}">
                                                        {{ $account->bank->codename }} -
                                                        {{ $account->account_number }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_bank_account_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile"
                                                class="form-label @error('image_proof') is-invalid @enderror">Bukti
                                                transfer</label>
                                            <input class="form-control form-control-sm" type="file" id="formFile"
                                                name="image_proof">
                                            @error('image_proof')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary col-5 d-flex mx-auto justify-content-center">Bayar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <h5 class="card-header">
                                        Detail Buku
                                    </h5>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            @if ($book && File::exists('storage/' . $book->image))
                                                <img src="{{ Storage::url($book->image) }}" alt="Book Image"
                                                    class="card-img-top rounded img-thumbnail w-50">
                                          
                                            @else
                                                <div class="d-flex bg-secondary justify-content-center align-items-center rounded"
                                                    style="height: 300px">
                                                    <span class="text-center text-light">No Image Available</span>
                                                </div>
                                            @endif
                                        </div>

                                        <input type="text" class="d-none" value="{{ $book->id }}"
                                            name="book_id">
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Judul</span>
                                            <input type="text" class="form-control" placeholder="Judul"
                                                aria-label="title" aria-describedby="basic-addon1" readonly
                                                value="{{ $book->title }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Author</span>
                                            <input type="text" class="form-control" placeholder="Author"
                                                aria-label="author" aria-describedby="basic-addon1" readonly
                                                value="{{ $book->author }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Publisher</span>
                                            <input type="text" class="form-control" placeholder="Publisher"
                                                aria-label="publisher" aria-describedby="basic-addon1" readonly
                                                value="{{ $book->publisher }}">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Harga</span>
                                            <input type="text" class="form-control" placeholder="harga"
                                                aria-label="pricetag" aria-describedby="basic-addon1"
                                                value="{{ $book->price }}" readonly id="harga" name="pricetag">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="basic-addon1">Total bayar</span>
                                            <input type="text" class="form-control" placeholder="price"
                                                aria-label="price" aria-describedby="basic-addon1" id=""
                                                readonly name="total_price" value="">
                                            @error('total_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> --}}

                </div>
                @push('scripts')
                    <script>
                        function formatPrice(event) {
                            // Mengambil nilai input
                            var value = event.target.value;

                            // Menghapus semua karakter non-digit
                            var formattedValue = value.replace(/\D/g, '');

                            // Memisahkan nilai menjadi bagian pecahan dan desimal
                            var fraction = formattedValue.slice(0, -3); // Bagian pecahan
                            var decimal = formattedValue.slice(-3); // Bagian desimal

                            // Menggabungkan bagian pecahan dan desimal dengan tanda titik sebagai pemisah ribuan
                            var formattedPrice = fraction.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '' + decimal;

                            // Mengatur nilai input dengan format harga
                            event.target.value = formattedPrice;
                        }

                        function updateTotalHarga() {
                            // Mendapatkan input harga dan kuantitas
                            var harga = parseFloat(document.getElementById("harga-buku").value);
                            var kuantitas = parseInt(document.getElementById("lamaSewa").value);
                            var durasiSewa = document.getElementById("cetak-durasi-sewa");
                            var hargaTotal = document.getElementById("hargaTotal");
                            var hargaTotal2 = document.getElementById("hargaTotal2");

                            // Menghitung total harga
                            var totalHarga = harga * kuantitas;

                            // Mengubah teks di tag <p> menjadi "Total Harga: [total harga]"
                            durasiSewa.textContent = kuantitas + " bulan";
                            hargaTotal.textContent = "Rp " + totalHarga;
                            hargaTotal2.value = totalHarga;
                            // hargaTotal.textContent = "NaN" ? 0 : totalHarga
                        }

                        // function calculateTotal() {
                        //     const harga = document.getElementById('harga');
                        //     const hargaTotal = document.getElementById('hargaTotal');
                        //     const lamaSewa = document.getElementById('lamaSewa');

                        //     const total = parseInt(harga.value) * parseInt(lamaSewa.value);
                        //     hargaTotal.value = isNaN(total) ? 0 : total;
                        // }

                        // document.addEventListener('DOMContentLoaded', function() {
                        //     updateTotalHarga();
                        // });

                        const lamaSewa = document.getElementById('lamaSewa');
                        lamaSewa.addEventListener('keyup', updateTotalHarga);
                    </script>
                @endpush
            </section>
            </x-slot>
    </x-base>
