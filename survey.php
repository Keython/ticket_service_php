<?php
// Include header
include 'header.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$answers = $_POST['answers'];
    echo "<h1>Rezultāts:</h1>";
    echo "<h2>Jums jāapmeklē KALOPSIAS koncerts.</h2>";
    echo '<a href="survey.php" class="btn">Mēģināt vēlreiz</a>';
    exit();
}
?>

<div class="survey-container">
    <form action="survey.php" method="post" id="surveyForm">
        <h2>Kādu koncertu jums ieteiktu apmeklēt?</h2>

        <div class="survey-question">
            <p><strong>1. Kāda mūzika jums visvairāk patīk?</strong></p>
            <label><input type="radio" name="genre" value="Džezs" required> Džezs</label><br>
            <label><input type="radio" name="genre" value="Roks"> Roks</label><br>
            <label><input type="radio" name="genre" value="Metāls"> Metāls</label><br>
            <label><input type="radio" name="genre" value="Hip-Hops"> Hip-Hops</label><br>
            <label><input type="radio" name="genre" value="Klasiskā mūzika"> Klasiskā mūzika</label><br>
            <label><input type="radio" name="genre" value="Pops"> Pops</label>
        </div>

        <div class="survey-question">
            <p><strong>2. Vai jums labāk patīk atrasties iekštelpā vai ārā?</strong></p>
            <label><input type="radio" name="location" value="Iekšā" required> Iekšā</label><br>
            <label><input type="radio" name="location" value="Ārā"> Ārā</label>
        </div>

        <div class="survey-question">
            <p><strong>3. Vai jums patīk atrasties lielā pūlī?</strong></p>
            <label><input type="radio" name="crowd" value="Jā" required> Jā</label><br>
            <label><input type="radio" name="crowd" value="Nē"> Nē</label>
        </div>

        <button type="submit" class="btn">Iesniegt atbildi</button>
    </form>
</div>
