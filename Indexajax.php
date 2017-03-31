<?php
if(isset($_GET['State']))
{
    $niz=array("Srbija"=>"Beograd","Francuska"=>"Pariz","Engleska"=>"London","Spanija"=>"Madrid","Nemacka"=>"Berlin");
    echo $niz[$_GET['State']];
return;
}
?>
<script type="text/javascript">
function ajax(State)
{
    var xmlHttp;
    try{ //Proverava da li radi na operi,fireFox-u i Safariju
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    { //Zatim, ako inicijalizacija objekta nije uspesna , pokusava se sa Internet Explorerom (verzije 6+ pa 5+)
        try {xmlHttp=new ActiveXObject("Msxml12.XMLHTTP"); }
        catch (e)
        { try{ xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");} 
        catch (e)
        { // Ako ne uspe inicijalizacija, prijavljujemo gresku i zatvaramo funkciju}
        alert("inicijalizacija nije uspela"); return false;
        }
    }  
}

xmlHttp.onreadystatechange=function()
{
    if(xmlHttp.readyState==4)
    document.getElementById("glavniGrad").innerText=xmlHttp.responseText;
}
  xmlHttp.open("GET","indexajax.php?State="+State,true);
    xmlHttp.send(null);  
}
</script>
<select onchange="ajax(this.options[this.selectedIndex].value)">
<option>Select state:</option>
<option value="Srbija">Serbia</option>
<option value="Francuska">Francuska</option>
<option value="Engleska">England</option>
<option value="Spanija">Spain</option>
<option value="Nemacka">Germany</option>
</select>
<br>
Capital:<div id="glavniGrad"></div>