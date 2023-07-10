<x-base>
    <x-slot:content>
        <x-navbar></x-navbar>
        <section class="banner-main py-7" id="banner">
        <div class="container py-4">
            <h1 class="display-6">Rents Payment</h1>

            <form action="{{ route('pay-rent') }}" method="POST" enctype="multipart/form-data">
                @csrf

            {{-- Data pembayaran user --}}
            <div class="row mb-6">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">
                            Data Pembayaran
                        </h5>
                        <div class="card-body">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly value="{{ auth()->user()->name }}">
                              </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" readonly value="{{ auth()->user()->email }}">
                              </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Lama sewa</span>
                                <input type="number" class="form-control @error('number_of_month') is-invalid @enderror" placeholder="Berapa bulan" aria-label="number" aria-describedby="basic-addon1" min="1" value="1" id="lamaSewa" name="number_of_month" required>
                                @error('number_of_month')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              
                              <div>
                                <label for="">Rekening Bank Saya</label>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <select class="form-select @error('customer_bank_account_id') is-invalid @enderror" id="inputGroupSelect01" name="customer_bank_account_id">
                                    <option value="{{ $userAccounts->first()->id }}" selected>{{ $userAccounts->first()->bank->codename }} - {{ $userAccounts->first()->account_number }}</option>
                                    @foreach ($userAccounts->skip(1) as $account)
                                      <option value="{{ $account->id }}">{{ $account->bank->codename }} - {{ $account->account_number }}</option>
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
                                <select class="form-select @error('company_bank_account_id') is-invalid @enderror" id="inputGroupSelect01" name="company_bank_account_id">
                                <option value="{{ $companyAccounts->first()->id }}" selected>{{ $companyAccounts->first()->bank->codename }} - {{ $companyAccounts->first()->account_number }}</option>
                                @foreach ($companyAccounts->skip(1) as $account)
                                <option value="{{ $account->id }}">{{ $account->bank->codename }} - {{ $account->account_number }}</option>
                                @endforeach
                                </select>
                                @error('company_bank_account_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="formFile" class="form-label @error('image_proof') is-invalid @enderror">Bukti transfer</label>
                                <input class="form-control form-control-sm" type="file" id="formFile" name="image_proof">
                                @error('image_proof')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                                <button type="submit" class="btn btn-primary col-5 d-flex mx-auto justify-content-center">Bayar</button>
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
                                @if (($book && File::exists(public_path($book->image))))
                                <img src="{{ storage::url($book->image) }}" alt="Book Image" class="card-img-top rounded">
                                @else
                                    <div class="d-flex bg-secondary justify-content-center align-items-center rounded" style="height: 300px">
                                        <span class="text-center text-light">No Image Available</span>
                                    </div>
                                @endif
                            </div>
                            
                            <input type="text" class="d-none" value="{{ $book->id }}" name="book_id">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Judul</span>
                                <input type="text" class="form-control" placeholder="Judul" aria-label="title" aria-describedby="basic-addon1" readonly value="{{ $book->title }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Author</span>
                                <input type="text" class="form-control" placeholder="Author" aria-label="author" aria-describedby="basic-addon1" readonly value="{{ $book->author }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Publisher</span>
                                <input type="text" class="form-control" placeholder="Publisher" aria-label="publisher" aria-describedby="basic-addon1" readonly value="{{ $book->publisher }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Harga</span>
                                <input type="text" class="form-control" placeholder="harga" aria-label="pricetag" aria-describedby="basic-addon1" value="{{ $book->price }}" readonly id="harga" name="pricetag">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="basic-addon1">Total bayar</span>
                                <input type="text" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1" id="hargaTotal" readonly name="total_price">
                                @error('total_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            </form>
            {{-- End Data pembayaran user --}}
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
        @push('scripts')
        <script>
        function calculateTotal() {
        const harga = document.getElementById('harga');
        const hargaTotal = document.getElementById('hargaTotal');
        const lamaSewa = document.getElementById('lamaSewa');

        const total = parseInt(harga.value) * parseInt(lamaSewa.value);
        hargaTotal.value = isNaN(total) ? 0 : total;
        }

        document.addEventListener('DOMContentLoaded', function() {
        calculateTotal();
        });

        const lamaSewa = document.getElementById('lamaSewa');
        lamaSewa.addEventListener('keyup', calculateTotal);

        </script>
        @endpush
        </section>
    </x-slot>
</x-base>