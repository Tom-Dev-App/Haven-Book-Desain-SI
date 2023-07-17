<x-base>
    <x-slot:title>{{ $title ?? '' }}</x-slot:title>
    <x-slot:content>
        <x-navbar />
        <!-- Banner -->
        <section class="banner-main py-7" id="banner">
            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="main-banner">
                            <h1 class="mb-2 display-3 fw-bolder">
                                The Man in the <br>Glass House
                            </h1>

                            <p class="text-muted lead">A great landing page to sell your eBook!</p>

                            <p class="mb-3 mt-4 fw-normal text-muted">We work with our partners to streamline project
                                plans that
                                don’t just
                                deliver on product perfection, but also delivers on time.</p>

                            <a href="#" class="btn btn-lg btn-danger mt-2">
                                Rent now, Read later
                            </a>
                            <p class="mt-4 text-muted">* eBook includes iBooks, PDF & ePub versions</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner-img">
                            <img src="{{ asset('image/background.jpg') }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured CLients -->
        <section class="featured-client section-bottom">

        </section>

        <!-- Book preview -->
        <section class="mb-5 py-7" id="book">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="book-preview">
                            <div class="owl-book owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="book-item">
                                    <img src="{{ asset('image/books/book1.jpg') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="section-heading book-info mt-5 mt-lg-0 pl-4">
                            <h2 class="text-lg mb-4 fw-bolder">About The Book</h2>
                            <p class="text-muted">This lovely, well-written book is concerned with creating typography
                                and
                                is
                                essential for professionals who regularly work for clients.</p>

                            <div class="about-features mt-5">
                                <div class="about-item mb-40">
                                    <p class="fs-4">More than 10+ award achieved</p>
                                    <p>Awards for good quality books.</p>
                                </div>
                                <div class="about-item mb-40">
                                    <p class="fs-4">Read On Any Device</p>
                                    <p>Read anything, everything, anywhere </p>
                                </div>
                                <div class="about-item">
                                    <p class="fs-4">Simple for people</p>
                                    <p>Just a few clicks, you can read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="service" id="features">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-block mb-4 mb-lg-0 bg-grey">
                            <i class="fa-solid fa-book fa-fade" style="color: #dc3545;"></i>
                            <h5 class="mb-3 mt-4">Read</h5>
                            <p class="mb-0">Read everything, everywhere, everytime</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-block mb-4 mb-lg-0 bg-grey">
                            <i class="fa-regular fa-lightbulb fa-flip" style="color: #198754;"></i>
                            <h5 class="mb-3 mt-4">Idea</h5>
                            <p class="mb-0">Bring your ideas to the moon</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-block mb-4 mb-lg-0 bg-grey">
                            <i class="fa-solid fa-dollar-sign fa-bounce" style="color: #ffc107;"></i>
                            <h5 class="mb-3 mt-4">Have no cost</h5>
                            <p class="mb-0">I have no money, dont worry, Baby.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Chapter -->
        <section class="section chapter" id="chapter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-heading text-center">
                            <h2 class="text-lg">What can i do?</h2>
                            {{-- <p>Libero atque veniam molestiae ipsa aliquid quam facilis dolore.</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="chapter-inner">
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>Design principles</h4>
                                    <p>Tips on scouting the city and making the most out of your three-month tourist
                                        visa.
                                    </p>
                                </div>
                            </div>
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>Visual hierarchy</h4>
                                    <p>A full chapter the city and making the most out of your three-month tourist visa.
                                    </p>
                                </div>
                            </div>
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>White space</h4>
                                    <p>A full chapter the city and making the most out of your three-month tourist visa.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="chapter-inner">
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>Typography</h4>
                                    <p> A full chapter just about visas. Overview of work visa options, tips on finding
                                        recommendations.</p>
                                </div>
                            </div>
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>UI design</h4>
                                    <p> Making use of events, networking as a designer/developer How to meet the right
                                        people.</p>
                                </div>
                            </div>
                            <div class="chapter-item d-flex">
                                <i class="ti-check"></i>
                                <div class="content pl-4">
                                    <h4>Color theory</h4>
                                    <p>Understanding how the city works. Best practices for eating out and grocery
                                        shopping.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Call to action -->
        <section class="cta-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="cta-content text-center">
                            <span>A powerful explantion of design</span>
                            <h2 class="text-lg mb-4 mt-3">Don’t miss event of Grand Central Publishing.</h2>
                            <a href="#" target="_blank" class="btn btn-main-2 mt-2">
                                Purchase now for <i class="ti-check mr-2 ml-2"></i> $14.99
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Review-->
        <div class="section bg-grey " data-aos="fade-up" id="reviews">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="text-lg mb-5">Customer Reviews</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center" data-aos="fade-up">
                    <div class="col-md-8">
                        <div class="owl-carousel home-slider-loop-false owl-theme">
                            <div class="testimonial-item">
                                <blockquote class="testimonial2">
                                    <p>&ldquo;A small river named Duden flows by their place and supplies it with the
                                        necessary regelialia. It is a paradisematic country, in which roasted parts of
                                        sentences fly into your mouth.&rdquo;</p>
                                    <div class="author mt-5">

                                        <h4 class="mb-0">Maxim Smith</h4>
                                        <p>CEO, Founder</p>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="testimonial-item">
                                <blockquote class="testimonial2">
                                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia
                                        and Consonantia, there live the blind texts. Separated they live in
                                        Bookmarksgrove right at the coast of the Semantics, a large language
                                        ocean.&rdquo;
                                    </p>
                                    <div class="author mt-5">

                                        <h4 class="mb-0">Geert Green</h4>
                                        <p>CEO, Founder</p>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="testimonial-item">
                                <blockquote class="testimonial2">
                                    <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is
                                        an almost unorthographic life One day however a small line of blind text by the
                                        name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                                    <div class="author mt-5">

                                        <h4 class="mb-0">Dennis Roman</h4>
                                        <p>CEO, Founder</p>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="testimonial-item">
                                <blockquote class="testimonial2">
                                    <p>&ldquo;The Big Oxmox advised her not to do so, because there were thousands of
                                        bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text
                                        didn’t listen. She packed her seven versalia, put her initial into the belt and
                                        made herself on the way.&rdquo;</p>
                                    <div class="author mt-5">

                                        <h4 class="mb-0">Geert Green</h4>
                                        <p>CEO, Founder</p>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .section -->

        <!-- Counter -->
        {{-- <section class="section counter border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item d-flex align-items-center mb-5 mb-lg-0">
                            <div class="icon">
                                <i class="ti-thumb-up"></i>
                            </div>
                            <div class="content pl-4">
                                <span>Copies Sold</span>
                                <h2 class="count">23,500</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item d-flex align-items-center mb-5 mb-lg-0">
                            <div class="icon">
                                <i class="ti-check"></i>
                            </div>
                            <div class="content pl-4">
                                <span>Cup Of Coffee</span>
                                <h2 class="count">53,246</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item d-flex align-items-center mb-5 mb-lg-0">
                            <div class="icon">
                                <i class="ti-bookmark"></i>
                            </div>
                            <div class="content pl-4">
                                <span>Copies Released</span>
                                <h2 class="count">32,456</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item d-flex align-items-center mb-5 mb-lg-0">
                            <div class="icon">
                                <i class="ti-heart"></i>
                            </div>
                            <div class="content pl-4">
                                <span>Happy Readers</span>
                                <h2 class="count">45,522</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- About Author -->
        {{-- <section class="about section" id="author">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{ asset('treaser/images/about/authorimg.jpg') }}" alt=""
                                class="img-fluid w-100">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="author-info pl-4 mt-5 mt-lg-0">
                            <span>Know More About Author</span>
                            <h2 class="text-lg">Yasin Arafat <span class="text-sm">- Technical Writer</span></h2>

                            <p class="mb-4 mt-3">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking at its layout. et inventore dicta quos ducimus,
                                consectetur culpa dolore quisquam ipsum facere, fugiat. Corporis eaque, sint.</p>
                            <img src="{{ asset('treaser/images/about/2.png') }}" alt="" class="img-fluid">


                            <div class="follow mt-5">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><span class="mb-3">Follow Me :</span></li>
                                    <li class="list-inline-item">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><i class="ti-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><i class="ti-pinterest"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"><i class="ti-github"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Others books -->
        <section class="section-bottom others-book mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pb-4">
                            <h2>Others books by the author</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="book-item mb-4 mb-lg-0 d-flex justify-content-center">
                            <img src="{{ asset('image/books/1.jpg') }}" alt="" class="w-100   "
                                style="max-height: 295px">
                            <a href="#" class="hover-item">
                                <i class="ti-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="book-item mb-4 mb-lg-0 d-flex justify-content-center">
                            <img src="{{ asset('image/books/2.jpg') }}" alt="" class="w-100 "
                                style="max-height: 295px">
                            <a href="#" class="hover-item">
                                <i class="ti-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="book-item mb-4 mb-lg-0 d-flex justify-content-center">
                            <img src="{{ asset('image/books/3.jpg') }}" alt="" class="w-100 "
                                style="max-height: 295px">
                            <a href="#" class="hover-item">
                                <i class="ti-link"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="book-item mb-4 mb-lg-0 d-flex justify-content-center">
                            <img src="{{ asset('image/books/4.jpg') }}" alt="" class="w-100 "
                                style="max-height: 295px">
                            <a href="#" class="hover-item">
                                <i class="ti-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to action -->
        <section class="section cta-home">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2 class="text-lg">Start building a landing page that converts to leads.</h2>
                    </div>

                    <div class="col-lg-6">
                        <form action="#" class="subscribe-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your email">
                            </div>

                            <a href="#" class="btn btn-main-2">Get free trial</a>
                        </form>

                        <p class="mt-3 mb-0">* Download link will be emailed to you.</p>
                    </div>
                </div>
            </div>
        </section>

        <!--  FAQ -->
        <section class="section faq border-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="section-heading text-center">
                            <h2 class="mb-2 text-lg">Frequently Asked Questions</h2>
                            <p>Whether you have questions or you would just like to say hello, contact us.Lorem ipsum
                                dolor
                                sit amet, consectetur adipisicing elit. Provident, atque!</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title ">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseOne" aria-controls="collapseOne">
                                            <i class="more-less ti-plus"></i>
                                            How to contact with Customer Service?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                        et.
                                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                        sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of
                                        them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title ">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseTwo" aria-controls="collapseTwo">
                                            <i class="more-less ti-plus"></i>
                                            New update fixed all bug and issues?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                        et.
                                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                        sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of
                                        them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title ">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseThree"
                                            aria-controls="collapseThree">
                                            <i class="more-less ti-plus"></i>
                                            Website reponse taking time, how to improve?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                        et.
                                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                        sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of
                                        them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title ">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseFour"
                                            aria-controls="collapseFour">
                                            <i class="more-less ti-plus"></i>
                                            How to purchase the book online?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
                                        et.
                                        Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                        sapiente
                                        ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of
                                        them
                                        accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>

                        </div><!-- panel-group -->

                        <div class="mt-5 text-center">
                            <a href="#" class="btn btn-main-2">Get it now on amazon</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section class="section contact " id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="section-heading">
                            <h2 class="mb-2 text-lg">Contact Author</h2>
                            <p>Whether you have questions or you would just like to say hello, contact us.Lorem ipsum
                                dolor
                                sit amet, consectetur adipisicing elit. Provident, atque!</p>
                        </div>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col-lg-7 col-sm-12 pr-5 col-md-8">
                        <form class="contact__form form-row contact-form " method="post" action="mail.php"
                            id="contactForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success contact__msg" style="display: none"
                                        role="alert">
                                        Your message was sent successfully.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter Your Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Enter Your Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea id="message" name="message" cols="30" rows="6" class="form-control"
                                            placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="d-lg-flex justify-content-between mt-4">
                                    <p>* Rest assured.We will not spam at your inbox.</p>
                                    <input id="submit" name="submit" type="submit"
                                        class="btn btn-main btn-rounded" value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4 col-sm-12 col-md-4">
                        <div class="contact-info-block mb-4 mt-5 mt-lg-0 mt-md-0">
                            <h4 class="mb-2">Contact</h4>
                            <p>+ 301 324 9131 </p>
                        </div>

                        <div class="contact-info-block mb-4">
                            <h4 class="mb-2">Email</h4>
                            <p>startor@support.com</p>
                        </div>

                        <div class="contact-info-block mb-4">
                            <h4 class="mb-2">Location</h4>
                            <p>3125 Flanigan Oaks Drive
                                Capitol Heights, MD 20027</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </x-slot>
</x-base>
