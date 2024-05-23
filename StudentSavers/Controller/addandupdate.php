<?php
require_once "../Model/offer.php";
require_once "../Model/dataAccess.php";

session_start();

function uploadFile($inputName) {
    $target_dir = "/var/www/html/k2122702/StudentSavers/uploads/"; //sepcifies the directory path 
    $target_file = $target_dir . basename($_FILES[$inputName]["name"]); //appends the directory path with the file name 
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //lowers the case for file extension

    // ... file size and type checks ...
    
    //file validation process

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES[$inputName]["name"])) . " has been uploaded.";
            return IMAGE_BASE_URL . basename($_FILES[$inputName]["name"]);//moves the uploaded file from the temporary location to the uplaods folder and returns the URL  
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

if (isset($_POST["AddOffer"])) {
    $offer = new Offer();
    $offer->Name = $_POST["Name"];
    $offer->Description = $_POST["Description"];
    $offer->Location = $_POST["Location"];
    $offer->Discount = $_POST["Discount"];
    $offer->DiscountCode = $_POST["DiscountCode"];

    $fileUrl = uploadFile("OfferImage");
    if ($fileUrl) {
        $offer->OfferImagePath = $fileUrl;
        addOffer($offer);
    }
}

if (isset($_POST["UpdateOffer"])) {
    $offer = new Offer();
    $offer->ID = $_POST["UpdateID"];
    $offer->Name = $_POST["UpdateName"];
    $offer->Description = $_POST["UpdateDescription"];
    $offer->Location = $_POST["UpdateLocation"];
    $offer->Discount = $_POST["UpdateDiscount"];
    $offer->DiscountCode = $_POST["UpdateDiscountCode"];

    $fileUrl = uploadFile("UpdateOfferImage");
    if ($fileUrl) {
        $offer->OfferImagePath = $fileUrl;
    } else {
       
        $currentOffer = getOfferByID($offer->ID);  // If no new file was uploaded, fetch and retain the old image path
        $offer->OfferImagePath = $currentOffer->OfferImagePath;
    }

    updateOffer($offer);
}


require_once "../View/addandupdate_view.php";
?>

