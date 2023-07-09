<nav class="navbar navbar-main navbar-expand-lg mt-3 px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="javascript:;">
                        {{-- {{ $request->segment(1) }} --}}
                    </a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                    <a href="{{ route(request()->segment(1)) }}">{{ request()->segment(1) }}</a>
                </li>
                @if (request()->segment(2))
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        <a href="">{{ request()->segment(2) }}</a>
                    </li>
                @endif
            </ol>
            @if (request()->segment(2))
                <h6 class="font-weight-bolder mb-0">{{ request()->segment(2) }}</h6>
            @else
                <h6 class="font-weight-bolder mb-0">{{ request()->segment(1) }}</h6>
            @endif
        </nav>
    </div>
</nav>
