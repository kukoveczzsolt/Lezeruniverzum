function kereses()
{
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("termek_kereso");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  gomb = document.getElementById("gomb");

  if(window.location.href.includes("#nev_kereses"))
  {
    for (i = 0; i < tr.length; i++) 
    {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) 
        {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) 
        {
            tr[i].style.display = "";
        } 
        else 
        {
            tr[i].style.display = "none";
        }
        }
    }
  }
  else if(window.location.href.includes("#kategoria_kereses"))
  {
    for (i = 0; i < tr.length; i++) 
    {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) 
        {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) 
        {
            tr[i].style.display = "";
        } 
        else 
        {
            tr[i].style.display = "none";
        }
        }
    }
  }
}