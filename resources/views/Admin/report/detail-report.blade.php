<x-base-admin title="Detail Report">

    <x-slot:content>

        <x-sidebar-admin />
        <div class="main-content position-relative bg-gray-100" style="min-height: 100vh">
            <x-navbar-admin />
            <div class="container-fluid py-4" style="min-height: 100%">
                <h1 class="display-6">Detail Invoice</h1>
                <a href="{{ route('print-report', $invoice->invoice_number) }}" class="btn bg-gradient-dark mt-5">
                    Cetak invoice
                </a>
                <div class="row mt-3">
                    <div class="col-md-6">

                        <div class="card h-100">
                            <h5 class="card-header d-flex flex-row justify-content-between">
                                Data User
                            </h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nomor Kwitansi</label>
                                    <input readonly type="text" readonly class="form-control" id=""
                                        aria-describedby="emailHelp" value="{{ $invoice->invoice_number }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Atas nama</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Rekening User</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->customerBank->bank->codename }} - {{ $invoice->transaction->customerBank->account_number }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Pembayaran</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->created_at }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <h5 class="card-header">
                                Data Buku
                            </h5>
                            <div class="card-body">
                                <img src="{{ Storage::url($invoice->transaction->book->image) }}"
                                    class="img-thumbnail mx-3 my-3" alt="asdasd" width="150px">
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul Buku</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->book->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Author</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->book->author }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Publisher</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="{{ $invoice->transaction->book->publisher }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input readonly type="text" class="form-control" id=""
                                        value="Rp {{ number_format($invoice->transaction->book->price) }}">
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
