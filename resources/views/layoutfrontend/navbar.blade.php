 <nav class="site-nav">
      <div>
        <div class="menu-bg-wrap">
          <div class="site-navigation d-flex justify-content-center align-items-center">
            <!-- <a href="index.html" class="logo m-0 float-start">Property</a> -->
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
              <li class="pr-5">
                <a  class="{{ Request::is('/') ? 'icon-nav-active' : '' }}"  href="/"><i class="bi bi-house-door-fill fs-5"></i></a>
                <div class="px-5"></div>
              </li>
                  @foreach ($franchises as $franchise)
                  @if ($franchise->is_menu == 1)
                      <li>
                        <a class="{{ Request::is('show-franchise/'.$franchise->slug) ? 'active-nav' : '' }}" 
                          href="/show-franchise/{{ $franchise->slug }}" 
                          style="{{ Request::is('show-franchise/'.$franchise->slug) ? 'text-decoration: underline !important; text-underline-offset: 3px;' : '' }}">
                          {{ $franchise->judul }}
                        </a>
                      </li>
                    @endif
                @endforeach
              </ul>
            <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>