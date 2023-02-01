<select name="" onchange="myFunction(event)" id="select1">
    <option disabled selected>Choose Database Type</option>
    <option value="Green">green</option>
    <option value="Red">red</option>
    <option value="Orange">orange</option>
    <option value="Black">black</option>
</select>


<select name="" onchange="myFunction(event)" id="select2">
    <option disabled selected>Choose Database Type</option>
    <option value="Green">green</option>
    <option value="Red">red</option>
    <option value="Orange">orange</option>
    <option value="Black">black</option>
</select>

<input id="myText" type="text" value="colors">

<script src="">
    

function myFunction(e) {

var select1=document.getElementById("select1").value
var select2=document.getElementById("select2").value
document.getElementById("myText").value = select1+select2

    
}
</script>