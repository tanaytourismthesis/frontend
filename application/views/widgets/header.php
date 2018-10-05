<div class="header">
  <div class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php foreach ($menu_items as $menu): ?>
            <li><a href="<?php echo base_url($menu['url']); ?>"><?php echo $menu['caption']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>
  </div>
</div>
