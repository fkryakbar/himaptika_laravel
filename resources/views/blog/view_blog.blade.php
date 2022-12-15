<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    @if($blog->isNotEmpty())
    <title>{{ $blog[0]->title }} | Informasi</title>
    @else
    <title>Tidak ditemukan | Informasi</title>
    @endif
</head>
<body>
    @include('partials.navbar')
    <div style="background-color: #9c1623;">
        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true" class="container">
            <div style="color: #9c1623;">.</div>
            <div class="row">
                <div class="col-lg-6">
                    @if($blog->isNotEmpty())
                    <h1 id="judulcontent" class="mt-3 text" style="font-weight: bolder; font-size: 50px">{{ $blog[0]->title}}</h1>
                    <p style="color: white;"><i class="fa-solid fa-calendar-check me-2"></i>Published : {{ date('d-m-Y', strtotime($blog[0]->created_at)) }}</p>

                    @else
                    <h1 id="judulcontent" class="mt-3 text" style="font-weight: bolder; font-size: 50px">Blog tidak ditemukan</h1>
                    @endif
                    
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
                <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true" class="col-lg-9 p-4">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/blog" style="text-decoration: none">Beranda</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                        </ol>
                    </nav>
                    @if($blog->isNotEmpty())
                        <h1 style="font-weight: bold; color: #4B5563">{{ $blog[0]->title}} </h1>
                        <nav style="--bs-breadcrumb-divider: '-' ;" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a style="text-decoration: none; color: green"><i class="fa-solid me-2 fa-clipboard"></i> Published : {{ $blog[0]->created_at->diffForHumans() }} </a></li>
                            <li class="breadcrumb-item" style="text-decoration: none ; color: green"><i class="fa-solid fa-pen-to-square me-2"></i> Updated : {{ $blog[0]->updated_at->diffForHumans() }} </li>
                            </ol>
                        </nav>
                        <img src="{{ asset($blog[0]->image_path) }}" class="img-thumbnail rounded mx-auto d-block mb-5l" alt="{{ $blog[0]->title }}" width="500px">
                        {!! $blog[0]->content !!}

                        <hr>
                        <span class="badge bg-danger mb-4" style="background-color: #9c1623; font-size:large"><i class="fa-solid fa-1x fa-comment me-2"></i>Tinggalkan Tanggapan</span>
                        @forelse ($comments as $comment)
                        <div class="card mb-3" style="box-shadow: none; border-style:solid;border-width:1px;border-color:#eeeeee">
                            <h5 class="card-header">{{ $comment->name }}<span class=" ms-2 text-muted float-end">{{ $comment->created_at->diffForHumans() }}</span></h5>
                            <div class="card-body">
                                <p class="card-text">{{ $comment->comment }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="text-muted mb-3">
                            Belum ada komentar
                        </div>
                        @endforelse
                        
                        <div style="padding: 8px; background-color:#eeeeee; border-radius:3px" class="wrapper">
                            <form method="POST" action="" autocomplete="off">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="name@example.com" required>
                                    @error('name')
                                    <div style="color: red">
                                        {{ $message }}
                                      </div>
                                      @enderror
                                    <label for="floatingInput">Nama</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                                    @error('comment')
                                    <div style="color: red">
                                        {{ $message }}
                                      </div>
                                      @enderror
                                    <label for="floatingTextarea2">Komentar...</label>
                                </div>
                                <button type="submit" name="submitkomen" style="background-color: #9c1623; border-color:#9c1623" class="btn btn-primary btn-sm mt-3">Submit</button>
                            </form>
                        </div>
                    @else
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center">
                            <img src="{{ asset('image/404.svg') }}" width="300px">
                            <h5 style="font-weight: bold; color: #4B5563">Blog tidak ditemukan</h5>
                        </div>
                        
                    @endif
                    

                   

                    
                </div>
                <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true" class="col-lg-3 p-4">
                    <form action="/blog" method="GET" autocomplete="off">
                        <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari blog" name="search" value="{{ request('search') }}" aria-label="Cari blog" aria-describedby="button-addon2">
                                <button class="btn btn-primary" style="background-color: #9c1623; border: none" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                    <div class="div">
                        <span class="badge bg-danger mb-4" style="background-color: #9c1623; font-size:large"><i class="fa-brands fa-youtube me-2 fa-1x"></i>Video Terbaru</span>
                    </div>
                    <iframe class="" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" style="max-width: 325px;" src="https://www.youtube.com/embed/<?= $videoid ?>?rel=0"></iframe>

                    <div class="div">
                        <span class="badge bg-danger mb-4 mt-4" style="background-color: #9c1623; font-size:large"><i class="fa-solid me-2 fa-clipboard fa-1x"></i>Post Lainnya</span>
                        @forelse ($random_blogs as $random_blog)
                        <a href="/blog/<?= $random_blog["slug"] ?>" style="text-decoration: none; color:black">
                            <h4 style="font-weight: bold;"><?= $random_blog["title"] ?></h4>
                            <p class="card-text"> <?= $random_blog["description"] ?></p>
                            <hr>
                        </a>
                        @empty
                            Blog tidak ditemukan
                        @endforelse
                    </div>
                   
                    
                    
                </div>
                
            </div>



        </div>
    </div>



    @include('partials.footer')

    <!-- bootsrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
</body>
</html>