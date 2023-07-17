<x-base-admin title="Manage Report">

    <x-slot:content>

        <x-sidebar-admin />
        <div class="main-content position-relative bg-gray-100">
            <x-navbar-admin />
            <div class="container-fluid py-4" style="min-height: 100vh">
                <div class="card mb-3">
                    <h5 class="card-header">Invoices</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            User</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Invoice Number</th>
                                        <th
                                            class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Book</th>
                                        <th
                                            class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">{{ $invoice->transaction->user->name }}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $invoice->transaction->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $invoice->invoice_number }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $invoice->transaction->book->title }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    Rp
                                                    {{ number_format($invoice->transaction->book->price, 2, ',', '.') }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class=" text-xs font-weight-bold">{{ $invoice->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('detail-report', $invoice->invoice_number) }}"
                                                    class="btn btn-dark">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <h5 class="card-header">Transaksi</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Author</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Function</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Technology</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Employed</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">John Michael</h6>
                                                    <p class="text-xs text-secondary mb-0">john@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Manager</p>
                                            <p class="text-xs text-secondary mb-0">Organization</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Alexa Liras</h6>
                                                    <p class="text-xs text-secondary mb-0">alexa@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Programator</p>
                                            <p class="text-xs text-secondary mb-0">Developer</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-secondary">Offline</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                                                    <p class="text-xs text-secondary mb-0">laurent@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Executive</p>
                                            <p class="text-xs text-secondary mb-0">Projects</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Michael Levi</h6>
                                                    <p class="text-xs text-secondary mb-0">michael@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Programator</p>
                                            <p class="text-xs text-secondary mb-0">Developer</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Richard Gran</h6>
                                                    <p class="text-xs text-secondary mb-0">richard@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Manager</p>
                                            <p class="text-xs text-secondary mb-0">Executive</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-secondary">Offline</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg"
                                                        class="avatar avatar-sm me-3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-xs">Miriam Eric</h6>
                                                    <p class="text-xs text-secondary mb-0">miriam@creative-tim.com
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Programtor</p>
                                            <p class="text-xs text-secondary mb-0">Developer</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-secondary">Offline</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> --}}
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
            </div>
        </div>
    </x-slot:content>
</x-base-admin>
