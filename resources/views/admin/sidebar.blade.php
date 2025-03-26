<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
      <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
      <a href="index.html" class="sidebar-logo">
        <img src="{{ asset('img/Logo_IKI.png') }}" alt="site logo" class="light-logo">
        <img src="{{ asset('img/Logo_IKI.png') }}" alt="site logo" class="dark-logo">
        <img src="{{ asset('img/Logo_IKI.png') }}" alt="site logo" class="logo-icon">
      </a>
    </div>
    <div class="sidebar-menu-area">
      <ul class="sidebar-menu" id="sidebar-menu">
        <li class="sidebar-menu-group-title">Profil</li>
        <li>
          <a href="{{ route('admin') }}" class="{{ Route::is('admin') ? 'active-page' : '' }}" >
            <iconify-icon icon="mage:box-3d-fill" class="menu-icon"></iconify-icon>
            <span>About</span>
          </a>
        </li>
        <li>
          <a href="{{ route('promo') }}" class="{{ Route::is('promo') ? 'active-page' : '' }}">
            <iconify-icon icon="mingcute:sale-line" class="menu-icon"></iconify-icon>
            <span>Promo</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('menu') }}" class="{{ Route::is('menu') ? 'active-page' : '' }}">
            <iconify-icon icon="mdi:food-drumstick-outline" class="menu-icon"></iconify-icon>
            <span>Menu</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('pencapaian') }}" class="{{ Route::is('pencapaian') ? 'active-page' : '' }}">
            <iconify-icon icon="mdi:achievement-outline" class="menu-icon"></iconify-icon>
            <span>Pencapaian</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('testimoni') }}" class="{{ Route::is('testimoni') ? 'active-page' : '' }}">
            <iconify-icon icon="fluent:guitar-24-regular" class="menu-icon"></iconify-icon>
            <span>Testimoni</span> 
          </a>
        </li>
        <li class="sidebar-menu-group-title">Kemitraan</li>
        <li>
          <a href="{{ route('calonMitra') }}" class="{{ Route::is('calonMitra') ? 'active-page' : '' }}">
            <iconify-icon icon="material-symbols:mail-outline" class="menu-icon"></iconify-icon>
            <span>Calon Mitra</span>
            @if ($unread > 0)
                
              <iconify-icon icon="mdi:dot" class="text-primary" width="24" height="24"></iconify-icon>
            @endif
          </a>
        </li>
        <li>
          <a href="{{ route('gerobak') }}" class="{{ Route::is('gerobak') ? 'active-page' : '' }}">
            <iconify-icon icon="solar:box-linear" class="menu-icon"></iconify-icon>
            <span>Gerobak</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('stepByStep') }}" class="{{ Route::is('stepByStep') ? 'active-page' : '' }}">
            <iconify-icon icon="mdi:cast-tutorial" class="menu-icon"></iconify-icon>
            <span>Step by Step</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('keunggulan') }}" class="{{ Route::is('keunggulan') ? 'active-page' : '' }}">
            <iconify-icon icon="fa:plus" class="menu-icon"></iconify-icon>
            <span>Keunggulan Mitra</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('syarat') }}" class="{{ Route::is('syarat') ? 'active-page' : '' }}">
            <iconify-icon icon="f7:doc-on-doc" class="menu-icon"></iconify-icon>
            <span>Syarat Mitra</span> 
          </a>
        </li>
        <li class="sidebar-menu-group-title">User</li>
        <li>
          <a href="chat-message.html">
            <iconify-icon icon="stash:user-group" class="menu-icon"></iconify-icon>
            <span>List User</span> 
          </a>
        </li>
        
      </ul>
    </div>
  </aside>