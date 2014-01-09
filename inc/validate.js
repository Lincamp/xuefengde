/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//document.write("<p>My First JavaScript</p>");
function validateForm()
{
    var x=document.forms["input"]["itemname"].value;
    if (x==null || x=="")
    {
        alert("Name of the item(s) must be filled out");
        return false;
    }
}


