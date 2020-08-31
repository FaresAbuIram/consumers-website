function searchElement() {
    let searchInput, searchText, table, tableBody, tr, i, td;

    searchInput = document.getElementById('search');
    searchText = searchInput.value;

    table = document.getElementById('table');
    tableBody = document.getElementsByTagName("tbody")[0];
    tr = tableBody.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[0];
        searchedElement = td.childNodes[0].nodeValue;

        if (searchedElement.indexOf(searchText) > -1)
            tr[i].style.display = "";
        else
            tr[i].style.display = "none";

    }
};