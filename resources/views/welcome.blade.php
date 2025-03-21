@extends('layouts.app')

@section('content')
    <div class="card bg-dark text-white mb-5">
        <img src=" {{ url('storage/img/dog.jpg') }}" class="img-fluid" alt="...">
        <div class="card-img-overlay">
            <div class="mx-auto my-auto">
                <div class="my-5" style="border-left:solid #ec660e 1px;">
                    <div class="ms-5 text-sm-start fw-lighter" style="font-family: Times New Roman;font-size: 3vw;">
                        <span style="color: #222930;">
                            {{ __('Cats, Dogs and Even Raccoons') }}
                        </span>
                    </div>
                    <div class="ms-5 text-sm-start fw-bolder" style="font-size: 5vw;">
                        <strong>
                            <span style="color: #ec660e;">{{ __('Adopt') }}</span>
                            <span style="color: #222930;">{{ __('Any Pet You Like') }}!</span>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Three columns of text below the carousel -->
        <h1 class="text-center mb-5">MIEMBROS IMPORTANTES</h1>
        <div class="row text-center">
            <div class="col-lg-4 h-100">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                    first column.</p>
                <p class="text-decoration-none">
                    <i class="bi bi-facebook link-primary fs-3"></i>
                    <i class="bi bi-instagram link-danger fs-3"></i>
                    <i class="bi bi-twitter link-info fs-3"></i>
                    <i class="bi bi-linkedin link-primary fs-3"></i>
                </p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 h-100">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                    column.</p>
                <p class="text-decoration-none">
                    <i class="bi bi-facebook link-primary fs-3"></i>
                    <i class="bi bi-instagram link-danger fs-3"></i>
                    <i class="bi bi-twitter link-info fs-3"></i>
                    <i class="bi bi-linkedin link-primary fs-3"></i>
                </p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 h-100">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
                    role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p class="text-decoration-none">
                    <i class="bi bi-facebook link-primary fs-3"></i>
                    <i class="bi bi-instagram link-danger fs-3"></i>
                    <i class="bi bi-twitter link-info fs-3"></i>
                    <i class="bi bi-linkedin link-primary fs-3"></i>
                </p>
                </p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                    exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                        yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                    of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                    really intended to be actually read, simply here to give you a better view of what this would look like
                    with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                    height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                        dy=".3em">500x500</text>
                </svg>

            </div>
        </div>


        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
@endsection
