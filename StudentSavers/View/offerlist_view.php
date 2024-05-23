<!doctype html>
<html>
<head>
  <title>Discounts</title>
  <link rel="stylesheet" type="text/css" href="../View/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="../View/script.js"></script>
</head>
<body>
  
  <!-- Top Bar Section -->
  <div class="top-bar">
    <div class="admin-portal-link">
      <a href="../Controller/adminlist.php">Admin Portal</a>
    </div>

    <div class="title-logo-container">
      <img src="../Image/studentSaversLogo.png" alt="Student Savers Logo" class="logo-image">
      <h1>Student Savers</h1>
    </div>
  </div>

  <!-- Search Section -->
  <div class="search-container">
    <form action="offerlist.php" method="POST" class="search-form">
      <input id="search" name="search" type="text" placeholder="Search any Product.." />
      <button type="submit" class="search-button">🔍</button>
    </form>
  </div>
  <a href="../Controller/offerlist.php">Clear search</a>

<!-- Offers Section -->
<div class="offers-section">
  <?php foreach ($results as $offer): ?>
    <div class="offer-card">
      <img src="<?= htmlspecialchars($offer->OfferImagePath) ?>" alt="<?= htmlspecialchars($offer->Name) ?>" class="offer-image"> <!-- Use the full URL from the database -->
      <div class="offer-details">
        <h2 class="offer-title"><?= htmlspecialchars($offer->Name) ?></h2>
        <p class="offer-description"><?= htmlspecialchars($offer->Description) ?></p>
        <p class="offer-location"><?= htmlspecialchars($offer->Location) ?></p>
        <p class="offer-discount"><?= htmlspecialchars($offer->Discount) ?> OFF</p>
        <button class="voucher-btn" onclick="showDiscountCode('<?= htmlspecialchars($offer->DiscountCode) ?>')">Get Voucher</button>
      </div>
    </div>
  <?php endforeach; ?>
</div>


  <!-- Rating Modal Section -->
  <div id="ratingModal" class="modal">
    <div class="modal-content">
      <span class="close-button">&times;</span>
      <span id="discountCode" class="discount-code"></span>
      <div id="star-rating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
      </div>
    </div>
  </div>

  <!-- Bottom Menu Bar Section -->
  <div class="icon-menu-bar">
    <a href="#" class="icon-link"><img src="../Image/Home.png" alt="Home" /></a>
    <a href="#" class="icon-link"><img src="../Image/Favourites.png" alt="Favorites" /></a>
    <a href="#" class="icon-link"><img src="../Image/Location.png" alt="Nearby" /></a>
    <a href="#" class="icon-link"><img src="../Image/Gifts.png" alt="Gifts" /></a>
    <a href="#" class="icon-link"><img src="../Image/Profile.png" alt="Profile" /></a>
  </div>

</body>
</html>


