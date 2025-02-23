<!-- email_messages.php -->
<?php foreach ($thread as $message): 
    $messageType = $message['message_type'] ?? 'received';
    $isInternalNote = $messageType === 'internal_note';
    $isSent = $messageType === 'sent';
?>
    <div class="message-wrapper <?= $isSent ? 'text-right' : ''; ?> mb-3">
        <div class="message-bubble <?= $isInternalNote ? 'internal-note' : ($isSent ? 'sent' : 'received'); ?>"
             style="display: inline-block; max-width: 70%; text-align: left; padding: 15px; border-radius: 15px; 
                    <?php if($isInternalNote): ?>
                        background-color: #fff3cd; border: 1px solid #ffeeba;
                    <?php elseif($isSent): ?>
                        background-color: #e9ecef; margin-left: auto;
                    <?php else: ?>
                        background-color: #f8f9fa;
                    <?php endif; ?>">
            <div class="message-header mb-2">
                <strong><?= esc($message['from_email']); ?></strong>
                <small class="text-muted ml-2">
                    <?= date('M d, Y H:i', strtotime($message['email_date'])); ?>
                </small>
                <?php if($isInternalNote): ?>
                    <span class="badge badge-warning ml-2">Internal Note</span>
                <?php endif; ?>
            </div>
            <div class="message-content">
                <?= $message['full_message']; ?>
            </div>
            <?php if (!empty($message['attachments'])): ?>
                <!-- Attachment display code here -->
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>