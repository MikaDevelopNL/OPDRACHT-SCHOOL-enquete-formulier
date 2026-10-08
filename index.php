<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School enquete</title>
    <link rel="stylesheet" href="/public_html/css/style.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Enquete vragen</h2>

        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="age">Leeftijd:</label>
            <input type="number" id="age" name="age" required>
        </div>

        <div class="form-group">
            <label for="begin-education">Wanneer begon je opleiding:</label>
            <input type="date" id="begin-education" name="begin-education" required>
        </div>

        <div class="form-group">
            <label for="grade">Welk cijfer geef je de lessen? 1 t/m 10</label>
            <input type="number" id="grade" name="grade" min="1" max="10" required>
        </div>

        <fieldset>
            <legend>Welke taal vind jij het interessantst</legend>
            <div class="form-group">
                <label for="HTML">HTML</label>
                <input type="radio" id="HTML" name="programmeertaal" value="HTML" checked>
            </div>

            
            <div class="form-group">
                <label for="CSS">CSS</label>
                <input type="radio" id="CSS" name="programmeertaal" value="CSS">
            </div>

            <div class="form-group">
                <label for="Javascript">Javascript</label>
                <input type="radio" id="Javascript" name="programmeertaal" value="Javascript">
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Wie vind jij de leukste leraar</legend>

            <div class="form-group">
                <label for="monique">Monique</label>
                <input type="checkbox" id="monique" name="leraar[]" value="monique" checked>
            </div>

            <div class="form-group">
                <label for="simon">Simon</label>
                <input type="checkbox" id="simon" name="leraar[]" value="simon" checked>
            </div>

            <div class="form-group">
                <label for="roel">Roel</label>
                <input type="checkbox" id="roel" name="leraar[]" value="roel" checked>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="before">Wat deed je voor de opleiding?(opleiding of werk)</label>
            <input type="text" id="before" name="before" required>
        </div>

        <div class="form-group">
            <label for="game">Wat is je favoriete game?</label>
            <input type="text" id="game" name="game" required>
        </div>

        <div class="form-group">
            <label for="how-long">Hoe lang programmeer je al?</label>
            <select id="how-long" name="how-long" required>
                <option value="" disabled selected>-- Kies je optie --</option>
                <option value="beginner">Beginner(aantal maanden)</option>
                <option value="gevorderd-beginner">Gevorderd beginner(meer dan een half jaar)</option>
                <option value="gevorderd">Gevorderd(meer dan een jaar)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="improve">Wat kan de school beter doen volgens jou?</label>
            <textarea name="improve" id="improve" rows="3"></textarea>
        </div>
    

        <button type="submit" class="form-btn">Verstuur enquete</button>
    </form>
</body>
</html>