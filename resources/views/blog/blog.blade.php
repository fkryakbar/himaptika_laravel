<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>Informasi Terkini HIMAPTIKA FKIP ULM</title>
</head>

<body>
    @include('partials.navbar')
    <div style="background-color: #9c1623;">
        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true" class="container">
            <div style="color: #9c1623;">.</div>
            <div class="row">
                <div class="col-lg-6">
                    <h1 id="judulcontent" class="mt-3 text" style="font-weight: bolder; font-size: 50px">Informasi</h1>
                    <p style="color: white;"><i class="fa-solid fa-calendar-check me-2"></i>Informasi Terkini yang Ada
                        di HIMAPTIKA FKIP ULM</p>
                </div>
                <div class="col-lg-6 hide">
                    <!-- <i style="color: white;" class="fas fa-users fa-7x float-end mt-3"></i> -->
                    <i style="color: white;" class="fas fa-7x fa-newspaper icon hiden float-end mt-4"></i>
                </div>
            </div>

            <div style="color: #9c1623;">.</div>
        </div>
    </div>
    <div class="cont container">
        <div class="content container-lg">
            <div class="row">
                <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true"
                    class="col-lg-9 p-4">
                    <span class="badge bg-danger mb-4" style="background-color: #9c1623; font-size:large"><i
                            class="fa-solid fa-1x fa-file-lines me-2"></i>Berita Terkini</span>
                    <p class="float-end text-muted">Page {{ $blogs->currentPage() }} of {{ ceil($blogs->total() / 5) }}
                    </p>
                    @forelse ($blogs as $blog)
                        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in"
                            data-aos-once="true" style="box-shadow: none;" class="card mb-3" style="max-width: 100%;">
                            <div class="row ">
                                <div class="col-md-2">
                                    <img style="object-fit: cover; width:100%" src="{{ $blog->image_path }}"
                                        class="img-fluid rounded-start mb-2" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <a href="blog/{{ $blog->slug }}" style="text-decoration: none; color:black">
                                            <h5 style="font-size: 20px; font-weight: bold;" class="card-title">
                                                {{ $blog->title }}</h5>
                                            <hr>
                                            <p class="card-text">{{ $blog->description }}</p>
                                            <p class="card-text"><span class="badge bg-secondary me-2"><i
                                                        class="fa-solid me-2 fa-clipboard"></i>Published :
                                                    {{ date('d-m-Y', strtotime($blog->created_at)) }}</span><span
                                                    class="badge mt-2 bg-secondary"><i
                                                        class="fa-solid fa-pen-to-square me-2"></i>Updated :
                                                    {{ $blog->updated_at->diffForHumans() }}</span></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div>
                            <div
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center">
                                <img src="{{ asset('image/404.svg') }}" width="300px">
                                <h5 style="font-weight: bold; color: #4B5563">Blog tidak ditemukan</h5>
                            </div>
                        </div>
                    @endforelse

                    @if ($blogs->lastPage() > 1)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $blogs->currentPage() == 1 ? ' disabled' : '' }}">
                                    <a class="page-link" style="color: #9c1623" href="{{ $blogs->url(1) }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                    <li class="page-item"><a class="page-link"
                                            style="color: {{ $blogs->currentPage() == $i ? '' : ' #9c1623' }}"
                                            href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li
                                    class="page-item {{ $blogs->currentPage() == $blogs->lastPage() ? ' disabled' : '' }}">
                                    <a class="page-link" style="color: #9c1623"
                                        href="{{ $blogs->url($blogs->currentPage() + 1) }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif

                </div>
                <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true"
                    class="col-lg-3 p-4">
                    <form action="/blog" method="GET" autocomplete="off">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari blog" name="search"
                                value="{{ request('search') }}" aria-label="Cari blog"
                                aria-describedby="button-addon2">
                            <button class="btn btn-primary" style="background-color: #9c1623; border: none"
                                type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                    <div class="div">
                        <span class="badge bg-danger mb-4" style="background-color: #9c1623; font-size:large"><i
                                class="fa-brands fa-youtube me-2 fa-1x"></i>Video Terbaru</span>
                    </div>
                    <iframe class="" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"
                        msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen"
                        webkitallowfullscreen="webkitallowfullscreen" width="100%" style="max-width: 325px;"
                        src="https://www.youtube.com/embed/<?= $videoid ?>?rel=0"></iframe>

                    <div class="div">
                        <span class="badge bg-danger mb-4 mt-4" style="background-color: #9c1623; font-size:large"><i
                                class="fa-solid me-2 fa-clipboard fa-1x"></i>Post Lainnya</span>
                        @forelse ($random_blogs as $random_blog)
                            <a href="blog/<?= $random_blog['slug'] ?>" style="text-decoration: none; color:black">
                                <h4 style="font-weight: bold;"><?= $random_blog['title'] ?></h4>
                                <p class="card-text"> <?= $random_blog['description'] ?></p>
                                <hr>
                            </a>
                        @empty
                            <div>
                                <div
                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center">
                                    <img src="{{ asset('image/404.svg') }}" width="300px">
                                    <h5 style="font-weight: bold; color: #4B5563">Blog tidak ditemukan</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>



                </div>

            </div>



        </div>
    </div>



    @include('partials.footer')

    <!-- bootsrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
