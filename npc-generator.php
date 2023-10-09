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


                    <input type="radio" name="behavior" value="friendly" <?php if (isset($_POST['behavior']) && $_POST['behavior'] == 'friendly') echo 'checked'; ?> />
                    <label for="friendly">amicale</label>

                    <input type="radio" name="behavior" value="hostile" <?php if (isset($_POST['behavior']) && $_POST['behavior'] == 'hostile') echo 'checked'; ?> />
                    <label for="hostile">hostile</label>

                </fieldset>

                <fieldset class="choice-container race-container">
                    <legend>Race du pnj:</legend>
                    <label for="race-select"></label>
                    <select name="race" id="race-select">
                        <option value="random" <?php if (isset($_POST['race']) && $_POST['race'] == 'random') echo 'selected'; ?>>Aleatoire
                        </option>
                        <option value="human" <?php if (isset($_POST['race']) && $_POST['race'] == 'human') echo 'selected'; ?>>Humain
                        </option>
                        <option value="elf" <?php if (isset($_POST['race']) && $_POST['race'] == 'elf') echo 'selected'; ?>>Elfe
                        </option>
                        <option value="dwarf" <?php if (isset($_POST['race']) && $_POST['race'] == 'dwarf') echo 'selected'; ?>>Nain
                        </option>
                        <option value="orc" <?php if (isset($_POST['race']) && $_POST['race'] == 'orc') echo 'selected'; ?>>Orc</option>
                    </select>
                </fieldset>


                <fieldset class="choice-container sex-container">
                    <legend>Sexe pnj:</legend>

                    <div>
                        <input type="radio" name="sex" value="random" checked />
                        <label for="sex">Aleatoire</label>
                    </div>

                    <div>
                        <input type="radio" name="sex" value="woman" <?php if (isset($_POST['behavior']) && $_POST['sex'] == 'woman') echo 'checked'; ?> />
                        <label for="sex">Femme</label>
                    </div>

                    <div>
                        <input type="radio" name="sex" value="man" <?php if (isset($_POST['behavior']) && $_POST['sex'] == 'man') echo 'checked'; ?> />
                        <label for="sex">Homme</label>
                    </div>
                </fieldset>

            </div>
            <div class="submit-container">
                <button type="reset" onclick="resetForm()">Reinitialiser</button>
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
    <script>
        function resetForm() {

        }
    </script>
</body>

</html>