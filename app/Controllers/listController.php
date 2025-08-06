<?php
    require "./app/Models/Model.php";     

    function listAllStudent() { //listage des élèves
        $sql = "SELECT * FROM eleve,ecole
                WHERE eleve.numEcole=ecole.numEcole";
        $list = lists($sql);
        foreach($list as $x) {
            echo "<tr><form method='post'><input type='hidden' name='matricule' value='" . $x["numEleve"] . 
                "'><td>" . $x["numEleve"] . "</td>";
            echo "<td>" . $x["nom"] . "</td>";
            echo "<td>" . $x["prenom"] . "</td>";
            echo "<td>" . $x["design"] . "</td>";
            echo "<td><a href='index.php?page=about&matricule=" . $x["numEleve"] . "&nom=" . $x["nom"] . "&prenom=" . $x["prenom"] . 
            "&etablissement=" . $x["design"] . "'><input type='button' class='btn btn-primary btn-round hidden-btn' value='Afficher'></a>
            <button type='submit' class='btn btn-primary btn-round hidden-btn'>Supprimer</button></td></form></tr>";
        }
    }

    function listSchool(){ //listage des écoles
        $sql = "SELECT * FROM ecole";
        $list = lists($sql);
        foreach($list as $x) {
            echo "<tr><form method='post'><input type='hidden' name='id' value='" . $x["numEcole"] . "'>";
            echo "<td>" . $x["numEcole"] . "</td>";
            echo "<td>" . $x["design"] . "</td>";
            echo "<td>" . $x["adresse"] . "</td>";
            echo "<td><a href='index.php?page=editSchool&numEcole=" . $x["numEcole"] . "&design=" . $x["design"] . 
            "&adresse=" . $x["adresse"] . "'><input type='button' class='btn btn-primary btn-round hidden-btn' value='Modifier'></a>
            <button type='submit' class='btn btn-primary btn-round hidden-btn'>Supprimer</button></td></form></tr>";
        }
    }

    function selectSchools() {
        $sql = "SELECT * FROM ecole";
        $list = lists($sql);
        echo '<select class="form-control" name="etablissement">';
        foreach($list as $x) {
            $numecole = $x["numEcole"];
            $design = $x["design"];
            echo "<option value='$numecole'>$design</option>";
        }
        echo "</select>";
    }

    function listMat(){// listage des matières
        $sql = "SELECT * FROM matiere";
        $list = lists($sql);
                
        foreach($list as $x) {
            echo "<tr><form method='post'><input type='hidden' name='code' value='" . $x["numMat"] . "'>";
            echo "<td>" . $x["numMat"] . "</td>";
            echo "<td>" . $x["designMat"] . "</td>";
            echo "<td>" . $x["coef"] . "</td>";
            echo "<td><a href='index.php?page=editMatiere&numMat=" . $x["numMat"] . "&designMat=" . $x["designMat"] . "&coef=" . $x["coef"] . 
            "'><input type='button' class='btn btn-primary btn-round hidden-btn' value='Modifier'></a>
            <button type='submit' class='btn btn-primary btn-round hidden-btn'>Supprimer</button></td></form></tr>";
        }
    }

    function infoSchoolMat() {//affichage d'une matière à modifier
        global $page;
        switch ($page) {
        case "editMatiere":
            $code = $_GET["numMat"];
            $sql = "SELECT * FROM matiere WHERE numMat='$code'";
            $list = lists($sql);
            foreach($list as $x) {
                echo "<div class='col-6 pr-1'>
                            <div class='form-group'>
                                <label>Code</label>
                                <input type='text' class='form-control' name='code' value='" . $x["numMat"] . "'>
                            </div>
                    </div>
                        <div class='col-6 pr-1'>
                            <div class='form-group'>
                                <label>Désignation</label>
                                <input type='text' class='form-control' name='design' value='" . $x["designMat"] . "'>
                            </div>
                    </div>
                    <div class='col-6 pr-1'>
                            <div class='form-group'>
                                <label>Coefficient</label>
                                <input type='text' class='form-control' name='coef' value='" . $x["coef"] . "'>
                            </div>
                    </div>
                    <input type='submit' class='btn btn-primary btn-round' value='Enregistrer'>";
            }
            break;
        case "editSchool":
            $code = $_GET["numEcole"];
            $sql = "SELECT * FROM ecole WHERE numEcole='$code'";
            $list = lists($sql);
            foreach($list as $x) {
            echo "<div class='col-6 pr-1'>
                        <div class='form-group'>
                            <label>ID</label>
                            <input type='text' class='form-control' name='id' value='" . $x["numEcole"] . "'>
                        </div>
                </div>
                    <div class='col-6 pr-1'>
                        <div class='form-group'>
                            <label>Désignation</label>
                            <input type='text' class='form-control' name='design' value='" . $x["design"] . "'>
                        </div>
                </div>
                <div class='col-6 pr-1'>
                        <div class='form-group'>
                            <label>Adresse</label>
                            <input type='text' class='form-control' name='adresse' value='" . $x["adresse"] . "'>
                        </div>
                </div>
                <input type='submit' class='btn btn-primary btn-round' value='Enregistrer'>";
            break;
            }
        }
    }

    function listNote() {//Fonction pour les notes d'un élève
        global $page;
        $matr = $_SESSION["matricule"];
        $list = get_note($matr);

        switch($page) {
        case "about":
            foreach($list as $x) {//listage
                echo "<tr><td>" . $x["codeMat"] . "</td>";
                echo "<td>" . $x["designMat"] . "</td>";
                echo "<td>" . $x["coef"] . "</td>";
                echo "<td>" . $x["note"] . "</td>";
                echo "<td>" . $x["pondere"] . "</td></tr>";
            }
            break;
        case "editAbout": 
            foreach($list as $x) {//Pour modification
                echo '<div class="col-6 pr-1">
                      <div class="form-group">
                        <label>' . $x["designMat"] . '</label>
                        <input type="text" class="form-control" name="' . $x["designMat"] . '" value="' . $x["note"] . '">
                      </div>
                    </div>';
            }
            break;
            case "exportPdf":
                foreach($list as $x) {//listage
    
                    echo "<tr><td>" . $x["designMat"] . "</td>";
                    echo "<td>" . $x["coef"] . "</td>";
                    echo "<td>" . $x["note"] . "</td>";
                    echo "<td>" . $x["pondere"] . "</td></tr>";
                   
                }
                break;
        }
    }
    function listNoteIn() {//liste les input pour ajouter des notes
        $sql = 'SELECT designMat FROM matiere';
        $list = lists($sql);

        foreach($list as $x) {
            echo '<div class="col-6 pr-1">
                      <div class="form-group">
                        <label>' . $x["designMat"] . '</label>
                        <input type="text" class="form-control" name="' . $x["designMat"] . '" placeholder="' . $x["designMat"] . '">
                      </div>
                    </div>';
        }
    }

    function set_session() {//Affectation des variables de SESSIONS pour un élève
        $page = $_GET["page"];
        
        switch($page) {
        case "about":
        case "editAbout":
            $_SESSION["matricule"] = $_GET["matricule"];
            $_SESSION["nom"] = $_GET["nom"];
            $_SESSION["prenom"] = $_GET["prenom"];
            $_SESSION["etablissement"] = $_GET["etablissement"];
            break;
        }
    }

    function listDelib() {//fonction de listage des admis après délibération
        $delib = (float)$_POST["delib"];
        if(!empty($delib)) {
            $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
            FROM eleve,note,matiere,ecole
            WHERE eleve.numEleve=note.num_eleve AND note.num_mat=matiere.numMat
            GROUP BY eleve.numEleve
            HAVING moyenne BETWEEN $delib AND 10";
            $result = lists($sql);
            foreach($result as $x) {
                echo "<tr><td>". $x["numEleve"] . "</td>";
                echo "<td>" . $x["nom"] . "</td>";
                echo "<td>" . $x["prenom"] . "</td>";
                echo "<td>". $x["design"] . "</td>";
                $moyenne = $x["moyenne"];
                $moyenne = number_format($moyenne,2);
                echo "<td>$moyenne</td></tr>";
            }
        }
    }

    function listAdmis() {//fonction de listage des admis définitives
        $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
        FROM eleve,note,matiere,ecole
        WHERE eleve.numEleve=note.num_eleve AND note.num_mat=matiere.numMat
        GROUP BY eleve.numEleve
        HAVING moyenne>=10";
        $result = lists($sql);
        foreach($result as $x) {
            echo "<tr><td>". $x["numEleve"] . "</td>";
            echo "<td>" . $x["nom"] . "</td>";
            echo "<td>" . $x["prenom"] . "</td>";
            echo "<td>". $x["design"] . "</td>";
            $moyenne = $x["moyenne"];
            $moyenne = number_format($moyenne,2);
            echo "<td>$moyenne</td></tr>";
        }
    }

    function listEchoue() {//fonction de listage des échecs
        $delib = empty($delib) ? 10 : (float)$_POST["delib"];
        $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
        FROM eleve,note,matiere,ecole
        WHERE eleve.numEleve=note.num_eleve AND note.num_mat=matiere.numMat
        GROUP BY eleve.numEleve
        HAVING moyenne<$delib";
        $result = lists($sql);
        foreach($result as $x) {
            echo "<tr><td>". $x["numEleve"] . "</td>";
            echo "<td>" . $x["nom"] . "</td>";
            echo "<td>" . $x["prenom"] . "</td>";
            echo "<td>". $x["design"] . "</td>";
            $moyenne = $x["moyenne"];
            $moyenne = number_format($moyenne,2);
            echo "<td>$moyenne</td></tr>";
        }
    }


    function listAdm_6() {//fonction de listage des échecs
        $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
        FROM eleve,note,matiere,ecole
        WHERE eleve.numEleve=note.num_eleve AND note.num_mat=matiere.numMat
        GROUP BY eleve.numEleve
        HAVING moyenne>=12";
        $result = lists($sql);
        foreach($result as $x) {
            echo "<tr><td>". $x["numEleve"] . "</td>";
            echo "<td>" . $x["nom"] . "</td>";
            echo "<td>" . $x["prenom"] . "</td>";
            echo "<td>". $x["design"] . "</td>";
            $moyenne = $x["moyenne"];
            $moyenne = number_format($moyenne,2);
            echo "<td>$moyenne</td></tr>";
        }
    }

    function search() {
        $search  = $_POST["search"];
        if(isset($search) && !empty($search)) {
            $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
            FROM eleve,note,matiere,ecole
            WHERE eleve.nom LIKE '%$search%' OR eleve.prenom LIKE '%$search%'";
            $result = lists($sql);
            if(!empty($result)) {
                foreach($result as $x) {
                    echo "<tr><td>". $x["numEleve"] . "</td>";
                    echo "<td>" . $x["nom"] . "</td>";
                    echo "<td>" . $x["prenom"] . "</td>";
                    echo "<td>". $x["design"] . "</td>";
                    $moyenne = $x["moyenne"];
                    if($moyenne !== null) {
                        $moyenne = number_format($moyenne,2);
                        echo "<td>$moyenne</td></tr>";
                    }
                }
            } else {
                echo "<tr><td>Aucun résultat</td></tr>";
            }
        } else {
            echo "<tr><td>Veuiller entrer un nom!</td></tr>";
        }
    }

    function classement() {
        $delib = $_POST["delib"];
        $delib = empty($delib) ? 10 : (float)$_POST["delib"];
        $sql = "SELECT eleve.numEleve, eleve.nom, eleve.prenom, eleve.numEcole, ecole.design, SUM(matiere.coef*note.note)/SUM(matiere.coef) AS moyenne
        FROM eleve,note,matiere,ecole
        WHERE eleve.numEleve=note.num_eleve AND note.num_mat=matiere.numMat
        GROUP BY eleve.numEleve ORDER BY moyenne DESC";
        $result = lists($sql);
        foreach($result as $x) {
            echo "<tr><td>". $x["numEleve"] . "</td>";
            echo "<td>" . $x["nom"] . "</td>";
            echo "<td>" . $x["prenom"] . "</td>";
            echo "<td>". $x["design"] . "</td>";
            $moyenne = $x["moyenne"];
            $moyenne = number_format($moyenne,2);
            if($moyenne < $delib) {
                echo "<td>Insuffisant</td>";
            } else if(($moyenne >= $delib) && ($moyenne < 10)) {
                echo "<td>Admis après Délibération</td>";
            } else if(($moyenne >= 10) && ($moyenne < 12)) {
                echo "<td>Passable</td>";
            } else if(($moyenne >= 12) && ($moyenne < 14)) {
                echo "<td>Assez-Bien</td>";
            } else if(($moyenne >= 14) && ($moyenne < 16)) {
                echo "<td>Bien</td>";
            } else if(($moyenne >= 16) && ($moyenne < 18)) {
                echo "<td>Très Bien</td>";
            } else if(($moyenne >= 18) && ($moyenne < 20)) {
                echo "<td>Excellent</td>";
            }
        }
    }
?>