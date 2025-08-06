<?php
    require_once "app/Models/Model.php";

    function deleteStudent() {
        $matr = $_POST["matricule"];
        $sql = "DELETE FROM eleve WHERE numEleve='$matr'";
        supp($sql);
    }

    function deleteSchool() {
        $id = $_POST["id"];
        $sql = "DELETE FROM ecole WHERE numEcole='$id'";
        supp($sql);
    }

    function deleteMat() {
        $code = $_POST["code"];
        $sql = "DELETE FROM matiere WHERE numMat='$code'";
        supp($sql);
    }
?>