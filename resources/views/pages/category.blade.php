@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">
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
              <h5>Semua Produk</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div
                    class="pt-3 m-2"
                    style="width:174px; background-color: #fff; border-radius:10px;  box-shadow: 2px 2px 2px 2px rgba(197, 197, 197, 0.2), 0 10px 10px 0 rgba(192, 192, 192, 0.19);"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProduct+= 100 }}"
                >
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail" >
                            <div
                            class="products-image"
                            style="
                                @if($product->galleries->count())
                                    background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                @else
                                    background-color: #eee
                                @endif
                            "
                            ></div>
                        </div>
                        <div class="products-text p-2">
                            {{ $product->name }}
                        </div>
                        <div class="products-price p-2">
                            Rp {{ $product->price }}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5" 
                    data-aos="fade-up"
                    data-aos-delay="100">
                        No Products Found
                </div>
            @endforelse
          </div>
          <div class="row">
            <div class="col-12 mt-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection