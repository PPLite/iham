<!DOCTYPE html>
<html>
<body>

Field1: <input type="hidden" id="field1" value="9999"><br>
Field2: <input type="text" id="field2"><br><br>

<button onclick="myFunction()">Copy Text</button>

<p>A function is triggered when the button is clicked. The function copies the text from Field1 into Field2.</p>

<script>
function myFunction() {
  document.getElementById("field2").value = document.getElementById("field1").value;
}
</script>

</body>
</html>