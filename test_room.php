<!DOCTYPE html>
<html>
<body>

Name: <input type="text" id="myText" value="TEST">

<p>Click the button to change the value of the text field.</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
    a= 11;
  document.getElementById("myText").value = a;
}
</script>

</body>
</html>
