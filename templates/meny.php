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

	<ul class="meny">
	  <li class="dropdown">
		<a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Meny</a>
		<div class="dropdown-content" id="myDropdown">
		  <a href="/mazeuf/">Hem</a>
		  <a href="/mazeuf/lan/">LAN</a>  
		  <a href="/mazeuf/login/">Registrera</a>
		  <a href="/mazeuf/mazeuf/">Personal</a>
		</div>
	  </li>
	</ul>
