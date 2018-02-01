<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<title>MAZE UF</title>
<link rel="stylesheet" type="text/css" href="maze-css.css">
<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Orbitron" rel="stylesheet">
<header>
	<img id="logga" src="MaZe-UF-logga-vit.png" alt="logga">
  </header>
</head>
<body>
<div class="ram">
<div id="header">
<div>


<ul class="meny">
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Meny</a>
    <div class="dropdown-content" id="myDropdown">
      <a href="maze.html">Hem</a>
	  <a href="1.html">LAN</a>  
      <a href="2.html">Boka Här</a>
      <a href="3.html">Personal</a>

    </div>
  </li>
</ul>
</div>
</div>
<h1>LAN</h1>
</div>


<script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>
<footer> <p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p> </footer>
</html>