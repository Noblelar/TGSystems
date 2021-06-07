<?php
include "includes/header.php";
?>
<?php $action = "calc.php"; ?>

<div class="instart">
  <div class="info">
    <p>
      We are making available the grading system of some of the top Universities in Ghana to help student project their goals and map how to get there
    </p>
  </div>


  <br />
  <div class="container">
    <h3 align="center">Please select your Institution and Program </h3>
    <br />
    <form action="<?php echo $action;  ?>" method="get">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label> <?php echo strtoupper("Institution");  ?> </label>
            <select name="institution" id="institution" class="form-control input-lg" data-live-search="true" title="Select Your Institution">

            </select>
          </div>
          <div class="form-group">
            <label> <?php echo strtoupper("Program");  ?> </label>
            <select name="program" id="program" class="form-control input-lg" data-live-search="true" title="Select Your Program" required>

            </select>

            <input type="submit" name="submit" value="Proceed" id="proceed">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


<?php include "includes/footer.php"; ?>

<script>
  $(document).ready(function() {

    $('#institution').selectpicker();

    $('#program').selectpicker();

    load_data('category_data');

    function load_data(type, category_id = '') {
      $.ajax({
        url: "includes/load_data.php",
        method: "POST",
        data: {
          type: type,
          category_id: category_id
        },
        dataType: "json",
        success: function(data) {
          var html = '';
          for (var count = 0; count < data.length; count++) {
            html += '<option class="greatest" value="' + data[count].id + '">' + data[count].name + '</option>';
          }
          if (type == 'category_data') {
            $('#institution').html(html);
            $('#institution').selectpicker('refresh');
          } else {
            $('#program').html(html);
            $('#program').selectpicker('refresh');
          }
        }
      })
    }

    $(document).on('change', '#institution', function() {
      var category_id = $('#institution').val();
      load_data('sub_category_data', category_id);
    });

  });
</script>
<script>
  setDat();
  setStartBg();
</script>