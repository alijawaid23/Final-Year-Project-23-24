function showDiscountCode(discountCode) {
    alert("Your discount code: " + discountCode);
    
    // Simulate star rating using prompt
    var starRating = prompt("Please rate this offer (1-5 stars):\n☆☆☆☆☆\nClick 'OK' after selecting your rating.", "★★★★★");
  
    // Check if a rating was given
    if(starRating !== null) {
      var ratingValue = (starRating.match(/★/g) || []).length;
      alert("You rated this offer " + ratingValue + " out of 5. Thank you for your feedback!");
    }
  }
  



  
  
      
