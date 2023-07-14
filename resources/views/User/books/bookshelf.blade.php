  @php
      use Illuminate\Support\Str;
  @endphp
  <x-base>
      <x-slot:title>{{ $title ?? '' }}</x-slot:title>
      <x-slot:content>
          <x-navbar />
          <section class="profile py-7" id="" style="min-height: 100%">
              <div class="container mt-3 d-flex justify-content-center">
                  @if ($books->isEmpty())
                      <div class="d-flex justify-content-center mt-5">
                          <span class="text-center">You don't have any rents yet.</span>
                      </div>
                  @else
                      <div class="row p-5" style="margin-top: 30px">
                          @foreach ($books as $book)
                              <div class="row" style="margin-bottom: 200px">
                                  <div class="col-md-4">
                                      @if ($book->image)
                                          <img src="{{ Storage::url($book->image) }}"
                                              class="card-img-top w-100 m-3 rounded" alt="...">
                                      @else
                                          <img src="{{ asset('image/error.png') }}"
                                              class="card-img-top w-100 m-3 rounded" alt="...">
                                      @endif
                                  </div>
                                  <div class="col-md-8 ">
                                      <div class="p-3">
                                          <div class="card-header ">
                                              <div class="row w-100 d-flex justify-content-center ">
                                                  <div class="col-md-8 d-flex justify-content-center text-center">
                                                      <p class="mb-0 fs-2">{{ $book->title }}</p>
                                                  </div>

                                              </div>
                                          </div>
                                          <div class="card-body p-5">
                                              <i class="">
                                                  {{ $book->synopsis }}
                                              </i>
                                              <hr class="horizontal gray-light my-4">
                                              <p class="fs-6">
                                                  {{ $book->description }}
                                              </p>
                                          </div>
                                          <div class="card-footer d-flex justify-content-between py-3">
                                              <div class="date d-flex flex-column justify-content-center">
                                                  <i class="text-sm">Written by ~{{ $book->author }}</i>
                                                  <p class="fw-bolder text-sm">Published by {{ $book->publisher }}</p>
                                              </div>
                                              <div class="">
                                                  <a class="btn btn-lg btn-danger text-light d-flex align-items-center"
                                                      href="{{ route('read', $book->slug) }}">
                                                      Baca Buku
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              {{-- <div class="col-md-12">
                                  <a href="{{ route('read', $book->slug) }}" class="text-decoration-none">
                                      <div class="card mb-3" style="max-width: 540px;">
                                          <div class="row g-0">
                                              <div class="col-md-4">
                                                  <img src="{{ Storage::url($book->image) }}"
                                                      class="img-fluid rounded-start" alt="...">
                                              </div>
                                              <div class="col-md-8">
                                                  <div class="card-body">
                                                      <h5 class="card-title">{{ $book->title }}</h5>
                                                      <p class="card-text">
                                                          {{ Str::limit($book->synopsis, $limit = 255, $end = '...') }}
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </a>
                              </div> --}}
                          @endforeach
                      </div>
                  @endif
              </div>
          </section>
          </x-slot>
  </x-base>
