<?php

// M
require_once "../Model/offer.php";
require_once "../Model/dataAccess.php";
session_start();

/*testGetAllOffers();*/ //Calling Test Function
/*testGetOffersBySearch();*/ //Calling Test Function 

if(isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $results = getOffersBySearch($searchTerm);
} 

else
{
    // otherwise
    $results = getAllOffers();
}


// V
require_once "../View/offerlist_view.php";


?>