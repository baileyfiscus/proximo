<?php 
$msg = "";
if(isset($_POST["upload"])){

    $db = mysqli_connect("localhost","root","","bookedData");
    //$firstname = $_POST['firstname'];
    //$lastname = $_POST['lastname'];
    $isbn13 = $_POST['isbn13'];


    $sql = "INSERT INTO bookedData (isbn13)
     VALUES ('$isbn13')";
    mysqli_query($db,$sql);
}

 ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="panda.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>

  <div class="currentLocation">
    <p>Post</p>
  	<p id="demo"></p>
  </div>
  <div class="feed" id="myDIV">
  	
  <form action="index.php" method="post"> 
    </div>
    <div class="post">
    	<div class="input-group mb-3">
        <input name="isbn13" id="Post" type="text" class="form-control" row="4" placeholder="Enter in a Post!" aria-label="Enter a post!" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button id="button" class="btn btn-outline-secondary" onclick="getLocation()" type="button">Post</button>
        </div>
      </div>
      <div>
          <button type="button" id="name" class="btn btn-primary btn-lg btn-block" onclick="changeName()" >Change Name</button>
      </div>
    </div>
</form>

<script>
var name;
var nameCache = localStorage.getItem("nameCache");
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

    var text = document.getElementById("Post").value;
    localStorage.setItem("text", text);

    var para = document.createElement("P");
    para.innerHTML = nameCache + " : " + text;
    document.getElementById("myDIV").appendChild(para);

    document.getElementById('Post').value='';

  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function changeName() {
  var person = prompt("Please enter your name:", "");
  if (person == null || person == "") {
    name = "User cancelled the prompt.";
  } else {
    name = person;
    localStorage.setItem("nameCache", name);
  }
}
</script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = 
    {
      apiKey: "AIzaSyADXaLIDoKmazDp_ZxdzpLyP7B9H9C6gJ4",
      authDomain: "proximo-chat.firebaseapp.com",
      databaseURL: "https://proximo-chat.firebaseio.com",
      projectId: "proximo-chat",
      storageBucket: "proximo-chat.appspot.com",
      messagingSenderId: "458728229377"
    };
    firebase.initializeApp(config);
</script>

</body>
</html>
