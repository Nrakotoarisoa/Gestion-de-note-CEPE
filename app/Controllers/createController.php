<?php
    require_once "./app/Models/Model.php";

    function createStudent() {
        global $conn;
        $matr = $_POST["matricule"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $etablissement = $_POST["etablissement"];
        $sqlEleve = "INSERT INTO eleve VALUES('$matr','$nom','$prenom','$etablissement')";
        create($sqlEleve);

        $countMat = "SELECT * FROM matiere";
        $result = mysqli_query($conn, $countMat);
        foreach( $result as $row ) {
            $designMat = $row["designMat"];
            $codemat = $row["numMat"];
            $note = (float)$_POST["$designMat"];
            $sqlNote = "INSERT INTO note(num_eleve,num_mat,note) VALUES('$matr','$codemat',$note)";
            create($sqlNote);
        }
    }

    function createMatiere() {
        global $conn;
        $codemat = $_POST["code"];
        $design = $_POST["design"];
        $coef = $_POST["coef"];
        $sql = "INSERT INTO matiere VALUES('$codemat','$design',$coef)";
        create($sql);
        $countEleve = "SELECT numEleve FROM eleve";
        $result = mysqli_query($conn, $countEleve);
        foreach( $result as $row ) {
            $numeleve = $row["numEleve"];
            $sql = "INSERT INTO note(num_eleve,num_mat,note,anneScolaire) VALUES('$numeleve','$codemat','0','2022-2023')";
            mysqli_query( $conn, $sql);
        }
    }

    function createSchool() {
        $id = $_POST["id"];
        $design = $_POST["design"];
        $adresse = $_POST["adresse"];
        $sql = "INSERT INTO ecole VALUES('$id','$design','$adresse')";
        create($sql);
    }
?>