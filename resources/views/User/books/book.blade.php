<x-base>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>
    <x-slot:content>
        <x-navbar />
        <section class="banner-main py-7" id="banner">
            <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-md-4 my-3 d-flex justify-content-center border-0">
                            <div class="card w-100 border-0" style="width: 18rem;">
                                @if ($book->image)
                                    <img src="{{ Storage::url($book->image) }}"
                                        class="card-img-top object-fit-cover border rounded" alt="...">
                                @else
                                    <img src="{{ asset('image/error.png') }}"
                                        class="card-img-top object-fit-cover border rounded" alt="...">
                                @endif
                                <div class="card-img-overlay">
                                    <span class="badge badge-pill badge-lg bg-light text-dark">
                                        Rp {{ number_format($book->price, 0, ',', '.') }},-
                                    </span>
                                </div>
                                <div class="card-body">
                                </div>
                                <div class="card-footer bg-white py-3">
                                    <h5 class="card-title"><strong>{{ $book->title }}</strong></h5>
                                    <p class="card-text">{{ $book->author }}</p>
                                    <a href="{{ route('book-detail', $book->slug) }}" class="btn btn-danger text-light">
                                        Preview
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

    </x-slot:content>
</x-base>
