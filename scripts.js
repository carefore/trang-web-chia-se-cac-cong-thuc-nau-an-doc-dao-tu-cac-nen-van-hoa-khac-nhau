$(document).ready(function() {
  $('#recipeForm').submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    
    $.ajax({
      type: 'POST',
      url: 'save_recipe.php',
      data: formData,
      success: function(response) {
        $('#recipeList').append(response);
        $('#recipeForm')[0].reset();
      }
    });
  });

  // Load existing recipes when the page loads
  $.ajax({
    type: 'GET',
    url: 'get_recipes.php',
    success: function(response) {
      $('#recipeList').html(response);
    }
  });
});
