<x-base>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>

    <x-slot:content>
        <x-navbar />
        <section class="profile py-7" id="" style="min-height: 100%">
            <div class="container">
                @if (Session::has('success'))
                    <script>
                        Toast.fire({
                            icon: 'success',
                            title: '{{ Session::get('success') }}'
                        })
                    </script>
                @endif

                <div class="container-fluid py-4">
                    <ul class="nav nav-pills mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#payment" type="button" role="tab" aria-controls="profile"
                                aria-selected="true">Transaksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#faktur"
                                type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Faktur</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#activation"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Activation
                                Keys</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="payment" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="card  border-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 ">Riwayat Transaksi</p>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        @if ($transactions->isEmpty())
                                            <div class="alert alert-primary m-3 text-center" role="alert">
                                                Belum ada transaksi
                                            </div>
                                        @endif
                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr class="">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="p-3">
                                                        <div>
                                                            <img src="{{ Storage::url($transaction->book->image) }}"
                                                                class="me-2 img-thumbnail" style="max-width: 100px">
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="my-auto ">
                                                            <h5 class=" mb-0">
                                                                {{ $transaction->book->title }}</h5>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-sm mb-0">
                                                            {{ $transaction->transaction_number }}</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">
                                                            {{ $transaction->created_at->diffForHumans() }}
                                                        </p>
                                                        <p>
                                                            <span class="text-sm">{{ $transaction->created_at }}
                                                            </span>
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class=" mb-0">
                                                            Rp
                                                            {{ number_format($transaction->rent_prices, 0, ',', '.') }},-
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($transaction->status->name == 'PENDING')
                                                            <span
                                                                class="badge bg-warning">{{ $transaction->status->name }}</span>
                                                        @elseif($transaction->status->name == 'SUCCESS')
                                                            <span class="badge bg-success text-light">
                                                                {{ $transaction->status->name }}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger">
                                                                {{ $transaction->status->name }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Transaksi --}}
                        <div class="tab-pane fade" id="faktur" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Informasi Faktur Pembayaran</p>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="container">
                                        <table class="table table-hover ">
                                            <tbody>
                                                @if ($transactions->isEmpty())
                                                    <div class="alert alert-primary m-3 text-center" role="alert">
                                                        Belum ada transaksi
                                                    </div>
                                                @endif
                                                @foreach ($transactions as $transaction)
                                                    @if (!$transaction->invoice->isEmpty())
                                                        <tr>
                                                            <td class="p-3 d-flex justify-content-center">
                                                                <img src="{{ Storage::url($transaction->book->image) }}"
                                                                    class="img-thumbnail me-2" alt="spotify"
                                                                    style="max-width: 100px">
                                                            </td>
                                                            <td class="align-middle">
                                                                <h6 class="text-sm mb-0">
                                                                    {{ $transaction->book->title }}</h6>
                                                            </td>
                                                            <td class="align-middle">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    Rp
                                                                    {{ number_format($transaction->rent_prices, 0, ',', '.') }}
                                                                </p>
                                                            </td>
                                                            <td class="align-middle">
                                                                <p class=" mb-0">Tanggal Pembayaran
                                                                    : {{ $transaction->created_at }}</p>
                                                            </td>
                                                            <td class="align-middle">
                                                                <p class=" mb-0">Peminjaman :
                                                                    {{ $transaction->months }} bulan</p>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a href="{{ route('print-notif', $transaction->invoice[0]->invoice_number) }}"
                                                                    class="btn btn-sm btn-secondary">Print
                                                                    Invoice</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END Informasi Transaksi --}}


                        {{-- Activation Keys --}}
                        <div class="tab-pane fade" id="activation" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Kunci Aktivasi</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Kunci Aktivasi Buku</p>
                                    <div class="container">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Buku</td>
                                                    <td>Status pakai</td>
                                                    <td>Batas Waktu</td>
                                                    <td>Keys</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rents as $rent)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div>
                                                                    <img src="{{ Storage::url($rent->book->image) }}"
                                                                        class="me-2" alt="..."
                                                                        style="max-width: 50px">
                                                                </div>
                                                                <div class="my-auto ">
                                                                    <h6 class="text-sm mb-0">{{ $rent->book->title }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($rent->is_used)
                                                                <span class="badge bg-info">Terpakai</span>
                                                            @else
                                                                <span class="badge bg-success">Belum dipakai</span>
                                                            @endif

                                                        </td>
                                                        <td class="align-middle">
                                                            <p class=" mb-0">{{ $rent->due_date }}</p>

                                                        </td>
                                                        <td class="align-middle">
                                                            <p class=" mb-0">{{ $rent->keys }}</p>
                                                        </td>
                                                        <td class="align-middle">
                                                            <button class="btn btn-outline-secondary copy-to-clipboard"
                                                                data-book-keys="{{ $rent->keys }}">
                                                                <i class="fa-solid fa-copy"></i> Copy
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END Informasi Transaksi --}}
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
        <script defer>
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('.copy-to-clipboard'); // Replace with your button class

                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var keys = button.getAttribute('data-book-keys');
                        copyToClipboard(keys);
                    });
                });

                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text)
                        .then(function() {
                            alert('Keys copied to clipboard!');
                        })
                        .catch(function(error) {
                            console.error('Failed to copy keys to clipboard:', error);
                        });
                }
            });
        </script>
    </x-slot:content>
</x-base>
