<x-base>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>
    <x-slot:content>
        <x-navbar />
        <section class="detail-buku py-7" style="min-height: 100%">
            <div class="container">
                <div class="row" style="margin-top: 30px;margin-bottom: 0px">
                    <div class="col-md-4">
                        @if ($book->image)
                            <img src="{{ Storage::url($book->image) }}" class="card-img-top w-100 m-3 rounded"
                                alt="...">
                        @else
                            <img src="{{ asset('image/error.png') }}" class="card-img-top w-100 m-3 rounded"
                                alt="...">
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
                                <div class=" d-flex flex-row justify-content-center">
                                    <a class="btn btn-lg btn-danger text-light d-flex align-items-center"
                                        href="{{ route('pay', $book->slug) }}">
                                        Sewa Buku<i class="ti-check mr-2 ml-2"></i>Rp
                                        {{ number_format($book->price, 0, ',', '.') }},-
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:content>
</x-base>
