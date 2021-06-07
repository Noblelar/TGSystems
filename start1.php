<?php
?>
<?php $action = "calc.php"; ?>

<style>
  .school {
    width: 100%;
    height: 130px;
  }

  .crestArea {
    height: 100px;
    width: 100%;
    /* background-image: url(images/crests/umatlogo.jpg); */
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  .mother {
    display: flex;
  }

  .mother {
    flex-direction: column-reverse;
  }


  @media only screen and (min-width: 768px) {
    #changeData {
      max-width: 1000px;
    }

    .school {
      width: 20%;
      height: 220px;
    }

    .crestArea {
      width: 100%;
      height: 220px;
      /* margin-left: -120px; */
    }

    .mother {
      flex-direction: row;
    }

    form {
      width: 100%;
    }

    form>div>div {
      display: flex;
      width: 100%;
    }

    form>div>div {
      justify-content: space-evenly;
    }
  }

  @media only screen and (max-width: 767px) {
    table {
      max-width: 700px;
      font-size: 1em;
    }
  }
</style>

<?php

$instLogo = "SELECT * FROM institutions WHERE inst_id = $institution";
$logoResult = mysqli_query($connection, $instLogo);
$instDetails = mysqli_fetch_array($logoResult);
?>

<br />

<div class="mother">
  <div class="container" id="changeData">
    <h3 align="center">Please select your Institution and Program </h3>
    <br />
    <form action="" method="get">
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

          </div>
        </div>
        <input type="submit" name="submit" value="Proceed" id="proceed">
      </div>
    </form>
  </div>
  <?php
  if ($instDetails["logo"] != null) {
    $logo = $instDetails["logo"];
  ?>
    <div class="school">
      <p> <?php echo $instDetails['Inst_name']; ?> </p>
      <div class="crestArea" style="background-image: url('images/crests/<?php echo $logo ?>');">

      </div>

    </div>

  <?php
  } else {
    $logo = "";
  }
  ?>
</div>


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
            html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
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