function search($idInput, $idTable, $target) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById($idInput); // input
    filter = input.value.toUpperCase();
    table = document.getElementById($idTable); // table to search
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[$target]; // column to search in
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}