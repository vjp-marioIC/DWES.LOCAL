<?php require_once(__DIR__ . "../../../utils/utils.php"); ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>Mario Iglesias (DWES)</span>
            </a>
       </div>
       <div class="collapse navbar-collapse navbar-right" id="menu">
          <ul class="nav navbar-nav">
            <li class="<?= esOpcionMenuActiva('index') ? 'active' : ''; ?> lien"><a href="/"><i class="fa fa-home sr-icons"></i> Home</a></li>
            <li class="<?= esOpcionMenuActiva('about') ? 'active' : ''; ?> lien"><a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
            <li class="<?= existeOpcionMenuActivaEnArray(['blog', 'single_post']) ? 'active' : ''; ?> lien"><a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
            <li class="<?= esOpcionMenuActiva('contact') ? 'active' : ''; ?> lien"><a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
            <li class="<?= esOpcionMenuActiva('gallery') ? 'active' : ''; ?> lien"><a href="/gallery"><i class="fa fa-image sr-icons"></i> Gallery</a></li>
            <li class="<?= esOpcionMenuActiva('partner') ? 'active' : ''; ?>"><a href="/partner"><i class="fa fa-hand-o-right sr-icons"></i> Partner</a></li>
          </ul>
       </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->