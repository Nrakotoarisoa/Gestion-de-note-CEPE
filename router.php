<?php
    require_once "app/Controllers/listController.php";

    $page = $_GET["page"] ?? "home";

    switch ($page) {
        case "home":
            require_once "app/Controllers/deleteController.php";
            require "app/Views/home.php";
            break;
        case "school":
            require_once "app/Controllers/deleteController.php";
            require "app/Views/school.php";
            break;
        case "matiere":
            require_once "app/Controllers/deleteController.php";
            require "app/Views/matiere.php";
            break;
        case "resultats":
            require "app/Views/resultats.php";
            break;
        case "about":
            require "app/Views/about.php";
            break;
        case "searchresult":
            require "app/Views/searchresult.php";
            break;
        case "editAbout":
            require_once "app/Controllers/updateController.php";
            require "app/Views/editAbout.php";
            break;
        case "editMatiere":
            require_once "app/Controllers/updateController.php";
            require "app/Views/editMatiere.php";
            break;
        case "editSchool":
            require_once "app/Controllers/updateController.php";
            require "app/Views/editSchool.php";
            break;
        case "addStudent":
            require_once "app/Controllers/createController.php";
            require "app/Views/addStudent.php";
            break;
        case "addmatiere":
            require_once "app/Controllers/createController.php";
            require "app/Views/addmatiere.php";
            break;
        case "addSchool":
            require_once "app/Controllers/createController.php";
            require "app/Views/addSchool.php";

        case "exportPdf":
             require_once "app/Controllers/listController.php";
             require "app/Views/exportPdf.php";
             break;
        default :
            echo "Page not found";
    }
?>