<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Deze pagina accepteert alleen POST-requests.');
}

// Zet alle formulier elementen in een variable 

$name = trim($_POST['name'] ?? '');
$age = $_POST['age'] ?? '';
$beginEducation = $_POST['begin-education'] ?? '';
$grade = $_POST['grade'] ?? '';
$programLanguage = $_POST['programLanguage'] ?? '';
$leraar = $_POST['leraar'] ?? [];
$beforeStudie = trim($_POST['before-studie'] ?? '');
$game = trim($_POST['game'] ?? '');
$programTime = $_POST['program-time'] ?? '';
$improve = trim($_POST['improve'] ?? '');

$allowPogramTime = ['beginner', 'gevorderd-beginner', 'gevorderd'];

// Zorgt dat er geen bugs in de verstuurde gegevens komen

$errors = []; 

// Kijkt of de leeftijd klopt van het formulier
$validAge = filter_var($age, FILTER_VALIDATE_INT) !== false
    && (int) $age > 16;
// Kijkt of het een getal is tussen de 1 en 10
$validGrade = filter_var($age, FILTER_VALIDATE_INT) !== false
    && ((int) $grade >= 1 && (int) $grade <= 10);

// Kijkt of het een geldige datum is 
$dateObject = DateTime::createFromFormat('!Y-m-d', $beginEducation);

$validDate = $dateObject !== false
    && $dateObject->format('Y-m-d') === $beginEducation;

// Voert iets uit wanneer er iets niet klopt
if($name === ''){
    $errors[] = 'Vul je naam in';
}

if(!$validAge){
    $errors[] = 'Vul een geldige leeftijd in boven de 16 jaar';
}
if(!$validDate){
    $errors[] = 'Vul een geldige datum in';
}
if(!$validGrade){
    $errors[] = 'Vul een cijfer in tussen de 1 en 10';
}
if($programLanguage === ''){
    $errors[] = 'Kies 1 van de programmeertalen';
}
if(empty($leraar)){
    $errors[] = 'Selecteer minimaal 1 optie';
}
if($beforeStudie === ''){
    $errors[] = 'Vul in wat je deed voor de studie';
}
if($game === ''){
    $errors[] = 'Vul in welk spel je speelt';
}
if(!in_array($programTime, $allowPogramTime, true)){
    $errors[] = 'Klik een geldig antwoord aan';
}
if($improve === ''){
    $errors[] = 'Vul in wat de school kan verbeteren';
}
// Als er een fout is gedetecteerd
if ($errors !== []) {
    http_response_code(422);
    echo '<h1>Controleer het formulier</h1><ul>';
    // foreach loopt door $errors heen en toont elke foutmelding als los <li>-item
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error) . '</li>';
    }
    echo '</ul>';
    exit;
}

// Als de formulier juist is ingevuld 
if ($errors === []) {
    $regel = $name . ' | '
        . $age . ' | '
        . $beginEducation . ' | '
        . $grade . ' | '
        . $programLanguage . ' | '
        . implode(', ', $leraar) . ' | '
        . $beforeStudie . ' | '
        . $game . ' | '
        . $programTime . ' | '
        . $improve
        . PHP_EOL;

    file_put_contents(__DIR__ . '/questionaire.txt', $regel, FILE_APPEND);
}

$bericht = 'Melding opgeslagen';

header('Location: /index.php?bericht=' . urlencode($bericht));
exit;