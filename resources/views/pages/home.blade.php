@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home" >
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                <div class="col-lg-12"  data-aos="zoom-in">
                    <div
                    id="storeCarousel"
                    class="carousel slide"
                    data-ride="carousel"
                    >
                    <ol class="carousel-indicators">
                        <li
                        class="active"
                        data-target="#storeCarousel"
                        data-slide-to="0"
                        ></li>
                        <li data-target="#storeCarousel" data-slide-to="1"></li>
                        <li data-target="#storeCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img
                            src="/images/banner.jpg"
                            alt="Carousel Image"
                            class="d-block w-100"
                        />
                        </div>
                        <div class="carousel-item">
                        <img
                            src="/images/banner2.jpg"
                            alt="Carousel Image"
                            class="d-block w-100"
                        />
                        </div>
                        <div class="carousel-item">
                        <img
                            src="/images/banner.jpg"
                            alt="Carousel Image"
                            class="d-block w-100"
                        />
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        <section class="store-carousel">
        {{-- <div class="container">
            <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
                <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
                >
                <ol class="carousel-indicators">
                    <li
                    class="active"
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    ></li>
                    <li data-target="#storeCarousel" data-slide-to="1"></li>
                    <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img
                        src="/images/indo-mini.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                        height="300px"
                    />
                    </div>
                    <!-- <div class="carousel-item">
                    <img
                        src="/images/banner.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                    />
                    </div>
                    <div class="carousel-item">
                    <img
                        src="/images/banner.jpg"
                        alt="Carousel Image"
                        class="d-block w-100"
                    />
                    </div> -->
                </div>
                </div>
            </div>
            </div>
        </div> --}}
        {{-- <div class="container h-100 position-relative" style="top: -50px;">
    <div class="row gy-5 gy-lg-0 row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div class="col">
            <div class="card">
                <div class="card-body pt-5 p-4">
                    <h4 class="card-title">Tentang Kami</h4>
                    <h6 class="text-muted card-subtitle mb-2">Toko Keysha</h6>
                    <p class="card-text">Toko Mini Market Keysha adalah sebuah toko kecil yang menyediakan berbagai macam kebutuhan sehari-hari, seperti makanan, minuman, kebutuhan rumah tangga, dan lain-lain. Toko ini terletak di dekat rumah-rumah penduduk setempat, sehingga mudah diakses oleh masyarakat sekitar. Selain menyediakan bahan-bahan pokok yang dibutuhkan, toko ini juga menyediakan berbagai macam produk hiburan, seperti kartu mainan, buku, dan CD musik. Pelayanan di toko ini sangat ramah dan cepat, sehingga membuat pelanggan merasa nyaman berbelanja di sini.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body pt-5 p-4">
                    <h4 class="card-title">Produk</h4>
                    <h6 class="text-muted card-subtitle mb-2">Toko Keysha</h6>
                    <p class="card-text">Produk-produk yang tersedia di Mini Market Keysha sangat lengkap dan bervariasi, mulai dari makanan dan minuman segar, kebutuhan rumah tangga, hingga produk hiburan seperti kartu mainan, buku, dan CD musik. Selain itu, toko ini juga menyediakan berbagai macam produk kecantikan dan keperluan pribadi, seperti sabun, shampoo, dan produk perawatan wajah. Dengan demikian, Anda tidak perlu ke tempat lain untuk mencari kebutuhan sehari-hari Anda, karena semuanya tersedia di Mini Market Keysha.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body pt-5 p-4">
                    <h4 class="card-title">Cara Pesan</h4>
                    <h6 class="text-muted card-subtitle mb-2">Toko Keysha</h6>
                    <p class="card-text">Anda dapat memesan produk-produk di Mini Market Keysha secara online dengan cara yang sangat mudah. Pertama, Anda bisa mengunjungi website atau aplikasi online toko kami dan melihat-lihat produk yang tersedia. Setelah menemukan produk yang Anda inginkan, tambahkan ke keranjang belanja Anda dan lanjutkan ke pembayaran. Pembayaran dapat dilakukan dengan berbagai macam metode, seperti kartu kredit, debit, atau melalui layanan pembayaran online seperti PayPal atau GoPay. Setelah pembayaran selesai, Anda hanya perlu menunggu produk yang Anda pesan untuk dikirim ke alamat tujuan yang Anda tentukan. It's that easy!</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
        </section>
        
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Semua Kategori</h5>
                    </div>
                </div>
                <div class="row " style="background-color:#;">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @php $incrementCategory = 0 @endphp
                            @forelse ($categories as $category)
                            <div class="swiper-slide">
                                <div class="" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                                    <a href="{{ route('categories-detail', $category->slug) }}"
                                        class="component-categories d-block" style=" height:210px;">
                                        <div class="categories-image">
                                            <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                                        </div>
                                        <p class="categories-text">
                                            {{ $category->name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                                No Categories Found
                            </div>
                        </div>
                        @endforelse
                    </div>
                    {{-- <div class="swiper-button-next" ></div>
                    <div class="swiper-button-prev"></div> --}}
                    <br>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Produk Terbaru</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementProduct = 0 @endphp
                    @forelse ($products as $product)
                        <div  
                        class="col-6 col-md-4 col-lg-3 "
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
                        >
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail border">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($product->galleries)
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text">
                                    {{  $product->name }}
                                </div>
                                <div class="products-price">
                                    Rp {{ $product->price }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No Products Found
                            </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection