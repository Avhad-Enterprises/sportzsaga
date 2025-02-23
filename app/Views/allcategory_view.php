<div class="Allcategory">
    <i class="fa-solid fa-chevron-left left-chevron" style="display: none;"></i>
    <div class="Allcategorypills ub-regular dragscroll">
        <?php foreach ($pills as $pill): ?>
            <a href="#"><?= $pill['category_name'] ?></a>
        <?php endforeach; ?>
    </div>
    <i class="fa-solid fa-chevron-right right-chevron"></i>
    <!-- <i class="fa-solid fa-circle-chevron-right " style="color: #ffdc22;"></i> -->
</div>