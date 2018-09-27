<div class="container-fluid footer">
  <div class="row news-row">
    <div class="col-xs-12 col-sm-4 logo">
      <img src="<?php echo base_url('assets/images/Tanaylogo.png'); ?>">
        <img src="<?php echo base_url('assets/images/hane.png'); ?>">
    </div>
    <div class="col-xs-12 col-sm-4 site-map">
      <ul>
      <?php foreach ($menu_items as $menu): ?>
        <li><a href="<?php echo base_url($menu['url']); ?>"><?php echo $menu['caption']; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-4 contact-info">
      <div><i class="fas fa-users"></i> kayle almedina</div>
      <div><i class="fas fa-mobile-alt"></i> 09275242783</div>
      <div><i class="fas fa-envelope"></i> kyleskatechristian23@gmail.com</div>
    </div>
  </div>
</div>
