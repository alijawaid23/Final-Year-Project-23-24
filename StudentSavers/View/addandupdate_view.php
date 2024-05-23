<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Update Offers</title>
    <link rel="stylesheet" type="text/css" href="../View/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../View/script.js"></script>
</head>
<body class="add-update-page">
    <div class="header">
        <img src="../Image/studentSaversLogo.png" alt="Student Savers Logo" class="logo">
        <h1>Student Savers</h1>
    </div>

    <!-- Form content for adding offers -->
    <form action="addandupdate.php" method="POST" enctype="multipart/form-data">
        <h2>Add Offers</h2>
        <label>Store Name</label><br>
        <input name="Name" type="text" placeholder="Enter Name"><br>

        <label>Description</label><br>
        <input name="Description" type="text" placeholder="Enter Description"><br>
            
        <label>Location</label><br>
        <input name="Location" type="text" placeholder="Enter Location"><br>
          
        <label>Discount</label><br>
        <input name="Discount" type="text" placeholder="Enter Discount"><br>

        <label>DiscountCode</label><br>
        <input name="DiscountCode" type="text" placeholder="Enter DiscoutCode"><br>

        <label>Offer Image</label><br>
        <input name="OfferImage" type="file"><br>

        <button name="AddOffer" type="submit">Add Offer</button>
    </form>

    <!-- Form content for updating offers -->
    <form action="addandupdate.php" method="POST" enctype="multipart/form-data">
        <h2>Update Offer</h2>
        <label>ID</label><br>
        <input name="UpdateID" type="number" placeholder="Enter ID"><br>

        <label>Store Name</label><br>
        <input name="UpdateName" type="text" placeholder="Enter Name"><br>

        <label>Description</label><br>
        <input name="UpdateDescription" type="text" placeholder="Enter Description"><br>

        <label>Location</label><br>
        <input name="UpdateLocation" type="text" placeholder="Enter Location"><br>
          
        <label>Discount</label><br>
        <input name="UpdateDiscount" type="text" placeholder="Enter Discount"><br>

        <label>DiscountCode</label><br>
        <input name="UpdateDiscountCode" type="text" placeholder="Enter DiscountCode"><br>

        <label>Offer Image</label><br>
        <input name="UpdateOfferImage" type="file"><br>

        <button name="UpdateOffer" type="submit">Update Offer</button>
    </form>
</body> 
</html>

