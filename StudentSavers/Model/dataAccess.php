<?php
require_once "offer.php"; 

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_user = "k";
$db_name = "db_k";
$db_password = "";
$pdo = new PDO("mysql:host=localhost;dbname=$db_name", $db_user, $db_password);

define('IMAGE_BASE_URL', 'http://kunet.uk/k2122702/StudentSavers/uploads/');

function getAllOffers() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM offers');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, 'Offer');
}

// Test 1 
/*
function testGetAllOffers() {
    $offers = getAllOffers();
    if (count($offers) > 0) {
        echo "testGetAllOffers: PASS\n";
    } else {
        echo "testGetAllOffers: FAIL\n";
    }
}
*/


function getOffersBySearch($search)
{
    global $pdo;
    $searchTerm = "%".trim($search)."%"; //trim function removes spaces before and after the search function
    $statement = $pdo->prepare('SELECT * FROM offers WHERE Name LIKE ? OR Description LIKE ? OR Location LIKE ? OR Discount LIKE ?');
    $statement->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
    $result = $statement->fetchAll(PDO::FETCH_CLASS, 'offer');
    return $result;
}

// Test 2
/*function testGetOffersBySearch() {
    $search = "Italian"; 
    $offers = getOffersBySearch($search);
    if (count($offers) > 0) {
        echo "testGetOffersBySearch: PASS\n";
    } else {
        echo "testGetOffersBySearch: FAIL\n";
    }
}*/

function addOffer(Offer $offer) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO offers (Name, Description, Location, Discount, DiscountCode, OfferImagePath) VALUES (?, ?, ?, ?, ?, ?)');
    $statement->execute([
        $offer->Name,
        $offer->Description,
        $offer->Location,
        $offer->Discount,
        $offer->DiscountCode,
        $offer->OfferImagePath
    ]);
}

function updateOffer(Offer $offer) {
    global $pdo;
    $sql = "UPDATE offers SET Name = ?, Description = ?, Location = ?, Discount = ?, DiscountCode = ?, OfferImagePath = ? WHERE ID = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        $offer->Name,
        $offer->Description,
        $offer->Location,
        $offer->Discount,
        $offer->DiscountCode,
        $offer->OfferImagePath,
        $offer->ID
    ]);
}

function checkUser($Admin)
{
  global $pdo;
  $statement = $pdo->prepare('SELECT * FROM admins WHERE email = ? AND password = ?');
  $statement->execute([$Admin->email,
                       $Admin->password]);
  $result = $statement->fetchAll(PDO::FETCH_CLASS, 'admin');
  return count($result) == 0; // will return false if there is a user
}

function Login($Admin)
{
  global $pdo;
  $statement = $pdo->prepare('SELECT * FROM admins WHERE email = ? AND password = ?'); 
  $statement->execute([$Admin->email,
                       $Admin->password]);
  $result = $statement->fetchAll(PDO::FETCH_CLASS, 'admin');
  return $result;
}

/*
//Test addOffer
function testAddOffer() {
    $offer = new Offer(); 
    $offer->Name = "Test Offer";
    $offer->Description = "Test Description";
    $offer->Location = "Test Location";
    $offer->Discount = "10%";
    $offer->DiscountCode = "TEST10";
    $offer->OfferImagePath = "http://path/to/image.jpg";

    // Save the current count of offers
    $initialCount = count(getAllOffers());

    // Add the new offer
    addOffer($offer);

    // Verify the count has increased by 1
    $newCount = count(getAllOffers());
    if ($newCount == $initialCount + 1) {
        echo "testAddOffer: PASS\n";
    } else {
        echo "testAddOffer: FAIL\n";
    }
}

testAddOffer();
*/



/*
//Test updateOffer
function testUpdateOffer() {
    global $pdo;

    try {
        // Start Transaction
        $pdo->beginTransaction();

        // Fetch the first offer to update
        $offers = getAllOffers();
        if (empty($offers)) {
            throw new Exception("No offers available for testing.");
        }
        
        $originalOffer = clone $offers[0]; // Make a copy of the original offer for later comparison/restoration if needed
        $offerToUpdate = $offers[0];
        $offerToUpdate->Name = "Updated Test Offer";
        
        // Update the offer
        updateOffer($offerToUpdate);

        // Refetch the updated offer to verify changes
        $updatedOffers = getAllOffers();
        $updatedOffer = $updatedOffers[0];
        
        if ($updatedOffer->Name == "Updated Test Offer") {
            echo "testUpdateOffer: PASS\n";
        } else {
            throw new Exception("testUpdateOffer: FAIL");
        }

        // Rollback changes for testing purpose
        $pdo->rollBack();

    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        $pdo->rollBack();
        echo "An error occurred: " . $e->getMessage() . "\n";
    }
}
// Call the test function
testUpdateOffer();
*/

?>

