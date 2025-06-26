<div id="mainCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <?php foreach ($banners as $index => $banner): ?>
            <li data-target="#mainCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($banners as $index => $banner): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= base_url('images/banner/' . $banner->image); ?>" 
                     class="d-block w-100" 
                     alt="<?= htmlspecialchars($banner->title ?? 'Banner') ?>"
                     style="object-fit: cover; height: 500px;">
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<style>
    /* Smooth fade transition */
    .carousel-fade .carousel-item {
        opacity: 0;
        transition: opacity 2s ease-in-out;
    }
    
    .carousel-fade .carousel-item.active {
        opacity: 1;
    }
    
    /* Fix for image loading */
    .carousel-item {
        transition: transform 1s ease-in-out !important;
    }
    
    /* Optional: Add overlay for better text readability */
    .carousel-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.08);
    }
</style>

<script>
$(document).ready(function() {
    // Fix for carousel jumping
    $('#mainCarousel').carousel({
        pause: false
    }).on('slide.bs.carousel', function () {
        // Optional: Add any additional animation triggers
    });
});
</script>