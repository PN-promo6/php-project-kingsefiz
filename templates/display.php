<?php require_once("header.php"); ?>
<!-- ##### Big Posts Area Start ##### -->
<div class="big-posts-area mb-50">
    <div class="container">
        <!-- Single Big Post Area -->
        <?php for ($i = 0; $i < count($items); $i++) {
            if ($i % 2 == 0) { ?>
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="big-post-thumbnail mb-50">
                            <img src="<?php echo $items[$i]->imageUrl ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="big-post-content text-center mb-50">
                            <a href="#" class="post-tag"><?php echo $items[$i]->category ?></a>
                            <a href="#" class="post-title"><?php echo $items[$i]->title ?></a>
                            <div class="post-meta">
                                <a href="#" class="post-date"><?php echo $items[$i]->creationDate ?></a>
                                <a href="?top-search=@<?php echo $items[$i]->creator->username ?>" class="post-author">By <?php echo $items[$i]->creator->username ?></a>
                            </div>
                            <?php echo $items[$i]->description ?>
                            <div style="margin:1rem"><a href="#" class="btn bueno-btn">Read More</a></div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="big-post-content text-center mb-50">
                            <a href="#" class="post-tag"><?php echo $items[$i]->category ?></a>
                            <a href="#" class="post-title"><?php echo $items[$i]->title ?></a>
                            <div class="post-meta">
                                <a href="#" class="post-date"><?php echo $items[$i]->creationDate ?></a>
                                <a href="?top-search=@<?php echo $items[$i]->creator->username ?>" class="post-author">By <?php echo $items[$i]->creator->username ?></a>
                            </div>
                            <?php echo $items[$i]->description ?>
                            <div style="margin:1rem"><a href="#" class="btn bueno-btn">Read More</a></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="big-post-thumbnail mb-50">
                            <img src="<?php echo $items[$i]->imageUrl ?>" alt="">
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

    </div>
</div>
<!-- ##### Big Posts Area End ##### -->

<?php require_once("footer.php") ?>