<?php
// Include header if needed
include 'header.php';

// Define galleries and their images
$galleries = [
    "Festivāls Positivus 2024" => [
        "images" => [
            "https://live.staticflickr.com/933/41850654400_f914f0f145_z.jpg",
            "https://live.staticflickr.com/860/28770295817_f97946fbd5_z.jpg",
            "https://live.staticflickr.com/838/43611930102_08e6958a9f_n.jpg",
            "https://live.staticflickr.com/856/41850632200_7751158b52.jpg"
        ]
    ],
    "Elektriskā istaba" => [
        "images" => [
            "https://live.staticflickr.com/4330/35285828664_aa75c59e1e_c.jpg",
            "https://live.staticflickr.com/4314/36085809746_b50a89e91e_c.jpg",
            "https://live.staticflickr.com/4322/35285833524_6463643241_z.jpg"
        ]
    ],
    "Iggy Pop koncerts" => [
        "images" => [
            "https://live.staticflickr.com/8043/28061950704_8dcbf4c5b4_z.jpg",
            "https://live.staticflickr.com/8791/28572849102_2f23f77fac_z.jpg",
            "https://live.staticflickr.com/8148/28678554255_21c5f02e28_z.jpg"
        ]
    ]
];
?>

<div class="gallery-container">
    <!-- Show all folders if no specific gallery is selected -->
    <?php if (!isset($_GET['gallery'])): ?>
        <div class="folder-list">
    <?php foreach ($galleries as $galleryName => $galleryData): ?>
        <div class="folder-item">
            <a href="gallery.php?gallery=<?php echo urlencode($galleryName); ?>">
                <img src="<?php echo $galleryData['images'][0]; ?>" alt="<?php echo htmlspecialchars($galleryName); ?>">
                <h3><?php echo htmlspecialchars($galleryName); ?></h3>
            </a>
        </div>
        <?php endforeach; ?>
        </div>

    <!-- Show selected gallery images -->
    <?php else: ?>
        <?php
        $selectedGallery = $_GET['gallery'];
        if (array_key_exists($selectedGallery, $galleries)) {
            $images = $galleries[$selectedGallery]['images'];
        ?>
            <div class="selected-gallery">
                <h2><?php echo htmlspecialchars($selectedGallery); ?></h2>
                <div class="image-list">
                    <?php foreach ($images as $image): ?>
                        <div class="image-item">
                            <img src="<?php echo $image; ?>" alt="Image">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php } else { ?>
            <p>Galerija netika atrasta.</p>
            <a href="gallery.php" class="btn">Atpakaļ</a>
        <?php } ?>
    <?php endif; ?>
</div>
