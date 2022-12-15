<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Media Sosial | HIMAPTIKA FKIP ULM</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container sosial mt-5">
        <div class="card" data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true">
            <div class="card-header" style="background-color: #9c1623; color:white">
                <i class="fa-solid fa-envelope me-2"></i>Media Sosial HIMAPTIKA FKIP ULM
            </div>
            <div class="card-body">
                <a style="text-decoration: none; color:black" href="https://instagram.com/himaptika.ulm?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram me-2 mt-1 fa-1x"></i>Instagram </a>
                <hr>
                <a style="text-decoration: none; color:black" href="https://vt.tiktok.com/ZSdedXNCY/" target="_blank"><i class="fab fa-tiktok me-2 mt-1 fa-1x"></i>Tiktok </a>
                <hr>
                <a style="text-decoration: none; color:black" href="https://youtube.com/channel/UCyH0YbfXsGONS1qxVLnkUMA" target="_blank"><i class="fab fa-youtube me-2 mt-1 fa-1x"></i>Youtube </a>
                <hr>
                <a style="text-decoration: none; color:black" href="/home"><i class="fas fa-home me-2 mt-1 fa-1x"></i>Website </a>
                <hr>
                <a style="text-decoration: none; color:black" href="http://bit.ly/LayananAspirasiHimaptika"><i class="fa-solid fa-paper-plane me-2 mt-1"></i></i>Layanan Aspirasi Mahasiswa </a>
            </div>
        </div>
        <div class="card mt-5" data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-in" data-aos-once="true">
            <div class="card-header" style="background-color: #9c1623; color:white">
                <i class="fa-solid fa-circle-info me-2"></i>Pengumuman
            </div>
            <div class="card-body">
                @forelse ($data as $item)
                <a href="{{ $item->link }}" style="text-decoration: none; color:black">{{ $item->judul }}</a>
                <hr>
                @empty
                    <div class="text-muted">Belum ada pengumuman</div>
                @endforelse
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