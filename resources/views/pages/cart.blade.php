@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Keranjang
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Image</td>
                    <td>Nama Barang</td>
                    <td>Harga</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @php $shippingPrice = 0 @endphp
                  @foreach ($carts as $cart)
                    <tr>
                      <td style="width: 20%;">
                        @if($cart->product->galleries)
                          <img
                            src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                            alt=""
                            class="cart-image"
                          />
                        @endif
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">{{ $cart->product->name }}</div>
                        <!-- <div class="product-subtitle">by {{ $cart->product->user->store_name }}</div> -->
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">Rp {{ number_format($cart->product->price) }}</div>
                        <div class="product-subtitle"></div>
                      </td>
                      <td style="width: 20%;">
                        <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                          {{-- <input type="hidden" name="id" value="{{$cart->id}}"> --}}
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-remove-cart" type="submit">
                            Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                    @php $totalPrice += $cart->product->price @endphp
                    
                  @endforeach
                  @php $totalPrice += $shippingPrice @endphp
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detile Pengiriman</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <input id="shipping-price" type="hidden" name="shipping_price">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" id="locations">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_one">Alamat lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_one"
                    name="address_one"
                    value="{{ $user->address_one }}"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Alamat patokan</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address_two"
                    name="address_two"
                    value="{{ $user->address_two }}"
                  />
                </div>
              </div>
              <!-- <div class="col-md-6">
                <div class="form-group">
                  <label for="address_two">Provinsi</label>
                  <input
                    type="text"
                    class="form-control"
                    id=""
                    name=""
                    value="{{ $user->districts_id }}"
                  />
                </div>
              </div> -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="districts_id">Kecamatan</label>
                  <select name="districts_id" id="districts_id" class="form-control" v-model="districts_id" v-if="districts">
                    <option v-for="province in districts" :value="province.id">@{{ province.name }}</option>
                  </select>
                  <select v-else class="form-control"></select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="villages_id">Desa</label>
                  <select name="villages_id" id="villages_id" onchange="tampilOngkir(this.value)" class="form-control" v-model="villages_id" v-if="villages">
                    <option v-for="regency in villages" :value="regency.ongkir">@{{regency.name }}</option>
                  </select>
                  <select v-else class="form-control"></select>
                </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-group" >
                  <label for="villages_id">Ongkir</label>
                  <select name="shipping_price" id="villages_ongkir" onchange="tampilOngkir(this.value)" class="form-control" v-model="villages_id" v-if="villages" >
                    <option v-for="regency in villages" :value="regency.ongkir">@{{regency.ongkir }}</option>
                  </select>
                  <select v-else class="form-control"></select>
                </div>
              </div> --}}
              
              <!-- <div class="col-md-4">
                <div class="form-group">
                  <label for="zip_code"></label>
                  <input
                    type="text"
                    class="form-control"
                    id="zip_code"
                    name="zip_code"
                    value="40512"
                  />
                </div>
              </div> -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">Kabupaten</label>
                  <input
                    type="text"
                    class="form-control"
                    id="country"
                    name="country"
                    value="Musirawas Utara"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone_number">No Hp</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone_number"
                    name="phone_number"
                    value="+628 2020 11111"
                  />
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2 class="mb-1">Informasi Pembayaran</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-4 col-md-2">
                <!-- <div class="product-title">$0</div>
                <div class="product-subtitle">Country Tax</div> -->
              </div>
              <div class="col-4 col-md-3">
                <!-- <div class="product-title">$0</div>
                <div class="product-subtitle">Product Insurance</div> -->
              </div>
              <div  class="col-4 col-md-2 ">
                <div id="hasil-output-ongkir" class="product-title text-success ongkir"></div>
                <div class="product-subtitle ongkir">Ongkir</div>
              </div>
              <div class="col-4 col-md-2 ">
                <div id="hasil-output-total" class="product-title text-success ongkir "></div>
                <div class="product-subtitle ongkir">Total</div>
              </div>
              <div class="col-8 col-md-3">
                <button
                  type="submit"
                  class="btn btn-success mt-4 px-4 btn-block"
                >
                  Checkout Now
                </button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          this.getdistrictsData();
        },
        data: {
          districts: null,
          villages: null,
          districts_id: null,
          villages_id: null,
        },
        methods: {
          getdistrictsData() {
            var self = this;
            axios.get('{{ route('api-districts') }}')
              .then(function (response) {
                  self.districts = response.data;
              })
          },
          getvillagesData() {
            var self = this;
            axios.get('{{ url('api/villages') }}/' + self.districts_id)
              .then(function (response) {
                  self.villages = response.data;
              })
          },
        },
        watch: {
          districts_id: function (val, oldVal) {
            this.villages_id = null;
            this.getvillagesData();
          },
        }
      });
    </script>
    <script>
      $(".ongkir").hide();
      function tampilOngkir(val) {
        let total = @php echo json_encode($totalPrice); @endphp; 
        $(".ongkir").show(val);
        let ongkir = parseInt(val);
        console.log(this.ongkir);
        total = total + ongkir
        var hasil = document.getElementById("hasil-output-ongkir");
        hasil.innerHTML = ongkir ;
        var hasil = document.getElementById("hasil-output-total");
        hasil.innerHTML = total ;
        var shipping_price = document.getElementById("shipping-price");
        shipping_price.value = ongkir ;
        

      }
    </script>
  
@endpush

