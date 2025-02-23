<div class="brand-tea">
    <p class="ub-bold">Brand Teasers</p>
    <div class="gallery-container">
        <div class="arrow left-arrow">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="gallery-wrapper">
            <div class="gallery-row custom-swiper-container" style="justify-content: space-evenly;">
                <div class="custom-swiper-wrapper">
                    <?php if (!empty($brand_teasers)): ?>
                        <?php foreach ($brand_teasers as $teaser): ?>
                            <div class="gallery-item custom-swiper-slide">
                                <video class="img-fluid teaser-video" autoplay muted loop>
                                    <source src="<?= base_url('uploads/videos/' . $teaser['video_path']) ?>" type="video/mp4">
                                </video>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No brand teasers available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="arrow right-arrow">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </div>
</div>