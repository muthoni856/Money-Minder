<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMinder - Expense Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">MoneyMinder</h1>
        <div class="table-container">
            <form id="expense-form">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Expenditure / Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="expense-table-body">
                        <tr>
                            <td><input type="date" class="form-control" name="date[]"></td>
                            <td>
                                <select class="form-control" name="category[]">
                                    <option value="Food">Food</option>
                                    <option value="Transport">Transport</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Fun">Fun</option>
                                    <option value="Pet Food">Pet Food</option>
                                    <option value="Electricity">Electricity</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" name="amount[]" step="0.01"></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm view-btn">View</button>
                                <button type="button" class="btn btn-warning btn-sm edit-btn">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="add-row-btn" class="btn btn-primary">Add New Expenditure</button>
                <hr>
                <div>
                    <h4>Total Amount: $<span id="total-amount">0.00</span></h4>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateTotalAmount() {
                let total = 0;
                $('input[name="amount[]"]').each(function() {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#total-amount').text(total.toFixed(2));
            }

            $('#add-row-btn').click(function() {
                let newRow = `<tr>
                    <td><input type="date" class="form-control" name="date[]"></td>
                    <td>
                        <select class="form-control" name="category[]">
                            <option value="Food">Food</option>
                            <option value="Transport">Transport</option>
                            <option value="Clothes">Clothes</option>
                            <option value="Fun">Fun</option>
                            <option value="Pet Food">Pet Food</option>
                            <option value="Electricity">Electricity</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control" name="amount[]" step="0.01"></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm view-btn">View</button>
                        <button type="button" class="btn btn-warning btn-sm edit-btn">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                    </td>
                </tr>`;
                $('#expense-table-body').append(newRow);
            });

            $(document).on('input', 'input[name="amount[]"]', function() {
                updateTotalAmount();
            });

            $(document).on('click', '.delete-btn', function() {
                $(this).closest('tr').remove();
                updateTotalAmount();
            });

            // You can add handlers for 'View' and 'Edit' buttons as needed
        });
    </script>
</body>
</html>
