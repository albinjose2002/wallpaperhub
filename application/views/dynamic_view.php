<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container { max-width: 800px; margin: 30px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .form-row { display: flex; margin-bottom: 15px; align-items: center; }
        .form-row input { margin-right: 10px; flex: 1; }
        .remove-btn { background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; }
        .add-btn { background: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; margin-bottom: 20px; }
        .submit-btn { background: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }
        .alert { margin-top: 20px; }
        .form-control.is-invalid { border-color: #dc3545; }
        .invalid-feedback { color: #dc3545; font-size: 0.875em; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Dynamic CRUD Operations</h2>
            
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            
            <form id="dynamic-form" action="<?php echo site_url('dynamic/save'); ?>" method="post">
                <div id="rows-container">
                    <?php if(!empty($records)): ?>
                        <?php foreach($records as $record): ?>
                            <div class="form-row">
                                <input type="hidden" name="id[]" value="<?php echo $record['id']; ?>">
                                <input type="text" name="name[]" value="<?php echo html_escape($record['name']); ?>" 
                                    class="form-control <?php echo form_error('name[]') ? 'is-invalid' : ''; ?>" 
                                    placeholder="Name" required>
                                <input type="email" name="email[]" value="<?php echo html_escape($record['email']); ?>" 
                                    class="form-control <?php echo form_error('email[]') ? 'is-invalid' : ''; ?>" 
                                    placeholder="Email" required>
                                <button type="button" class="remove-btn">Remove</button>
                                <?php if(form_error('name[]')): ?>
                                    <div class="invalid-feedback"><?php echo form_error('name[]'); ?></div>
                                <?php endif; ?>
                                <?php if(form_error('email[]')): ?>
                                    <div class="invalid-feedback"><?php echo form_error('email[]'); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default empty row -->
                        <div class="form-row">
                            <input type="hidden" name="id[]" value="">
                            <input type="text" name="name[]" class="form-control" placeholder="Name" required>
                            <input type="email" name="email[]" class="form-control" placeholder="Email" required>
                            <button type="button" class="remove-btn" style="display: none;">Remove</button>
                        </div>
                    <?php endif; ?>
                </div>
                
                <button type="button" id="add-row" class="add-btn">Add Row</button>
                <button type="submit" class="submit-btn">Save All</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Add new row
            $('#add-row').click(function() {
                const newRow = `
                    <div class="form-row">
                        <input type="hidden" name="id[]" value="">
                        <input type="text" name="name[]" class="form-control" placeholder="Name" required>
                        <input type="email" name="email[]" class="form-control" placeholder="Email" required>
                        <button type="button" class="remove-btn">Remove</button>
                    </div>
                `;
                $('#rows-container').append(newRow);
                
                // Show remove buttons on all rows if more than one exists
                if ($('.form-row').length > 1) {
                    $('.remove-btn').show();
                }
            });
            
            // Remove row
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.form-row').remove();
                
                // Hide remove button on first row if only one row left
                if ($('.form-row').length === 1) {
                    $('.remove-btn').hide();
                }
            });
            
            // Initialize remove buttons visibility
            if ($('.form-row').length === 1) {
                $('.remove-btn').hide();
            }
        });
    </script>
</body>
</html>