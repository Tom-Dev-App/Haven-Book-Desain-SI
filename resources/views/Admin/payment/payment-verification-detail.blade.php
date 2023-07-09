<x-base-admin title="Payment Verification">
    <x-slot:content>
        <x-sidebar-admin />
        <main class="main-content position-relative  max-height-vh-100 h-100">
            <x-navbar-admin />
            <div class="container-fluid py-4">
                <h1 class="display-6">Payment Verification</h1>

                {{-- Data Company --}}
                <div class="row mt-5 mb-5">
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">
                                Data Pembayaran
                            </h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">A.N</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="{{ $transaction->companyBank->user->name }}">
                                </div>
                                <div class="">
                                    <label for="" class="form-label">Rekening Pembayaran</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="{{ $transaction->companyBank->bank->codename }} - {{ $transaction->companyBank->account_number }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                @if ($transaction->status->name == 'PENDING')
                                    <a
                                        href="{{ route('accept-payment', $transaction->transaction_number) }}"class="btn btn-success mt-3 w-100">Acc
                                        Pembayaran</a>
                                    <a href="{{ route('reject-payment', $transaction->transaction_number) }}"
                                        class="btn btn-danger w-100">Reject
                                        Pembayaran</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                {{-- End Data Company --}}

                {{-- Data pembayaran user --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h5 class="card-header d-flex flex-row justify-content-between">
                                Data User
                                @if ($transaction->status->name == 'PENDING')
                                    <span class="badge bg-gradient-warning">
                                        {{ $transaction->status->name }}
                                    </span>
                                @elseif($transaction->status->name == 'SUCCESS')
                                    <span class="badge bg-gradient-success">
                                        {{ $transaction->status->name }}
                                    </span>
                                @else
                                    <span class="badge bg-gradient-danger">
                                        {{ $transaction->status->name }}ED
                                    </span>
                                @endif
                            </h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Nomor Transaksi</label>
                                            <input readonly type="text" readonly class="form-control" id=""
                                                aria-describedby="emailHelp"
                                                value="{{ $transaction->transaction_number }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="form-label mx-3">Bukti Transfer</label>
                                            @if ($transaction->payment_proof)
                                                <img src="{{ asset($transaction->payment_proof) }}" alt=""
                                                    class="img-thumbnail" width="70px">
                                            @else
                                                <img src="{{ asset('image/error.png') }}" alt=""
                                                    class="img-thumbnail" width="70px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->customerBank->user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->customerBank->user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">A.N</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->customerBank->user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Rekening User</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->customerBank->bank->codename }} - {{ $transaction->customerBank->account_number }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal sewa</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->created_at }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h5 class="card-header">
                                Data Buku
                            </h5>
                            <div class="card-body">
                                <img src="{{ asset($transaction->book->image) }}" class="img-thumbnail mx-3 my-3"
                                    alt="asdasd" width="150px">
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul Buku</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->book->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Author</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->book->author }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Publisher</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $transaction->book->publisher }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="Rp {{ number_format($transaction->book->price, 2, ',', '.') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        </main>
    </x-slot:content>
</x-base-admin>
