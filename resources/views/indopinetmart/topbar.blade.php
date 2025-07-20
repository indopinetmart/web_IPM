 <header id="header" class="header d-flex align-items-center fixed-top">
     <div class="container-fluid container-xl position-relative d-flex align-items-center">

         <a href="index.html" class="logo d-flex align-items-center me-auto">
             <img src="{{ asset('tamplate/assets/img/logo/logopt.png') }}" alt="Logo"
                 class="img-fluid logo-img rotate-3d" />
             <h1 class="text-gradient-indopinetmart">Indo Pinet Mart</h1>
         </a>

         <nav id="navmenu" class="navmenu">
             <ul>
                 <li><a href="#hero" class="active">Home</a></li>
                 <li><a href="#about">About</a></li>
                 <li><a href="#services">Services</a></li>
                 <li><a href="#portfolio">Portfolio</a></li>
                 <li class="dropdown"><a href="#"><span>Language</span> <i
                             class="bi bi-chevron-down toggle-dropdown"></i></a>
                     <ul>
                         <li><a href="#">English</a></li>
                         <li><a href="#">Spanyol</a></li>
                         <li><a href="#">Arab</a></li>
                         <li><a href="#">Prancis</a></li>
                         <li><a href="#">Indonesia</a></li>
                         <li><a href="#">Vietnam</a></li>

                     </ul>
                 </li>
                 {{-- <li><a href="#contact">Contact</a></li> --}}
             </ul>
             <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
         </nav>

         {{-- <a class="cta-btn" href="index.html#about">Get Started</a> --}}

     </div>
 </header>
