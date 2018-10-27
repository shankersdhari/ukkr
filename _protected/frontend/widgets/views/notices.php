<div class="container">
    <div class="notification-slider owl-carousel owl-theme">
        <?php if($model){
            foreach($model as $notice){ ?>
        <div class="item">
            <p><?= $notice->content ?><small>new</small></p>
        </div>
        <?php }
        } ?>
    </div>
</div>