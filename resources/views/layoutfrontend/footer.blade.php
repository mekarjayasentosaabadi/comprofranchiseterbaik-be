<div id="whatsapp-popup" style="z-index: 99;"></div>

<div class="site-footer bg-dark">
  <div class="container">
    <h4 class="text-white">franchiseterbaik.com</h4>
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-12">
        <h4 class="text-white fw-semibold" style="font-size: 44px;">Ayo Raih Mimpi Anda Bersama Kami !!</h4>
        <div class="col-md-12">
          <div class="pe-lg-5">
            <p class="text-white fs-5 mb-3">
              Pilihan investasi usaha yang aman dan sangat diminati di masa modern sekarang ini, sejalan dengan pertumbuhan pasar konsumen terhadap produk atau jasa yang ditawarkan dari usaha kemitraan kami.
            </p>
            <p class="text-white fs-5 mb-3">
              Sangat bangga dapat menjadi pilihan utama dalam membantu merangkai kesuksesan anda. Maka jangan ragu dalam mempercayakan masa depan anda kepada kami karena kami selalu menjaga kepercayaan yang anda berikan.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 mt-4 mt-md-0">
        <h2 class="text-white">franchiseterbaik.com</h2>
        <ul class="list-unstyled fs-5 text-white" style="line-height: 40px;">
          <li style="width: 300px"><i class="bi bi-geo-alt"></i> {{ $master->address }}</li>
          <li><i class="bi bi-telephone"></i> {{ formatNomorKantor($master->phone_number) }}</li>
          <li><i class="bi bi-whatsapp"></i> {{ formatPhoneNumber($master->whatsapp_number) }}</li>
        </ul>
        <a href="https://wa.me/{{ $master->whatsapp_number }}?text=Halo kak, boleh minta info detailnya mengenai Franchise Terbaik ? " target="_blank" class="btn btn-primary">
          <i class="bi bi-whatsapp"></i> Hubungi Kami
        </a>
      </div>
    </div>
  </div>
  <hr >
  <p class="text-white text-center">&copy; <span>{{ date('Y') }}</span> MAKKO Group. All Rights Reserved.</p>
</div>


  
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>


<script type="text/javascript">
  $(function () {
    $('#whatsapp-popup').floatingWhatsApp({
      phone: '{{ $master->whatsapp_number }}',
      position: 'right',
      message: "Halo kak, boleh minta info detailnya mengenai Franchise Terbaik ?"
    });
  });
</script>
<script src="{{ asset('assetfrontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assetfrontend/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assetfrontend/js/aos.js') }}"></script>
<script src="{{ asset('assetfrontend/js/navbar.js') }}"></script>
<script src="{{ asset('assetfrontend/js/counter.js') }}"></script>
<script src="{{ asset('assetfrontend/js/custom.js') }}"></script>