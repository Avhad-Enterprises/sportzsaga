<!-- Add this modal template (add_macros_modal.php) -->
<div class="modal fade" id="addMacrosModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Macro</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="macrosForm">
                    <div class="form-group">
                        <label>Macro Name*</label>
                        <input type="text" class="form-control" id="macros_title" required>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <select class="form-control select2-tags" id="cs_tags" multiple>
                            <?php foreach ($tags as $tag): ?>
                                <option value="<?= $tag->id ?>"><?= $tag->tag_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Reply Type</label>
                        <select class="form-control" id="macro_reply_type">
                            <option value="reply">Reply</option>
                            <option value="forward">Forward</option>
                            <option value="internal_note">Internal Note</option>
                        </select>
                    </div>

                    <div class="email-fields">
                        <div class="form-group">
                            <label>To</label>
                            <div class="email-tag-container form-control" id="macro-to-container">
                                <input type="text" class="email-input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>CC</label>
                            <div class="email-tag-container form-control" id="macro-cc-container">
                                <input type="text" class="email-input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>BCC</label>
                            <div class="email-tag-container form-control" id="macro-bcc-container">
                                <input type="text" class="email-input">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <div class="editor-toolbar">
                            <button type="button" class="btn btn-sm" data-command="bold"><i class="fa fa-bold"></i></button>
                            <button type="button" class="btn btn-sm" data-command="italic"><i class="fa fa-italic"></i></button>
                            <button type="button" class="btn btn-sm" data-command="underline"><i class="fa fa-underline"></i></button>
                            <button type="button" class="btn btn-sm" data-command="insertVariable"><i class="fa fa-code"></i></button>
                        </div>
                        <textarea class="form-control content-editor" id="macro_content" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveMacro">Save Macro</button>
            </div>
        </div>
    </div>
</div>


<style>
.email-tag-container {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    padding: 5px;
    min-height: 38px;
}

.email-tag {
    background: #e9ecef;
    padding: 2px 8px;
    border-radius: 3px;
    display: inline-flex;
    align-items: center;
    margin-right: 5px;
}

.email-tag .remove-tag {
    margin-left: 5px;
    cursor: pointer;
    color: #666;
}

.email-input {
    border: none;
    outline: none;
    flex: 1;
    min-width: 60px;
}

.editor-toolbar {
    margin-bottom: 10px;
    border: 1px solid #ccc;
    padding: 5px;
}

.variable-option {
    padding: 5px 10px;
    cursor: pointer;
}

.variable-option:hover {
    background: #f0f0f0;
}
</style>