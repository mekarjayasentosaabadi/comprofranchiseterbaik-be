<div id="whatsapp-popup" style="z-index: 99;"></div>
<div class="site-footer bg-dark py-4">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-9 col-md-12">
        <div class="widget">
          <h4 class="text-white">franchiseterbaik.com</h4>
          <h4 class="text-white fw-semibold" style="font-size: 50px;">Ayo Raih Mimpi Anda Bersama Kami !!</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-6">
        <div class="col-lg-9">
          <p class="text-white fs-5 text-justify mb-3">
            Pilihan investasi usaha yang aman dan sangat diminati di masa modern sekarang ini, sejalan dengan pertumbuhan pasar konsumen terhadap produk atau jasa yang ditawarkan dari usaha kemitraan kami.
          </p>
          <p class="text-white fs-5 text-justify mb-3">
            Sangat bangga dapat menjadi pilihan utama dalam membantu merangkai kesuksesan anda. Maka jangan ragu dalam mempercayakan masa depan anda kepada kami karena kami selalu menjaga kepercayaan yang anda berikan.
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 text-md-start">
        <div>
          <h2 class="text-white">franchiseterbaik.com</h2>
          <ul class="list-unstyled fs-5 text-white" style="line-height: 40px;">
            <li><i class="bi bi-geo-alt"></i> {{ $master->address }}</li>
            <li><i class="bi bi-telephone"></i> {{ $master->phone_number }}</li>
            <li><i class="bi bi-whatsapp"></i> {{ $master->whatsapp_number }}</li>
          </ul>
          <a href="https://wa.me/{{ $master->whatsapp_number }}" target="blank" class="btn btn-primary"><i class="bi bi-whatsapp"></i> Hubungi Kami</a>
        </div>
      </div>
    </div>
  </div>
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
      popupMessage: 'Hallo 👋, Apakah ada yang bisa kami bantu?',
      showPopup: true,
      position: 'right'
    });
  });
</script>

<script src="{{ asset('assetfrontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assetfrontend/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assetfrontend/js/aos.js') }}"></script>
<script src="{{ asset('assetfrontend/js/navbar.js') }}"></script>
<script src="{{ asset('assetfrontend/js/counter.js') }}"></script>
<script src="{{ asset('assetfrontend/js/custom.js') }}"></script>