<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/jquery-entropizer-master/dist/css/jquery-entropizer.min.css">

<style type="text/css">
    label.error{
        color: red;
        font-weight:normal;
    } 

    .form-horizontal .control-label{
        font-weight: 600;   
    }

    label.error {
        background: url(<?php echo base_url('public/img/unchecked.gif')?>) no-repeat;
        padding-left: 16px;
        margin-left: .3em;
        margin-top: 3px;
    }

    #meter2 .entropizer-track {
        background-color: #e8e8e8;
        border-radius: 2px;
        height: 4px;
        margin-top: 10px;
    }
    #meter2 .entropizer-bar {
        height: 4px;
    }
/*    label.valid {
        background: url(<?php echo base_url('public/img/checked.gif')?>) no-repeat;
        display: block;
        width: 16px;
        height: 16px;
        margin-top: 3px;

    }*/
</style>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            <?php if(!get_data('update')){?>
                <h4 class="head3" style="display:inline-block">Add New Admin</h4>
            <?php } else {?>
                <h4 class="head3" style="display:inline-block">Update Admin</h4>
            <?php }?>
            
            <a href="<?php echo site_url('admin/admins') ?>" class="btn btn-primary pull-right">View Admin List</a>
            </header>
            <div class="panel-body">
                <div class=" form">
                    <form class="form-horizontal " id="frmvalidate" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/admins/add/'.get_data('update')); ?>">
                        <?php if(get_data('update')){
                            echo "<input type='hidden' name='update' value='".get_data('update')."'>";
                        } ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="first_name">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo get_data('first_name')?>"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="middle_name">Middle Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" minlength="2" name="middle_name" id="middle_name" value="<?php echo get_data('middle_name')?>"  autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="last_name">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo get_data('last_name')?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="username">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="username" id="username"  autocomplete="off" required <?php if(!empty(get_data('update'))){echo 'disabled  value="'.get_username_by_id(get_data('update')).'"';}else{echo 'value="'.get_data('username').'"';} ?> onfocus="$('#username_warning').fadeIn(200)" onfocusout="$('#username_warning').fadeOut(200)">
                            </div>
                            <?php if(empty(get_data('update'))){ ?>
                                <label class="col-sm-3 control-label"  id="username_warning" style="display: none;color: red;font-weight: 300">Username Not Changeable</label>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" id="password" minlength="4" autocomplete="off" required <?php if(!empty(get_data('update'))){echo 'disabled value="***********"';} ?>>
                                <div id="meter2"></div>
                            </div>
                            <?php if(get_data('update')){?>
                            <label class="col-sm-2 control-label"><a href="javascript:;" onclick="$('input[name=password]').attr('disabled',false).val('');$('input[name=password_changed]').attr('disabled',false)">Reset Password</a></label>
                            <input type="hidden" name="password_changed" value="true" disabled>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="email">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo get_data('email')?>" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="gender">Gender</label>
                            <label class="col-sm-1 control-label" for="male">Male</label>
                            <div class="col-sm-2">
                                <input type="radio"  name="gender" id="male" value="male" <?php echo (get_data('gender')=='male')?'checked':'';?> autocomplete="off" required>
                            </div>
                            <label class="col-sm-1 control-label" for="female">Female</label>
                            <div class="col-sm-2">
                                <input type="radio"  name="gender" id="female" value="female" <?php echo (get_data('gender')=='female')?'checked':'';?> autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">Address</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo get_data('address')?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="contact_no">Contact No</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo get_data('contact_no')?>" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button type="submit" name="submit" value="add"  class="btn btn-primary" > <?php echo (!get_data('update'))?'Save':'Update'; ?></button>         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo base_url();?>public/assets/jquery-entropizer-master/lib/entropizer.js"></script>
<script src="<?php echo base_url();?>public/assets/jquery-entropizer-master/dist/js/jquery-entropizer.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#meter2').entropizer({
            target: '#password',
            update: function(data, ui) {
                ui.bar.css({
                    'background-color': data.color,
                    'width': data.percent + '%'
                });
            }
        });

        // jQuery.validator.setDefaults({
        //   'debug': true,
        //   'success': "valid"
        // });

        $( "#frmvalidate" ).validate({
            'highlight': function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            'success': function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(element).closest('.error').remove();
            },
            'rules': {
                'first_name': {
                  'required': true
                },
                'email': {
                  'required': true,
                  'email': true,
                  'remote': {
                        'url': "<?php echo base_url('admin/admins/check_email')?>",
                        'type': "post",
                        'data': {
                          'email': function() {
                            return $( "input[name=email]" ).val();
                          }
                          <?php if(get_data('update')):?>
                          ,'oldemail':"<?php echo get_data('update') ?>"
                          <?php endif; ?>

                        }
                    }

                },
                'username': {
                  'required': true,
                  'remote': "<?php echo base_url('admin/admins/remote_username_check')?>"
                }
            },
            'messages': {
                'email': {
                    'remote': "This E-Mail Already Taken.",
                },
                'username': {
                    'remote': "This Username Already Taken.",
                }
            },
            'errorElement' : 'label',
            'errorLabelContainer': '.error',
            'validLabelContainer': '.valid'
        });
    });

</script>