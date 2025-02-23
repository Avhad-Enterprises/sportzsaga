<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task Assigned</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;">
        <h2 style="color: #333;">New Task Assigned: <?= esc($task_name) ?></h2>
        <p><strong>Task Name:</strong> <?= esc($task_name) ?></p>
        <p><strong>Description:</strong> <?= esc($description) ?></p>
        <p><strong>Assigned By:</strong> <?= esc($assigned_by) ?></p>
        <p><strong>Due Date:</strong> <?= date('F j, Y', strtotime($due_date)) ?></p>
        <p><strong>Priority Level:</strong> <?= esc($priority_level) ?></p>
        <?php if ($task_file): ?>
            <p><strong>File:</strong> <a href="<?= base_url('uploads/' . esc($task_file)) ?>">Download</a></p>
        <?php endif; ?>
        <p><strong>URL:</strong> <a href="<?= esc($url) ?>"><?= esc($url) ?></a></p>
        <p style="margin-top: 20px;">Please log in to your account to view more details.</p>
        <p style="margin-top: 10px;">Thank you!</p>
    </div>
</body>
</html>
