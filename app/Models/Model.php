<?php
    require "./config.php";

    function lists($sql) { //fonction de listage
        global $conn;
        $list = [];
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $list[] = $row;
            }
        }
        return $list;
    }

    function get_note($matr) {//fonction de listage des notes
        global $conn;
        $sql = "SELECT * FROM note LEFT JOIN matiere ON note.num_mat=matiere.numMat WHERE note.num_eleve=" . $matr;
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $listnote[$row["designMat"]] = [//creation de tableau associative par matière
                    "codeMat" => $row["num_mat"],
                    "designMat" => $row["designMat"],
                    "coef"=> $row["coef"],
                    "note"=> $row["note"],
                    "pondere" => $row["note"] * $row["coef"]
                ];
            }
        } else {
            $listnote = ["Cet élève n'a pas de note"];
            echo "<td>$listnote[0]</td>";
        }
        return $listnote;
    }

    function update($sql) {//fontion de creation,modification et suppression
        global $conn;
        
        if(!mysqli_query($conn,$sql)) {
            echo "<div class='alert alert-danger alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                <strong>Échec de la modification!</strong></div>";
        } else {
            echo "<div class='alert alert-success alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                    <strong>Modifié avec succès!</strong></div>";
        }
    }

    function create($sql) {
        global $conn;

        if(mysqli_query($conn,$sql)) {
            echo "<div class='alert alert-success alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                <strong>Ajouter avec succès!</strong></div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                    <strong>Echec de l'ajout!</strong></div>";
        }
    }

    function supp($sql) {
        global $conn;

        if(mysqli_query($conn,$sql)) {
            echo "<div class='alert alert-success alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                <strong>Supprimer avec succès!</strong></div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible><button type='button' class='btn btn-close' data-bs-dismissible='alert'></button>
                    <strong>Echec de la suppression!</strong></div>";
        }
    }
?>