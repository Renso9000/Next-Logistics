<?php
require_once 'dtb.php';

// Create instance for LogisticDB
$logisticDB = new LogisticDB();

// Fetch project-table
$projects = $logisticDB->getAllProjects();

// Fetch projectdata-atble
$projectsdata = $logisticDB->getAllProjectData();

// Fetch projectusers-table
$projectusers = $logisticDB->getAllProjectUsers();

// Fetch users-table
$users = $logisticDB->getAllUsers();

// Close database connection
$logisticDB->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Data</title>
    <style>
        table {
            display: none;
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .search-input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <label for="tableSelector">Select Table: </label>
    <select id="tableSelector" onchange="toggleTable()">
        <option value="project">Project</option>
        <option value="projectdata">ProjectData</option>
        <option value="projectusers">ProjectUsers</option>
        <option value="users">Users</option>
    </select>

    <div id="projectTable" class="table-container">
        <h2>Project</h2>
        <input type="text" class="search-input" id="projectSearch" placeholder="Search for projects...">
        <?php if (!empty($projects)) : ?>
            <table id="projectData" class='tabledata'>
                <!-- Table header -->
                <tr>
                    <?php foreach ($projects[0] as $key => $value) : ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach; ?>
                </tr>
                <!-- Table rows -->
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <?php foreach ($project as $value) : ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No projects found.</p>
        <?php endif; ?>
    </div>

    <div id="projectDataTable" class="table-container">
        <h2>ProjectData</h2>
        <?php if (!empty($projectsdata)) : ?>
            <input type="text" class="search-input" id="projectDataSearch" placeholder="Search for projectData...">
            <table id="projectDataData" class='tabledata'>
                <!-- Table header -->
                <tr>
                    <?php foreach ($projectsdata[0] as $key => $value) : ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach; ?>
                </tr>
                <!-- Table rows -->
                <?php foreach ($projectsdata as $projectdata) : ?>
                    <tr>
                        <td>
                            <?php echo $value; ?>
                            <form method="post" action="update_data.php">
                                <input type="hidden" name="projectData_id" value="<?php echo $projectdata['ProjectDataID']; ?>">
                                <input type="text" name="updated_data" placeholder="Enter updated data">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="deactivate_data.php">
                                <input type="hidden" name="projectData_id" value="<?php echo $projectdata['ProjectDataID']; ?>">
                                <button type="submit">Deactivate</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No projectData found.</p>
        <?php endif; ?>
    </div>

    <div id="projectUsersTable" class="table-container">
        <h2>ProjectUsers</h2>
         <input type="text" class="search-input" id="projectUsersSearch" placeholder="Search for projectusers...">
        <?php if (!empty($projectusers)) : ?>
            <table id="projectUsersData" class='tabledata'>
                <!-- Table header -->
                <tr>
                    <?php foreach ($projectusers[0] as $key => $value) : ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach; ?>
                </tr>
                <!-- Table rows -->
                <?php foreach ($projectusers as $projectuser) : ?>
                    <tr>
                        <?php foreach ($projectuser as $value) : ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No projectusers found.</p>
        <?php endif; ?>
    </div>

    <div id="usersTable" class="table-container">
        <h2>Users</h2>
        <input type="text" class="search-input" id="usersSearch" placeholder="Search for users...">
        <?php if (!empty($users)) : ?>
            <table id="usersData" class='tabledata'>
                <!-- Table header -->
                <tr>
                    <?php foreach ($users[0] as $key => $value) : ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach; ?>
                </tr>
                <!-- Table rows -->
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <?php foreach ($user as $value) : ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>

    <script src="script.js"></script>
    <script>
        // Set the default selected table and display it
        document.getElementById("tableSelector").value = "project";
        toggleTable();
    </script>

</body>
</html>