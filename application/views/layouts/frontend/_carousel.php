<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach ($banners as $index => $banner): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($banners as $index => $banner): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= base_url('images/banner/' . $banner->image); ?>" class="d-block w-100" alt="...">
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
