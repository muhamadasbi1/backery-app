@extends('layouts.dashboard')

@section('title')
  Account Settings
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">My Account</h2>
      <p class="dashboard-subtitle">
        Update your current profile
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form id="locations" action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address_one">Alamat Lengkap</label>
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
                      <label for="address_two">Alamat Patokan</label>
                      <input
                        type="text"
                        class="form-control"
                        id="address_two"
                        name="address_two"
                        value="{{ $user->address_two }}"
                      />
                    </div>
                  </div>
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
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="zip_code"></label>
                      <input
                        type="text"
                        class="form-control"
                        id="zip_code"
                        name="zip_code"
                        value="{{ $user->zip_code }}"
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
                        value="{{ $user->phone_number }}"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
@endpush