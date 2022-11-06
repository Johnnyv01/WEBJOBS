<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
  <div class="container">
    <h2>Entrance Exams</h2>  
    <p>The following is the result of the entrance exams:</p>
    <button type="button" class="btn btn-default btn-lg" id="button1">Result</button>
    <div class="modal fade" id="newModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Selected Students</h4>
          </div>
          <div class="modal-body">
            <p>Rahul, Amit and Shweta cleared the exam.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#button1").click(function(){
     $("#newModal").modal("show");
  });
});
</script>

</body>
</html>