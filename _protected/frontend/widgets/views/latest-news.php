<?php
if($model){ ?>
    <div class="news-slider owl-carousel owl-theme">
    <?php
    foreach($model as $news){ ?>
        <div class="item">
            <h3><?= $news->name ?></h3>
            <div class="date"><i class="icon-calendar"></i><?= date("d-m-Y",$news->publish_date) ?></div>
            <p><?= $news->description ?></p>
        </div>
    <?php
    } ?>
    </div>
<?php
}
?>