<?php
    $router->get('', 'controllers/index.php');
    $router->get('about', 'controllers/about.php');
    $router->get('partner', 'controllers/partner.php');
    $router->get('blog', 'controllers/blog.php');
    $router->get('contact', 'controllers/contact.php');
    $router->get('gallery', 'controllers/gallery.php');
    $router->get('post', 'controllers/single_post.php');
    $router->post('gallery/new', 'controllers/gallery_new.php');
?>