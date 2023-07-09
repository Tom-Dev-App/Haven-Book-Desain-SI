<x-base>
    <x-slot:content>
        <x-navbar />
        <section class="banner-main py-7" id="banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="header">
                            <p class="lead">Kategori</p>
                            <hr class="my-0">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach ($books as $book)
                                <div class="col-md-2 my-3 d-flex justify-content-center border-0">
                                    <div class="card w-100" style="width: 18rem;">
                                        @if ($book->image)
                                            <img src="{{ asset($book->image) }}" class="card-img-top" alt="...">
                                        @else
                                            <img src="{{ asset('image/error.png') }}" class="card-img-top"
                                                alt="...">
                                        @endif
                                        <div class="card-img-overlay">
                                            <span class="badge badge-pill badge-lg bg-dark">
                                                Rp {{ $book->price }}
                                            </span>
                                        </div>
                                        <div class="card-body">
                                        </div>
                                        <div class="card-footer bg-white py-3">
                                            <h5 class="card-title"><strong>{{ $book->title }}</strong></h5>
                                            <p class="card-text">{{ $book->author }}</p>
                                            <a href="{{ route('book-detail', $book->slug) }}"
                                                class="btn btn-danger text-light">
                                                Preview
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-slot:content>
</x-base>
