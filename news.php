<?php
include 'header.php';
$newsMessages = [
    ['title' => 'Festivāls ATCELTS!', 'content' => 'Festivāls ZEM-TILTA tiek atcelts sakarā ar budžeta problēmām jeb tā neesamību. Nauda netiks atgriezta.'],
    ['title' => 'Grupa EXPOSEI pātrauc darbību.', 'content' => 'Lokālā scēnas grupa izziņo pēdējo koncertu, jo pārtrauc darbību. Grupa pateicas saviem faniem un aicina neskumt pārāk.'],
    ['title' => 'Tiks organizēti policijas REIDI koncertos!', 'content' => 'Valsts policija ziņo, ka mūzikas festivālos un citos koncertos rīkos reidus, lai mazinātu mazgadīgo nelikumīgu uzturēšanos nakts pasākumos un vielu lietošanu. Sagatavojiet viltotos dokumentus laicīgi!'],
];
?>
<div class="news-container">
        <?php foreach ($newsMessages as $news): ?>
            <div class="news-card">
                <h3><?php echo $news['title']; ?></h3>
                <p><?php echo $news['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>