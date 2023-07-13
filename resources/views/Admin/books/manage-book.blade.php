<x-base-admin title="Manage Buku">

    <x-slot:content>

        <x-sidebar-admin />
        <div class="main-content position-relative bg-gray-100" style="min-height: 100vh">
            <x-navbar-admin />
            <div class="container-fluid py-4">

                <div class="row" style="min-height: 100vh">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Manage Book</h6>
                                <div class="row">
                                    <div class="row mt-4">
                                        <div class="col-md-2 d-flex align-items-center">
                                            <button type="button" class="btn btn-block bg-gradient-dark"
                                                data-bs-toggle="modal" data-bs-target="#modal-default">add
                                                book</button>
                                        </div>
                                        <div class="col-md-10 ">
                                            @if (session('alert') && session('alertType') == 'Success')
                                                <script>
                                                    Toast.fire({
                                                        icon: 'success',
                                                        title: '{{ Session::get('alert') }}'
                                                    })
                                                </script>
                                            @elseif(session('alert') && session('alertType') == 'Danger')
                                                <script>
                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: '{{ Session::get('alert') }}'
                                                    })
                                                </script>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('insert-book') }}" enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-default">Add a new
                                                            book
                                                        </h6>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">
                                                                        Cover
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <input required
                                                                        class="form-control @error('image') is-invalid @enderror"
                                                                        type='file' name="image">
                                                                    @error('image')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">
                                                                        File PDF
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <input required
                                                                        class="form-control @error('file') is-invalid @enderror"
                                                                        type="file" name="file">
                                                                    @error('file')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="slug"
                                                                        class="form-control-label">Slug</label>
                                                                    <input readonly
                                                                        class="form-control @error('slug') is-invalid @enderror"
                                                                        type="text" name="slug"
                                                                        placeholder="example: $-123-x" id="slug"
                                                                        value="{{ uniqid() }}"
                                                                        value="{{ @old('slug') }}">
                                                                    @error('slug')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="book-title" class="form-control-label">
                                                                        Title
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <input required
                                                                        class="form-control @error('title') is-invalid @enderror"
                                                                        type="text" value="" name="title"
                                                                        placeholder="example: The Alchemist"
                                                                        id="book-title" value="{{ @old('title') }}">
                                                                    @error('title')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="synopsis">
                                                                        Synopsis
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <textarea class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" id="synopsis" rows="3"
                                                                        aria-describedby="synopsisHelp">{{ old('synopsis') }}</textarea>
                                                                    <div class="form-text text-sm">
                                                                        <span id="synopsisCounter">200</span> character
                                                                        remains
                                                                    </div>
                                                                    @error('synopsis')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="desc">
                                                                        Description
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="desc"
                                                                        rows="3">{{ old('description') }}</textarea>
                                                                    <div class="form-text text-sm">
                                                                        <span id="descCounter">300</span>
                                                                        character remains
                                                                    </div>

                                                                    @error('description')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="author" class="form-control-label">
                                                                        Author
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <input required
                                                                        class="form-control @error('author') is-invalid @enderror"
                                                                        type="text" value="" placeholder=""
                                                                        name="author" id="author">
                                                                    @error('author')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="publisher" class="form-control-label">
                                                                        Publisher
                                                                        <span class="text-danger text-sm">*</span>
                                                                    </label>
                                                                    <input required
                                                                        class="form-control @error('publisher') is-invalid @enderror"
                                                                        type="text" value="" placeholder=""
                                                                        id="publisher" name="publisher">
                                                                    @error('publisher')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                        for="priceInput">Price</label>
                                                                    <div class="input-group">
                                                                        <input required type="text" id="priceInput"
                                                                            oninput="formatPrice(event)"
                                                                            class="form-control @error('price') is-invalid @enderror"
                                                                            aria-describedby="" name="price"
                                                                            placeholder="0"
                                                                            value="{{ old('price') }}">
                                                                        @error('price')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn bg-gradient-dark">Add
                                                            Book
                                                        </button>
                                                        <button type="button" class="btn btn-outline-link  ml-auto"
                                                            data-bs-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center justify-content-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Title</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Slug</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Author</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Publisher</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Price</th>

                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Created at</th>

                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2">
                                                            <div>
                                                                @if ($book->image)
                                                                    <img src="{{ Storage::url($book->image) }}"
                                                                        class="avatar me-2" alt="">
                                                                @else
                                                                    <img src="{{ asset('image/error.png') }}"
                                                                        class="avatar me-2" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="my-auto">
                                                                <h6 class="mb-0 text-sm">{{ $book->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0">
                                                            {{ $book->slug }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0">{{ $book->author }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0">
                                                            {{ $book->publisher }}
                                                        </p>
                                                    </td>
                                                    <td class="">
                                                        <p class="text-sm font-weight-bold mb-0">Rp
                                                            {{ number_format($book->price, 2, ',', '.') }}
                                                        </p>
                                                    </td>
                                                    <td class="">
                                                        <p class="text-sm font-weight-bold mb-0">
                                                            {{ $book->created_at ?? '-' }}
                                                        </p>
                                                    </td>

                                                    <td class="align-middle">
                                                        @if (!$book->deleted_at)
                                                            <a href="{{ route('detail-book', $book->slug) }}"
                                                                class="my-auto btn bg-gradient-primary font-weight-bold"
                                                                data-toggle="tooltip"
                                                                data-original-title="Edit user">Detail

                                                            </a>
                                                        @else
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
                </div>
                <footer class="footer pt-3">
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
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg ">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                        <p>See our dashboard options.</p>
                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0">
                    <!-- Sidebar Backgrounds -->
                    <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger"
                                onclick="sidebarColor(this)"></span>
                        </div>
                    </a>
                    <!-- Sidenav Type -->
                    <div class="mt-3">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="text-sm">Choose between 2 different sidenav types.</p>
                    </div>
                    <div class="d-flex">
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                            onclick="sidebarType(this)">Transparent</button>
                        <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                            onclick="sidebarType(this)">White</button>
                    </div>
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                    <!-- Navbar Fixed -->
                    <div class="mt-3">
                        <h6 class="mb-0">Navbar Fixed</h6>
                    </div>
                    <div class="form-check form-switch ps-0">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <a class="btn bg-gradient-dark w-100"
                        href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
                    <a class="btn btn-outline-dark w-100"
                        href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
                        documentation</a>
                    <div class="w-100 text-center">
                        <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
                            data-icon="octicon-star" data-size="large" data-show-count="true"
                            aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                        <h6 class="mt-3">Thank you for sharing!</h6>
                        <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                            class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
                            class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function formatPrice(event) {
                // Mengambil nilai input
                var value = event.target.value;

                // Menghapus semua karakter non-digit
                var formattedValue = value.replace(/\D/g, '');

                // Memisahkan nilai menjadi bagian pecahan dan desimal
                var fraction = formattedValue.slice(0, -3); // Bagian pecahan
                var decimal = formattedValue.slice(-3); // Bagian desimal

                // Menggabungkan bagian pecahan dan desimal dengan tanda titik sebagai pemisah ribuan
                var formattedPrice = fraction.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '.' + decimal;

                // Mengatur nilai input dengan format harga
                event.target.value = formattedPrice;
            }

            var maxSynopsis = 400;

            const synopsis = document.getElementById('synopsis');
            const synopsisCounter = document.getElementById('synopsisCounter');

            synopsis.addEventListener('keydown', function(e) {
                if (maxSynopsis === 0 && e.key !== 'Backspace' || maxSynopsis === 400 && e.key === 'Backspace') {
                    e.preventDefault();
                    return;
                }

                if (e.key === 'Backspace') {
                    maxSynopsis = maxSynopsis + 1;
                    synopsisCounter.innerHTML = maxSynopsis;
                } else {
                    maxSynopsis = maxSynopsis - 1;
                    synopsisCounter.innerHTML = maxSynopsis;
                }

            });

            var maxDesc = 500;

            const desc = document.getElementById('desc');
            const descCounter = document.getElementById('descCounter');

            desc.addEventListener('keydown', function(e) {
                if (maxDesc === 0 && e.key !== 'Backspace' || maxDesc === 500 && e.key === 'Backspace') {
                    e.preventDefault();
                    return;
                }

                if (e.key === 'Backspace') {
                    maxDesc = maxDesc + 1;
                    descCounter.innerHTML = maxDesc;
                } else {
                    maxDesc = maxDesc - 1;
                    descCounter.innerHTML = maxDesc;
                }

            });
        </script>
    </x-slot:content>
</x-base-admin>
