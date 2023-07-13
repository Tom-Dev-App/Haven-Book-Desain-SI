<x-base>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>

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
                                type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Activation Keys</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="payment" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="card  border-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 fw-bold ">Riwayat Transaksi</p>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Cover</td>
                                                <td>Judul</td>
                                                <td>Nomor Transaksi</td>
                                                <td>Tanggal Transaksi</td>
                                                <td>Harga</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
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
                                                            <h6 class="text-sm mb-0">
                                                                {{ $transaction->book->title }}</h6>
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
                                                            <span class="badge bg-warning">{{ $transaction->status->name }}</span>
                                                        @elseif($transaction->status->name == 'SUCCESS')
                                                             <span class="badge bg-success"> 
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
                                                @foreach($rents as $rent)
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="{{ Storage::url($rent->book->image) }}"
                                                                    class="me-2" alt="..."
                                                                    style="max-width: 50px">
                                                            </div>
                                                            <div class="my-auto ">
                                                                <h6 class="text-sm mb-0">{{ $rent->book->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if($rent->is_used)
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
                                                        <button class="btn btn-outline-secondary copy-to-clipboard" data-book-keys="{{ $rent->keys }}">
                                                            <i class="fa-solid fa-copy"  ></i> Copy
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
