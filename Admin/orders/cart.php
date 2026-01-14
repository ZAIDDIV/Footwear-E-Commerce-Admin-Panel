<?php
// Include your database connection file
// require_once 'config/database.php';

// Fetch orders from database
// Replace this with your actual database query
$orders = []; // This will be populated from your database

// Example query (uncomment and modify according to your database structure):
/*
$query = "SELECT o.*, c.customer_name, c.customer_email, c.customer_phone 
          FROM orders o 
          LEFT JOIN customers c ON o.customer_id = c.id 
          ORDER BY o.created_at DESC";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Step 1</title>
    <!-- Corona Admin CSS -->
    <link rel="stylesheet" href="path/to/corona/css/style.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid page-body-wrapper">
        <!-- Include your sidebar here -->
        
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-bold mb-0">Order Management - Step 1</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders List Section -->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Current Orders</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price per Unit</th>
                                                <th>Total Cost</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // LEAVE THIS SPACE TO POPULATE FROM YOUR DATABASE
                                            // Example loop structure:
                                            /*
                                            foreach($orders as $order) {
                                                $order_id = $order['order_id'];
                                                $product_name = $order['product_name'];
                                                $quantity = $order['quantity'];
                                                $price_per_unit = $order['price'];
                                                $total_cost = $quantity * $price_per_unit;
                                                $customer_name = $order['customer_name'];
                                                $order_date = date('d M Y', strtotime($order['created_at']));
                                            ?>
                                                <tr>
                                                    <td class="font-weight-bold">#<?php echo $order_id; ?></td>
                                                    <td><?php echo $product_name; ?></td>
                                                    <td><?php echo $quantity; ?></td>
                                                    <td>$<?php echo number_format($price_per_unit, 2); ?></td>
                                                    <td class="font-weight-medium">$<?php echo number_format($total_cost, 2); ?></td>
                                                    <td><?php echo $customer_name; ?></td>
                                                    <td><?php echo $order_date; ?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" onclick="viewOrderDetails(<?php echo $order_id; ?>)">
                                                            View Details
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php 
                                            }
                                            */
                                            ?>
                                            
                                            <!-- Example static row (remove when connecting to database) -->
                                            <tr>
                                                <td class="font-weight-bold">#ORD001</td>
                                                <td>Sample Product</td>
                                                <td>2</td>
                                                <td>$50.00</td>
                                                <td class="font-weight-medium">$100.00</td>
                                                <td>John Doe</td>
                                                <td>14 Jan 2026</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" onclick="viewOrderDetails(1)">
                                                        View Details
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Dispatch & Delivery Details Section -->
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dispatch & Delivery Details</h4>
                                <div id="orderDetailsSection">
                                    <!-- This section will be populated when an order is selected -->
                                    
                                    <?php
                                    // LEAVE THIS SPACE TO FETCH SPECIFIC ORDER DETAILS
                                    // When user clicks "View Details", populate this section
                                    // You can use AJAX or PHP GET parameter
                                    
                                    $selected_order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;
                                    
                                    if($selected_order_id) {
                                        // Fetch specific order details from database
                                        /*
                                        $detail_query = "SELECT * FROM order_details WHERE order_id = ?";
                                        $stmt = $conn->prepare($detail_query);
                                        $stmt->bind_param("i", $selected_order_id);
                                        $stmt->execute();
                                        $order_detail = $stmt->get_result()->fetch_assoc();
                                        */
                                    ?>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Parcel Number</label>
                                                <input type="text" class="form-control" name="parcel_no" 
                                                       value="<?php /* echo $order_detail['parcel_no']; */ ?>" 
                                                       placeholder="Enter tracking number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dispatch Date</label>
                                                <input type="date" class="form-control" name="dispatch_date" 
                                                       value="<?php /* echo $order_detail['dispatch_date']; */ ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expected Delivery Date</label>
                                                <input type="date" class="form-control" name="delivery_date" 
                                                       value="<?php /* echo $order_detail['expected_delivery']; */ ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Delivery Status</label>
                                                <select class="form-control" name="delivery_status">
                                                    <option value="pending">Pending</option>
                                                    <option value="processing">Processing</option>
                                                    <option value="dispatched">Dispatched</option>
                                                    <option value="in_transit">In Transit</option>
                                                    <option value="out_for_delivery">Out for Delivery</option>
                                                    <option value="delivered">Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Delivered To</label>
                                                <input type="text" class="form-control" name="delivered_to" 
                                                       value="<?php /* echo $order_detail['customer_name']; */ ?>" 
                                                       placeholder="Customer name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Delivery Address</label>
                                                <input type="text" class="form-control" name="delivery_address" 
                                                       value="<?php /* echo $order_detail['delivery_address']; */ ?>" 
                                                       placeholder="Full delivery address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" name="contact_number" 
                                                       value="<?php /* echo $order_detail['phone']; */ ?>" 
                                                       placeholder="Phone number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Courier Service</label>
                                                <input type="text" class="form-control" name="courier_service" 
                                                       value="<?php /* echo $order_detail['courier']; */ ?>" 
                                                       placeholder="e.g., FedEx, UPS, DHL">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Additional Notes</label>
                                                <textarea class="form-control" name="notes" rows="3" 
                                                          placeholder="Any special instructions or notes"><?php /* echo $order_detail['notes']; */ ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">Update Order</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>

                                    <?php 
                                    } else {
                                        echo '<p class="text-muted">Select an order from the table above to view dispatch details.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>

    <!-- Scripts -->
    <script src="path/to/jquery/jquery.min.js"></script>
    <script src="path/to/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
    function viewOrderDetails(orderId) {
        // Reload page with order_id parameter
        window.location.href = '?order_id=' + orderId;
        
        // OR use AJAX to load details without page reload
        /*
        $.ajax({
            url: 'ajax/get_order_details.php',
            method: 'GET',
            data: { order_id: orderId },
            success: function(response) {
                $('#orderDetailsSection').html(response);
            }
        });
        */
    }
    </script>
</body>
</html>