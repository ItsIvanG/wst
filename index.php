
<html>
<head>
<script>


function showCD(str) {
  if (str=="") {
    document.getElementById("a").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("a").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getcd.php?q="+str,true);
  xmlhttp.send();
}

function getArtists(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        document.getElementById("artistSelect").innerHTML=this.responseText;    }
  }
  xmlhttp.open("GET","getcd.php?g=artists",true);
  xmlhttp.send();
}

window.onload = function () {
      getArtists();
}
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  body {
    font-family: "Poppins", sans-serif;  
    text-align: center; 
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: linear-gradient(115deg, #ff6993 10%, #b81629 90%);
    align-items: center; /* Add this line to vertically center the content */
    min-height: 100vh; 
    }

  .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;  
  border-radius: 5px;
  background-color: white;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <form class="container">
      Select a CD:
        <select name="cds" onchange="showCD(this.value)" id="artistSelect">
        </select>
        <br><br>
        <div id="a"><b>CD info will be listed here...</b></div>
      </form>
    </div>
    <p style="color:white">Ivan Gonzales<br>BSIT 3DG2</p>
  </div>
</body>
</html>