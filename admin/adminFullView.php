<?php
    include_once('fullViewData.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Full View</title>
    <link rel="stylesheet" href="adminFullView.css">
    <script src="adminRooms.js" defer></script>
</head>
<body>

    <!-- Header -->
    <?php include_once('../include/userHeaderAdmin.php') ?>

    <!-- Main Container -->
    <div class="container">
        
        <!-- Navigation Button -->
        <div class="button-container">
            <a href="admin.php"><div class="button">Full View</div></a>
        </div>

        <!-- Full View Table (Now in Card Format for Mobile) -->
        <div class="full-view-container">
            
            <!-- Dynamic Data Rows -->
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <div class="card">
                        <div class="card-header">Room #<?php echo $row['roomNo']; ?></div>
                        <div class="card-body">
                            <div><strong>Occupant:</strong> <?php echo $row['guestName']; ?></div>
                            <div><strong>Contact #:</strong> <?php echo $row['contactNo']; ?></div>
                            <div><strong>Price:</strong> $<?php echo $row['pendingPayment']; ?></div>
                            <div><strong>Payment Status:</strong> <?php echo $row['paidStatus']; ?></div>
                            <div><strong>Feedback:</strong> <?php echo $row['feedback'] ?: 'No Feedback'; ?></div>
                        </div>
                        <div class="card-footer">
                            <button class="edit-button">Edit</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">No data available</div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>

</body>
</html>
