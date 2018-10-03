<div class="header">
  <div class="navigation">
    <ul>
    <?php foreach ($menu_items as $menu): ?>
      <li><a href="<?php echo base_url($menu['url']); ?>"><?php echo $menu['caption']; ?></a></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
