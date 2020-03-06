<!-- tasks modal -->
<div id="task-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<!-- /tasks modal -->

<script type="text/javascript">

    // On task-link click
    $(document).on('click', '.add-task-link, .edit-task-link', function(e) {

        e.preventDefault();

        // Obj
        obj = $(this);

        $.get(obj.attr('href'), function(html) {

            $('#task-modal .modal-content').html(html);
            $('#task-modal').modal('show', {backdrop: 'static'});
        });
    });

    // On Submit of task form
    $(document).on('click', 'form#addTaskForm input[type="submit"]', function() {

        // Closest form
        obj = $(this).closest('form');

        // Validate
        obj.validate({
            rules: {
                shop_id: {
                    required: true
                },
                'form_ids[]': {
                    required: true
                }
            },
            errorPlacement: function(error, element) {

                error.appendTo(element.attr('name') == 'form_ids[]' ? element.closest('form').find('.admin-form').last().parent() : element.parent());
            },
            submitHandler: function(form) {

                // Disable submit
                $(form).find('input[type="submit"]').val('Sending...').prop('disabled', true);

                form_ids = $('input[name="form_ids[]"]:checkbox:checked').map(function(){
                    return this.value;
                }).toArray();

                // Call ajax
                data = ajaxCall($(form).attr('action'), "POST", {shop_id: $(form).find('select[name="shop_id"]').val(), form_ids: form_ids});

                if(data.success == false) {

                    errorMessages = [];
                    $.isEmptyObject(data.errors) || $.each(data.errors, function(e, obj) {

                        name = new Array();
                        names = '';
                        if(obj.location != undefined)
                        {
                            loc = String(obj.location);
                            name = loc.split(' -> ');
                            names = '<br/> Location => ' + name[1];
                        }

                        //store all errors server msg
                        errorMessages.push(obj.code + ' => ' + obj.message + names);

                    });

                    $(form).find('input[type="submit"]').val('Submit').prop('disabled', false);

                    notify('failure', errorMessages.join('<br/>'));
                }

                if(data.success == true) {

                    notify('success', data.result.message);

                    // Enable submit
                    $(form).find('input[type="submit"]').val('Done!').prop('disabled', false), setTimeout(function(){
                        $(form).find('input[type="submit"]').val('Submit');

                        // hide
                        location.href = "<?php echo base_url($this->config->item('sales_index_uri')) ?>";
                    }, 2000);
                }
            }
        });
    });
</script>