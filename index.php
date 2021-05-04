<html>
<head>
	<title>JQuery Mobile Lab 2</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="jquery.mobile-1.4.5/jquery-1.11.1.min.js"></script>
	<script src="jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
	
	<ul id="mypetlist" data-role="listview">
		<li><a>This is an item 1</a></li>
		<li><a>This is an item 2</a></li>
		<li><a>This is an item 3</a></li>
		<li><a>This is an item 4</a></li>

	</ul>

	<a id="btnparrot" href="" class="ui-btn">Add a Parrot</a>
	<button class="ui-btn ui-icon-delete ui-btn-icon-left">Add a Dog</button>

	<script>
		//$(document): equal to Javascript document.
		//$(document).ready(...) called when this document is loaded
		$("#btnparrot").click(addParrot); //equivalent to Javascript document.getElementById("btnparrot").onclick = ...;

		function addParrot(){
			$("#mypetlist").append("<li><a>a Dog</a><button>View</button></li>").listview("refresh");
			
		}
	</script>
</body>
</html>