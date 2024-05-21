<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Puedes agregar estilos personalizados aquí si es necesario */
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Database Operations</h2>
    <form id="db-form">
        <div class="form-group">
            <label for="query">Enter your query:</label>
            <input type="text" class="form-control" id="query" name="query" placeholder="e.g., create table_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="result" class="mt-4"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('#db-form').on('submit', function(event) {
        event.preventDefault();
        const query = $('#query').val();
        $.ajax({
            url: 'ajax_handler.php',
            type: 'POST',
            data: { query: query },
            success: function(response) {
                $('#result').html(response);
                bindFormHandlers();
            }
        });
    });
});

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
</script>
</body>
</html>
