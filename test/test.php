<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Using variables</title>
<script language=”javascript”>
var counter1 = 0;
function displayText()
{
var counter2 = 0;
counter1 = counter1++;
counter2 = counter2++;
document.getElementById('targetDiv').innerHTML =
"First counter equals " + counter1 + "<br>" +
"But the second counter is still stuck at " + counter2;
}
</script>
</head>
<body onclick="displayText()">
<h1>Using variables (Click Me!)</h1>
<div id="targetDiv">
</div>
</body>
</html>
