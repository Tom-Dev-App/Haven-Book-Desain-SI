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
                          <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#payment"
                              type="button" role="tab" aria-controls="profile"
                              aria-selected="true">Transaksi</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link " id="contact-tab" data-bs-toggle="tab" data-bs-target="#faktur"
                              type="button" role="tab" aria-controls="contact"
                              aria-selected="false">Faktur</button>
                      </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade " id="payment" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="card">
                              <div class="card-header">
                                  <div class="d-flex align-items-center">
                                      <p class="mb-0">Informasi Transaksi</p>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <p class="text-uppercase text-sm">Histori Transaksi</p>
                                  {{-- <div class="alert alert-danger text-center" role="alert">
                                      Segera lunasi tagihan anda!
                                  </div> --}}
                                  <div class="container">
                                      <table class="table table-hover ">
                                          <thead>
                                              <tr>
                                                  <td>#</td>
                                                  <td>Buku</td>
                                                  <td>Nomor Transaksi</td>
                                                  <td>Tanggal Transaksi</td>
                                                  <td>Harga</td>
                                                  <td>Status</td>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($transactions as $transaction)
                                              <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>
                                                      <div class="d-flex">
                                                          <div>
                                                              <img src="{{ Storage::url($transaction->book->image) }}"
                                                                  class="rounded-circle me-2"
                                                                  style="max-width: 50px">
                                                          </div>
                                                          <div class="my-auto ">
                                                              <h6 class="text-sm mb-0">{{ $transaction->book->title }}</h6>
                                                          </div>
                                                      </div>
                                                  </td>
                                                  <td class="align-middle">
                                                      <p class="text-sm font-weight-bold mb-0">{{ $transaction->transaction_number }}</p>
                                                  </td>
                                                  <td class="align-middle">
                                                      <p class=" mb-0">{{ $transaction->created_at->diffForHumans() }}</p>
                                                  </td>
                                                  <td class="align-middle">
                                                      <p class=" mb-0">{{ $transaction->rent_prices }}</p>
                                                  </td>
                                                  <td class="align-middle">
                                                    @if($transaction->status->name == 'PENDING')
                                                    <span class="bg-warning px-2 py-1 rounded">
                                                      {{ $transaction->status->name }}
                                                    </span>
                                                    @elseif($transaction->status->name == 'SUCCESS')
                                                    <span class="bg-success px-2 py-1 rounded">
                                                      {{ $transaction->status->name }}
                                                    </span>
                                                    @else
                                                    <span class="bg-danger px-2 py-1 rounded">
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