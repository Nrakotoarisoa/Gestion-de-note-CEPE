<?php
    require_once "./app/Models/Model.php";     

    function updateEleve() {//Modifier les élèves
        global $conn;
        $matr = $_POST["matricule"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $sqlEleve = "UPDATE eleve SET nom='$nom',prenom='$prenom' WHERE numEleve='$matr'";
        update($sqlEleve);

        $countMat = "SELECT * FROM matiere";
        $result = mysqli_query($conn, $countMat);
        foreach( $result as $row ) {
            $designMat = $row["designMat"];
            $codemat = $row["numMat"];
            $note = $_POST["$designMat"];
            $sqlNote = "UPDATE note SET note='$note' WHERE num_eleve='$matr' AND num_mat='$codemat'";
            update($sqlNote);
        }
    }

    function updateMat() {//Modifier les matières
        $code = $_POST["code"];
        $design = $_POST["design"];
        $coef = $_POST["coef"];
        $sql = "UPDATE matiere SET designMat='$design', coef='$coef' WHERE numMat='$code'";
        update($sql);
    }
    

    function updateschool() {//Modifier les écoles
        $id = $_POST["id"];
        $design = $_POST["design"];
        $adresse = $_POST["adresse"];
        $sql = "UPDATE ecole SET design='$design', adresse='$adresse' WHERE numEcole='$id'";
        update($sql);
    }
?>