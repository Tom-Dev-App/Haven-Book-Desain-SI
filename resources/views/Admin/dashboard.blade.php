<x-base-admin title="Dashboard">

    <x-slot:content>
        <x-sidebar-admin />
        <main class="main-content position-relative border-radius-lg " style="min-height: 100vh">
            <!-- Navbar -->
            <x-navbar-admin />
            <div class="modal fade" id="add-rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content w-50 mx-auto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Rekening</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('bank-admin-profile', $user->id) }}" method="POST">
                            <div class="modal-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="">Bank</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="bank">
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->codename }} -
                                                {{ $bank->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rekening</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="account_number" oninput="formatPrice(event) ">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="container-fluid">
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
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('{{ asset('soft-ui-dashboard-main/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
                    <span class="mask bg-gradient-primary opacity-2"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="">
                                    {{ $user->name }}
                                </h5>
                                <p class="font-weight-bold text-sm">
                                    registered at {{ $user->created_at }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                    <li class="nav-item">
                                        <span class="badge badge-pill badge-lg bg-gradient-success">Administrator</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="card h-100">
                            <div class="card-header pb-0 p-4">
                                <div class="row ">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h5 class="mb-0">Profile Information</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update-admin-profile', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input name="name" type="text" class="form-control" id="username"
                                                    aria-describedby="emailHelp" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword1" value="#######">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="first-name" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    id="first-name" aria-describedby="emailHelp"
                                                    value="{{ $user->profile->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="last-name" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    id="last-name" aria-describedby="emailHelp"
                                                    value="{{ $user->profile->last_name }}">
                                            </div>

                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3 d-flex flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="old_name" value="{{ $user->name }}">
                                    <input type="hidden" name="old_email" value="{{ $user->email }}">
                                    <input type="hidden" name="old_first_name"
                                        value="{{ $user->profile->first_name }}">
                                    <input type="hidden" name="old_last_name"
                                        value="{{ $user->profile->last_name }}">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card h-100">
                            <h5 class="card-header">
                                Akun Rekening
                            </h5>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="" class="form-label">A.N</label>
                                    <input type="text" readonly class="form-control" id=""
                                        value="{{ $user->name }}">
                                </div>
                                @foreach ($bankAccounts as $bankAccount)
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <label for="" class="form-label">Rekening Pembayaran
                                                    {{ $loop->iteration }}</label>
                                                <input type="text" readonly class="form-control" id=""
                                                    value="{{ $bankAccount->bank->codename }} - {{ $bankAccount->account_number }}">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <a href="{{ route('delete-bank-admin-profile', $bankAccount->id) }}"
                                                    class="btn-delete-rekening mt-4" style="display: none">
                                                    <i class="fa-solid fa-xmark fa-lg" style="color: #dc3545;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <button data-bs-toggle="modal" data-bs-target="#add-rekening"
                                    class="btn btn-dark">Tambah rekening</button>
                                @if (!$bankAccounts->isEmpty())
                                    <button class="btn btn-danger" id=""
                                        onclick="deleteRekening(event)">Hapus
                                        rekening</button>
                                @endif
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
                                    target="_blank">Creative
                                    Tim</a>
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
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
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
        <!--   Core JS Files   -->
        <script src="{{ asset('soft-ui-dashboard-main/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('soft-ui-dashboard-main/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('soft-ui-dashboard-main/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('soft-ui-dashboard-main/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('soft-ui-dashboard-main/js/plugins/chartjs.min.js') }}"></script>
        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#fff",
                        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                        maxBarThickness: 6
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 15,
                                font: {
                                    size: 14,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                                color: "#fff"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false
                            },
                            ticks: {
                                display: false
                            },
                        },
                    },
                },
            });


            var ctx2 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

            var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: "Mobile apps",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#cb0c9f",
                            borderWidth: 3,
                            backgroundColor: gradientStroke1,
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                            maxBarThickness: 6

                        },
                        {
                            label: "Websites",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#3A416F",
                            borderWidth: 3,
                            backgroundColor: gradientStroke2,
                            fill: true,
                            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                            maxBarThickness: 6
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#b2b9bf',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#b2b9bf',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>
        <script>
            var counterDeleteRekening = 1;

            function deleteRekening(event) {

                var btnDelete = document.querySelectorAll(".btn-delete-rekening");

                counterDeleteRekening += 1;
                for (var i = 0; i < btnDelete.length; i++) {

                    if (counterDeleteRekening % 2 === 0) {

                        btnDelete[i].style.display = 'block';
                    } else {

                        btnDelete[i].style.display = 'none';
                    }
                }


            }

            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('soft-ui-dashboard-main/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    </x-slot:content>
</x-base-admin>
