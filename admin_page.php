<?php
session_start();
    include('auth.php');
    include('avatar.php');
    include('admin_class.php');
    include('config.php');
    include('header.php');

?>
</head>
<body>
    <div class="admin-users-accounts">
    <table border="1">
    <?php if (isset($_GET['message'])): ?>
        <p><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>

        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Profile Picture</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td>
                    <?php if ($user['image']): ?>
                        <img src="upload_profile/<?php echo htmlspecialchars($user['image']); ?>" alt="Profile Picture" width="50">
                    <?php else: ?>
                        No profile picture
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($user['role']); ?></td>
                <td>
                <a href="admin_page.php?delete_id=<?php echo htmlspecialchars($user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>
