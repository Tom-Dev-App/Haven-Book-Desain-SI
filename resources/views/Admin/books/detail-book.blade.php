<x-base-admin title="Detail Buku">
    <x-slot:content>
        <x-sidebar-admin />
        <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            <x-navbar-admin />
            <div class="container-fluid py-4" style="min-height: 100vh">
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
                <div class="card m-5">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($book->image)
                                <img src="{{ Storage::url($book->image) }}" class="card-img-top w-100 m-3 rounded"
                                    alt="...">
                            @else
                                <img src="{{ asset('image/error.png') }}" class="card-img-top w-100 m-3 rounded"
                                    alt="...">
                            @endif
                            <div class="card-img-overlay m-3">
                                <span class="badge badge-pill badge-lg bg-gradient-primary">
                                    Rp {{ number_format($book->price, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card h-100 p-3">
                                <div class="card-header pb-0 p-5">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-8 text-center">
                                            <h1 class="display-4">{{ $book->title }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-5">
                                    <i>
                                        {{ $book->synopsis }}
                                    </i>
                                    <hr class="horizontal gray-light my-4">
                                    <p class="fs-6">
                                        {{ $book->description }}
                                    </p>
                                    <hr class="horizontal gray-light my-4">
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <div class="date d-flex flex-column justify-content-center">
                                        <i class="text-sm">Written by ~{{ $book->author }}</i>
                                        <p class="fw-bolder text-sm">Published by {{ $book->publisher }}</p>
                                    </div>
                                    <div class="button d-flex flex-row justify-content-center">
                                        <a data-bs-toggle="modal" data-bs-target="#update-buku" href=""
                                            class="btn bg-gradient-dark mx-3">Update Buku</a>
                                        <a onclick="confirm('akan menghapus buku?')"
                                            href="{{ route('delete-book', $book->id) }}"
                                            class="btn bg-gradient-link">Delete
                                            Buku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="update-buku" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('update-book', $book->slug) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Buku</h5>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">
                                                    Cover
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <input class="form-control" type="file" id="formFile" value=""
                                                    name="image">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="form-control-label">Slug</label>
                                                <input class="form-control" readonly type="text"
                                                    value="{{ $book->slug }}" placeholder="example: $-123-x"
                                                    id="slug" name="slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="book-title" class="form-control-label">
                                                    Title
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <input class="form-control" type="text" value="{{ $book->title }}"
                                                    placeholder="example: The Alchemist" id="book-title" name="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="synopsis">
                                                    Synopsis
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <textarea class="form-control" name="synopsis" id="synopsis" rows="3">{{ $book->synopsis }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">
                                                    Description
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <textarea class="form-control" name="description" id="desc" rows="3">{{ $book->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="author" class="form-control-label">
                                                    Author
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <input class="form-control" type="text"
                                                    value="{{ $book->author }}" placeholder="" id="author"
                                                    name="author">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="author-url">author
                                                    attachment</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="">Link</span>
                                                    <input type="text" class="form-control" id="author-url"
                                                        aria-describedby="" value="{{ $book->author_attachment }}"
                                                        name="author-attachment">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="publisher" class="form-control-label">
                                                    Publisher
                                                    <span class="text-danger text-sm">*</span>
                                                </label>
                                                <input class="form-control" type="text"
                                                    value="{{ $book->publisher }}" placeholder="" id="publisher"
                                                    name="publisher">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="publisher-url">publisher
                                                    attachment</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="">Link</span>
                                                    <input type="text" class="form-control" id="publisher-url"
                                                        aria-describedby="" value="{{ $book->publisher_attachment }}"
                                                        name="publishser-attachment">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="price">publisher
                                                    Price</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="priceInput"
                                                        oninput="formatPrice(event)" aria-describedby=""
                                                        name="price"
                                                        value="{{ number_format($book->price, 2, ',', '.') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-link"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-dark">Save changes</button>
                                </div>
                            </form>
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
                    <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.
                    </p>
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
        </script>
    </x-slot:content>
</x-base-admin>
