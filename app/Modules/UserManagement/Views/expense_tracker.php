<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMinder - Expense Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #9B3AA5, #E89EEF);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center; 
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%; 
        max-width: 1800px; 
        }
        .card-header {
            background: linear-gradient(to right, #9B3AA5, #E89EEF);
            color: white;
            border-radius: 1rem 1rem 0 0 !important;
            padding: 15px; 
            text-align: center; 
        }
        .btn-primary {
            background: linear-gradient(to right, #9B3AA5, #E89EEF);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #8B2A95, #D88EDF);
        }
        .form-control:focus {
            border-color: #9B3AA5;
            box-shadow: 0 0 0 0.2rem rgba(155, 58, 165, 0.25);
        }
        label {
            color: #9B3AA5;
        }
        .table-container {
            margin-top: 20px;
        }
        .card-body {
            padding: 30px; 
        }
        .container {
    max-width: 100%; 
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6"> 
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mb-0">Hello, <?=session()->get('username')?></h3>
                    </div>
                    <div class="card-body">
                        <form id="expense-form" method="post" action="/expense/create">
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
                                        <button type="submit" class="btn btn-info btn-sm view-btn">OK</button>
                                            <button type="submit" class="btn btn-info btn-sm view-btn">View</button>
                                            <button type="submit" class="btn btn-warning btn-sm edit-btn">Edit</button>
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="add-row-btn" class="btn btn-primary">Add New Expenditure</button>
                            <button type="button" id="add-row-btn" class="btn btn-primary" onclick="window.location.href='/expense/report'">View Report</button>

                            <hr>
                            <div>
                                <h4>Total Amount: $<span id="total-amount">0.00</span></h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                    <button type="submit" class="btn btn-info btn-sm view-btn">OK</button>
                        <button type="submit" class="btn btn-info btn-sm view-btn">View</button>
                        <button type="submit" class="btn btn-warning btn-sm edit-btn">Edit</button>
                        <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                        
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
