<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<main>
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">shop</span> AT RequiSite
    </div>
    <p class="nero__text"></p>
  </div>
</main>

<div id="content">
  <div class="container">
    <div class="col-md-12"></div>
    <div class="col-md-3">
      <?php 
      include("includes/sidebar.php");
      ?>
    </div>
    <div class="col-md-9">
      <?php getProducts(); ?>
      <center>
        <ul class="pagination">
          <?php getPaginator(); ?>
        </ul>
      </center>
    </div>
  </div>
</div>

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

  $(document).ready(function() {
    $('.nav-toggle').click(function() {
      $(".panel-collapse, .collapse-data").slideToggle(700, function() {
        if ($(this).css('display') == 'none') {
          $(".hide-show").html('Show');
        } else {
          $(".hide-show").html('Hide');
        }
      });
    });

    (function($) {
      $.fn.extend({
        filterTable: function() {
          return this.each(function() {
            $(this).on('keyup', function() {
              var $this = $(this),
                  search = $this.val().toLowerCase(),
                  target = $this.attr('data-filters'),
                  handle = $(target),
                  rows = handle.find('li a');

              if (search == '') {
                rows.show();
              } else {
                rows.each(function() {
                  var $this = $(this);
                  $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                });
              }
            });
          });
        }
    });

    $('[data-action="filter"][id="dev-table-filter"]').filterTable();
  })(jQuery);

});

</script>

<script>
  $(document).ready(function() {

    // getProducts Function Code Starts
    function getProducts() {

      // Manufacturers Code Starts
      var sPath = '';
      var aInputs = $('li').find('.get_manufacturer');
      var aKeys = [];
      var iKey = 0;

      $.each(aInputs, function(key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value;
        }
        iKey++;
      });

      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath += 'man[]=' + aKeys[i] + '&';
        }
      }
      // Manufacturers Code Ends

      // Products Categories Code Starts
      aInputs = $('li').find('.get_p_cat');
      aKeys = [];
      iKey = 0;

      $.each(aInputs, function(key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value;
        }
        iKey++;
      });

      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath += 'p_cat[]=' + aKeys[i] + '&';
        }
      }
      // Products Categories Code Ends

      // Categories Code Starts
      aInputs = $('li').find('.get_cat');
      aKeys = [];
      iKey = 0;

      $.each(aInputs, function(key, oInput) {
        if (oInput.checked) {
          aKeys[iKey] = oInput.value;
        }
        iKey++;
      });

      if (aKeys.length > 0) {
        for (var i = 0; i < aKeys.length; i++) {
          sPath += 'cat[]=' + aKeys[i] + '&';
        }
      }
      // Categories Code Ends

      // Loader Code Starts
      $('#wait').html('<img src="images/load.gif">');
      // Loader Code Ends

      // ajax Code Starts
      $.ajax({
        url: "load.php",
        method: "POST",
        data: sPath + 'sAction=getProducts',
        success: function(data) {
          $('#Products').html('');
          $('#Products').html(data);
          $("#wait").empty();
        }
      });

      $.ajax({
        url: "load.php",
        method: "POST",
        data: sPath + 'sAction=getPaginator',
        success: function(data) {
          $('.pagination').html('');
          $('.pagination').html(data);
        }
      });
      // ajax Code Ends
    }
    // getProducts Function Code Ends

    $('.get_manufacturer').click(function() {
      getProducts();
    });

    $('.get_p_cat').click(function() {
      getProducts();
    });

    $('.get_cat').click(function() {
      getProducts();
    });

  });
</script>



</body>
</html>
