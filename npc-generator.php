<!DOCTYPE html>
<html>

<head>
    <title>NPC generator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>

    </header>
    <main>
        <div class="title-container">
            <h1 class="title">Generateur de PNJ</h1>
            <p>Creez votre personnage non jouable pour vos parties de jeu de role en quelques clics !</p>
        </div>

        <form action="npc-generator.php" method="POST">
            <div class="form-container">

                <fieldset class="choice-container behavior-container">
                    <legend>Comportement du pnj:</legend>

                    <input type="radio" name="behavior" value="random" checked />
                    <label for="friendly">Aleatoire</label>


                    <input type="radio" name="behavior" value="friendly" />
                    <label for="friendly">amicale</label>

                    <input type="radio" name="behavior" value="hostile" />
                    <label for="hostile">hostile</label>

                </fieldset>

                <fieldset class="choice-container race-container">
                    <legend>Race du pnj:</legend>

                    <label for="race-select"></label>

                    <select name="race" id="race-select">
                        <option value="random">Aleatoire</option>
                        <option value="human">Humain</option>
                        <option value="elf">Elfe</option>
                        <option value="dwarf">Nain</option>
                        <option value="orc">Orc</option>
                    </select>
                </fieldset>

                <fieldset class="choice-container sex-container">
                    <legend>Sexe pnj:</legend>

                    <div>
                        <input type="radio" name="sex" value="random" checked />
                        <label for="sex">Aleatoire</label>
                    </div>

                    <div>
                        <input type="radio" name="sex" value="woman" />
                        <label for="sex">Femme</label>
                    </div>

                    <div>
                        <input type="radio" name="sex" value="man" />
                        <label for="sex">Homme</label>
                    </div>
                </fieldset>

            </div>
            <div class="submit-container">
                <button type="reset">Reinitialiser</button>
                <button type="submit">Valider</button>
            </div>
        </form>

        <div id="result-container" class="result-container">
            <?php
            require 'BaseNpc.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    'behavior' => $_POST['behavior'],
                    'race' => $_POST['race'],
                    'sex' => $_POST['sex'],
                ];

                $npc = BaseNpc::getInstance($data);
                echo $npc->getAll();
            }
            ?>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>