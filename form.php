<?php
echo '
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<title>Enter Details</title>
<style>
.hidden{
  display:none;
}
</style>

<script>
function senddata()
{
var user = document.getElementById("username").value;
var thought=document.getElementById("thought").value;
var temp_obj={
"username":user,
"thought":thought
}
var data = JSON.stringify(temp_obj);
//alert(data);
var xhr = new XMLHttpRequest();

var data = "data=" +data;
//alert(data);
xhr.open("POST", "process.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.send(data);


xhr.onreadystatechange = function() {
  if (xhr.readyState === 4) {
    if (xhr.status === 200) {

      document.getElementById("suggestion").style.display="block";
      document.getElementById("suggestion").innerHTML = xhr.responseText;
    } else {
      alert("There was a problem with the request.");
    }
    window.location.href="index.php";
  }
}

}




</script>





</head>
<body class="flex items-center justify-center h-screen">
  <div class="w-full max-w-xs">
  <center> <label class="block text-gray-700 text-lg font-bold mb-2" for="file">
          Fill Below Details
        </label></center>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Username
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Enter your thought
        </label>
        <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="thought" type="text" placeholder="Your thoughts go here.....">
        <!--<p class="text-red-500 text-xs italic">Please choose a password.</p>-->
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
          Upload Image
        </label>
        <div class="relative border-dashed border-2 border-gray-400 rounded w-full py-2 px-3 flex justify-center items-center">
          <input type="file" class="opacity-0 absolute z-[-1] w-full h-full">
          <div class="text-center">
            <p class="text-gray-700">Drag and drop your file here</p>
            <p class="text-gray-700">or</p>
            <p class="text-blue-500">Browse</p>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="senddata();">
          Post
        </button>
       
      </div>

    </form>
    <div id="suggestion" class="hidden bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
  <p class="font-bold">Success</p>
  
</div>
    <p class="text-center text-gray-500 text-xs">
      &copy;2023 RajathKunder. All rights reserved.
    </p>
  </div>
</body>
</html>';
?>
