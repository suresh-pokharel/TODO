

<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" type="text/css" href="alertify/css/main.css"> -->
<!--   <link rel="stylesheet" type="text/css" href="alertify/css/alertify.bootstrap.css"> -->
  <link rel="stylesheet" type="text/css" href="alertify/css/alertify.core.css">
  <link rel="stylesheet" type="text/css" href="alertify/css/alertify.default.css">
  <!-- <link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">  -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>TODO List Management using Bootstrap, PHP, MySql, AJAX, JQuery, Alertify JS</title>
</head>
<body>
  <br><br>

  <div class="container" >
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success" role="alert">
           <h4>TODO List Management using Bootstrap, PHP, MySql, AJAX, JQuery, Alertify JS</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div id="list" class="col-md-8 col-md-offset-2">  
        <?php include 'list.php' ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="input-group">
          <input type="text" class="form-control" id="txtNewItem" placeholder="Description of New Item">
          <span class="input-group-btn">
            <button class="btn btn-primary" id="addButton" onclick="return validateForm();" type="button">Add New</button>
          </span>
        </div><!-- /input-group -->
      </div>
    </div>
   <!--  <div>
      <button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button>
    </div> -->
  </div>

  

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/core.js"></script> -->
  <script src="alertify/js/alertify.min.js"></script>

  <script>

    function validateForm(){
      var val=document.getElementById("txtNewItem").value;
      if (val.length<20) {
        alertify.error("Item description must contains at least 20 characters");
        return false;
      }else{
        InsertItemInDatabase();

      }
    }


    function validateEdit(desc){
      var desc=document.getElementById("txtNewItem").value;
      if (desc.length<20) {
        alertify.error("Item description must contains at least 20 characters");
        return false;
      }else{
        return true;

      }
    }



  </script>

  <script>
  // $(function(){
  //     $('.delete-button').on("click",function(){
  //       var id= $(this).attr('id');
  //     alertify.confirm("Are you sure to delete this item?", function (e) {
  //       if (e) {
  //         DeleteItem(id);
  //       } else {
  //         //alertify.error("You've clicked Cancel");
  //       }
  //     });
        
  //     })
  // });


    

    function InsertItemInDatabase() {
      //for spinner
        var buttonString= "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate' id='spinner'></span> "+$('#addButton').html();
        $('#addButton').html(buttonString);
      
      var new_desc=document.getElementById("txtNewItem").value;
      document.getElementById("txtNewItem").value="";
      $.ajax({
        url:'process.php?insert_description=' + new_desc,
        complete: function (response) {
          var status = JSON.parse(response.responseText);
               // console.log(response);
               if(status.status =="success"){
                alertify.success("New item has been added successfully");
              }else if(status.status =="error"){
                alertify.error("Error while adding the item");
              }
                  $( "#list" ).load( "list.php");// to reload the todo list from database
                  $( "#spinner" ).remove();//remove spinner as task is completed
                },
                error: function () {
                  //$('#output').html('Bummer: there was an error!');
                  //alertify.error("Error while adding the item");
                },
              });

    }


      //delete

      function DeleteItem(id) {
        alertify.confirm("Are you sure to delete this item?", function (e) {
          if (e) {
            //for spinner
            var buttonString= "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate' id='spinner'></span> "+$('#delete_'+id).html();
            $('#delete_'+id).html(buttonString);

            $.ajax({
              url:'process.php?delete_id=' + id,
              complete: function (response) {
                     var status = JSON.parse(response.responseText);//parsing status from response received from php
                     if(status.delete_status =="success"){
                      alertify.success("Item Deleted");
                           $( "#list" ).load( "list.php" );// to reload the todo list from database
                         }else if(status.delete_status =="error"){
                          alertify.error("Error while deleting the item");
                        }
                      },
                      error: function () {
                        $('#output').html('Bummer: there was an error!');
                      },
                    });
          }
        });
      }


      //edit
      function EditItem(id) {
        $.ajax({
          url:'process.php?edit_id=' + id,
          complete: function (response) {
                var status = JSON.parse(response.responseText);//parsing status from response received from php
                if(status.edit_status =="success"){
                  alertify.success("Item Deleted");
                      $( "#list" ).load( "list.php" );// to reload the todo list from database
                    }else if(status.edit_status =="error"){
                      alertify.error("Error while deleting the item");
                    }
                  },
                  error: function () {
                    $('#output').html('Bummer: there was an error!');
                  },
                });
      }


      function checks(id,desc){
        //var id= $(this).attr('id');
        alertify.prompt("Edit List Item, ID="+id, function (e, str) {
        if (e) {
            if (str.length>20) {
              /*change on database if edited text is valid*/
          //for spinner
            var buttonString= "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate' id='spinner'></span> "+$('#edit_'+id).html();
            $('#edit_'+id).html(buttonString);
            
              $.ajax({
                url:'process.php',
                data : {edit_id:id, new_desc:str},
                complete: function (response) {
                var status = JSON.parse(response.responseText);//parsing status from response received from php
                if(status.edit_status =="success"){
                  alertify.success("Information updated successfully");
                      $( "#list" ).load( "list.php" );// to reload the todo list from database
                      $( "#spinner" ).remove(); //remove spinner as task is completed
                    }else if(status.edit_status =="error"){
                      alertify.error("Error while editing the item");
                    }
                  },
                  error: function () {
                    $('#output').html('Bummer: there was an error!');
                  },
                });
              
              //alertify.success("Valid");
              /*--if valid ends*/
             }else{
              alertify.error("Item description must contains at least 20 characters. No changes has been made");
             }
        } else {
            //alertify.error("You pressed cancel");
        }
      }, desc);
  }
  </script>
  </body>
  </html>





