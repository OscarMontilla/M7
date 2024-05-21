<?php
$host = 'localhost';
$dbname = 'usuaris';
$user = 'postgres';
$password = 'root';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['query'])) {
        $query = trim($_POST['query']);
        $queryParts = explode(' ', $query);
        $operation = strtolower($queryParts[0]);
        $tableName = $queryParts[1] ?? '';

        switch ($operation) {
            case 'create':
                echo '<form id="create-form">
                    <div class="form-group">
                        <label for="table-name">Table Name:</label>
                        <input type="text" class="form-control" id="table-name" value="' . htmlspecialchars($tableName) . '" readonly>
                    </div>
                    <div id="columns">
                        <div class="form-group">
                            <label for="column-name">Column Name:</label>
                            <input type="text" class="form-control" name="column-names[]">
                            <label for="data-type">Data Type:</label>
                            <input type="text" class="form-control" name="data-types[]">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="addColumn()">Add Column</button>
                    <button type="submit" class="btn btn-primary">Create Table</button>
                </form>';
                break;

            case 'read':
                if ($queryParts[2] == 'all') {
                    $stmt = $pdo->query("SELECT * FROM $tableName");
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($rows) {
                        echo '<table class="table table-bordered"><thead><tr>';
                        foreach (array_keys($rows[0]) as $key) {
                            echo "<th>$key</th>";
                        }
                        echo '</tr></thead><tbody>';
                        foreach ($rows as $row) {
                            echo '<tr>';
                            foreach ($row as $value) {
                                echo "<td>$value</td>";
                            }
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo 'No data found.';
                    }
                } else {
                    $id = $queryParts[2];
                    $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE id = :id");
                    $stmt->execute(['id' => $id]);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        echo '<table class="table table-bordered"><thead><tr>';
                        foreach ($row as $key => $value) {
                            echo "<th>$key</th>";
                        }
                        echo '</tr></thead><tbody><tr>';
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        echo '</tr></tbody></table>';
                    } else {
                        echo 'No data found.';
                    }
                }
                break;

            case 'update':
                $id = $queryParts[2];
                $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE id = :id");
                $stmt->execute(['id' => $id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    echo '<form id="update-form">';
                    echo '<input type="hidden" name="table_name" value="' . htmlspecialchars($tableName) . '">';
                    echo '<input type="hidden" name="id" value="' . htmlspecialchars($id) . '">';
                    foreach ($row as $key => $value) {
                        echo '<div class="form-group">';
                        echo "<label for='$key'>$key:</label>";
                        echo "<input type='text' class='form-control' name='$key' value='$value'>";
                        echo '</div>';
                    }
                    echo '<button type="submit" class="btn btn-primary">Update Row</button>';
                    echo '</form>';
                } else {
                    echo 'No data found.';
                }
                break;

            case 'delete':
                $id = $queryParts[2];
                $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE id = :id");
                $stmt->execute(['id' => $id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    echo '<table class="table table-bordered"><thead><tr>';
                    foreach ($row as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    echo '</tr></thead><tbody><tr>';
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo '</tr></tbody></table>';
                    echo '<button id="delete-button" class="btn btn-danger" onclick="deleteRow(\'' . htmlspecialchars($tableName) . '\', ' . htmlspecialchars($id) . ')">Delete Row</button>';
                } else {
                    echo 'No data found.';
                }
                break;

            default:
                echo 'Invalid query.';
                break;
        }
    } elseif (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
               case 'create_table':
                $tableName = $_POST['table_name'];
                $columnNames = $_POST['column_names'];
                $dataTypes = $_POST['data_types'];
                $columns = [];
                foreach ($columnNames as $index => $columnName) {
                    $columns[] = "$columnName $dataTypes[$index]";
                }
                $columnsSql = implode(', ', $columns);
                $sql = "CREATE TABLE $tableName ($columnsSql)";
                try {
                    $pdo->exec($sql);
                    echo "Table $tableName created successfully.";
                } catch (PDOException $e) {
                    echo "Error creating table: " . $e->getMessage();
                }
                break;

            case 'update_row':
                parse_str($_POST['data'], $formData);
                $tableName = $formData['table_name'];
                $id = $formData['id'];
                unset($formData['table_name']);
                unset($formData['id']);
                $setParts = [];
                foreach ($formData as $key => $value) {
                    $setParts[] = "$key = :$key";
                }
                $setSql = implode(', ', $setParts);
                $sql = "UPDATE $tableName SET $setSql WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $formData['id'] = $id;
                try {
                    $stmt->execute($formData);
                    echo "Row updated successfully.";
                } catch (PDOException $e) {
                    echo "Error updating row: " . $e->getMessage();
                }
                break;

            case 'delete_row':
                $tableName = $_POST['table_name'];
                $id = $_POST['id'];
                $sql = "DELETE FROM $tableName WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                try {
                    $stmt->execute(['id' => $id]);
                    echo "Row deleted successfully.";
                } catch (PDOException $e) {
                    echo "Error deleting row: " . $e->getMessage();
                }
                break;

            default:
                echo 'Invalid action.';
                break;
        }
    } else {
        echo 'No valid POST data received.';
    }
}
?>

<script>
function addColumn() {
    $('#columns').append('<div class="form-group"><label for="column-name">Column Name:</label><input type="text" class="form-control" name="column-names[]"><label for="data-type">Data Type:</label><input type="text" class="form-control" name="data-types[]"></div>');
}

function deleteRow(tableName, id) {
    $.ajax({
        url: 'ajax_handler.php',
        type: 'POST',
        data: { 
            action: 'delete_row', 
            table_name: tableName, 
            id: id 
        },
        success: function(response) {
            $('#result').html(response);
        }
    });
}

function bindFormHandlers() {
    $('#create-form').on('submit', function(event) {
        event.preventDefault();
        const tableName = $('#table-name').val();
        const columnNames = $('input[name="column-names[]"]').map(function() { return $(this).val(); }).get();
        const dataTypes = $('input[name="data-types[]"]').map(function() { return $(this).val(); }).get();
        
        $.ajax({
            url: 'ajax_handler.php',
            type: 'POST',
            data: { 
                action: 'create_table', 
                table_name: tableName, 
                column_names: columnNames, 
                data_types: dataTypes 
            },
            success: function(response) {
                $('#result').html(response);
            }
        });
    });

    $('#update-form').on('submit', function(event) {
        event.preventDefault();
        const formData = $(this).serialize();
        
        $.ajax({
            url: 'ajax_handler.php',
            type: 'POST',
            data: { 
                action: 'update_row', 
                data: formData 
            },
            success: function(response) {
                $('#result').html(response);
            }
        });
    });
}

$(document).ready(function() {
    bindFormHandlers();
});
</script>
