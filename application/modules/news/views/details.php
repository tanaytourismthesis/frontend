<pre>
<?php
debug($details);
?>
</pre>
<div class="container-fluid news-and-update">
        <div class="news-title">
          <?php echo $details['title']; ?>
        </div>

        <div class="row">
          <span class="col-sm-6 author-name">
            <i class="fas fa-user-circle"></i> Administrator
          </span>
          <span class="col-sm-6 date-posted">
            <i class="far fa-calendar-times"></i> August 9, 2018
          </span>
        </div>

        <div class="news-content">
          <?php echo $details['content']; ?>
        </div>
</div>

<div class="container-fluid">
</div>
