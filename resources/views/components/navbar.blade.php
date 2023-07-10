<div class="main-navigation fixed-top site-header border-bottom" id="mainmenu-area">
    <nav class="navbar navbar-expand-lg ">
        <div class="container align-items-center">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                {{-- <h2 class="mb-0">the <span class="text-color">Haven</span>Book</h2> --}}
                <img src="{{ asset('image/havenbook.png') }}" width="150">
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse  text-lg-left" id="navbarmain">
                <!-- Links -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="{{ route('homepage') }}" class="nav-link smoth-scroll">
                            Home
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="{{ route('book') }}" class="nav-link smoth-scroll">
                            Book
                        </a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a href="{{ route('bookshelf') }}" class="nav-link smoth-scroll">
                            My Book
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('notif') }}" class="nav-link smoth-scroll">
                            Notifications
                        </a>
                    </li>
                    @endauth

                    <li class="nav-item ">
                        <a href="#book" class="nav-link smoth-scroll">
                            About
                        </a>
                    </li>
                    @if (Session::get('role') == null)
                        <li class="nav-item ">
                            <a href="{{ route('sign-in') }}" class="nav-link smoth-scroll">
                                Sign in
                            </a>
                        </li>
                    @endif

                </ul>

                @if (Session::get('role') != null)
                    <div class="dropdown">
                        <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ route('user-profile') }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</div>
