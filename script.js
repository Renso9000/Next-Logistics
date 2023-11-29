function toggleTable() {
    // Get the selected table name from the dropdown
    var selectedTable = document.getElementById("tableSelector").value;

    // Hide all tables
    var tables = document.querySelectorAll('.table-container');
    tables.forEach(function(table) {
        table.style.display = 'none';
    });

    // Show the selected table
    var selectedTableDiv = document.getElementById(selectedTable + "Table");
    var selectedData = document.getElementById(selectedTable + "Data");
    if (selectedTableDiv) {
        selectedTableDiv.style.display = 'table';
    }
    if(selectedData) {
        selectedData.style.display = 'table';
    }
}

// Search options for project-table
document.getElementById("projectSearch").addEventListener("input", function () {
    searchTable("projectData", this.value);
});

// Search options for projectdata-table
document.getElementById("projectDataSearch").addEventListener("input", function () {
    searchTable("projectDataData", this.value);
});

// Search options for projectusers-table
document.getElementById("projectUsersSearch").addEventListener("input", function () {
    searchTable("projectUsersData", this.value);
});

// Search options for users-table
document.getElementById("usersSearch").addEventListener("input", function () {
    searchTable("usersData", this.value);
});

// Search prompt function for admin-page
function searchTable(tableId, searchText) {
    var table, rows, cell, i, j;
    table = document.getElementById(tableId);
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < rows.length; i++) {
        var found = false;
        cells = rows[i].getElementsByTagName("td");
        for (j = 0; j < cells.length; j++) {
            cell = cells[j];
            if (cell.innerText.toLowerCase().includes(searchText.toLowerCase())) {
                found = true;
                break;
            }
        }
        rows[i].style.display = found ? "" : "none";
    }
}

