<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-bullhorn"></i> <?php //echo $this->lang->line('communicate'); ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" >
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('schedule_email_sms_log'); ?></h3>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('schedule_email_sms_log'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('title'); ?></th>
                                        <th><?php echo $this->lang->line('message'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('schedule_date'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('sms'); ?></th>
                                        <th><?php echo $this->lang->line('group'); ?></th>
                                        <th><?php echo $this->lang->line('individual'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
foreach ($listMessage as $message) {
    ?>
                                        <tr>
                                            <td class="mailbox-name"><?php echo $message['title'] ?></td>
                                            <td class="mailbox-name"><?php
if ($message['message'] == "") {
        ?>
                                                        <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                        <?php
} else {
        ?>
                                                        <p class="text text-info"><?php echo $message['message']; ?></p>
                                                        <?php
}
    ?></td>
                                            <td class="mailbox-name">                                                
                                                <?php echo $this->customlib->dateyyyymmddToDateTimeformat($message['created_at'], false); ?>                                                
                                            </td>
                                            <td class="mailbox-name">                                                
                                                <?php echo $this->customlib->dateyyyymmddToDateTimeformat($message['schedule_date_time'], false); ?>                                                
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
if ($message['send_mail']) {
        echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . $this->lang->line('yes') . "</span>";
    }
    ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
if ($message['send_sms']) {
        echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . $this->lang->line('yes') . "</span>";
    }
    ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
if ($message['is_group']) {
        echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . $this->lang->line('yes') . "</span>";
    }
    ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
if ($message['is_individual']) {
        echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . $this->lang->line('yes') . "</span>";
    }
    ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php
if ($message['is_class']) {
        echo "<i class='fa fa-check-square-o'></i><span class='hide'>" . $this->lang->line('yes') . "</span>";
    }
    ?>
                                            </td>
                                            <td class="mailbox-name">
                                                <?php if ($this->rbac->hasPrivilege('schedule_email_sms_log', 'can_edit')) {?>

                                                <a href="<?php echo base_url(); ?>admin/mailsms/edit_schedule/<?php echo $message['id']; ?>" class="btn btn-default btn-xs" data-toggle="modal" data-original-title="<?php echo $this->lang->line('view_edit'); ?>"><i class="fa fa-reorder"></i></a>

                                                <?php }if ($this->rbac->hasPrivilege('schedule_email_sms_log', 'can_delete')) {?>

                                                <a href="#" class="btn btn-default btn-xs delete_schedule" data-id="<?php echo $message['id']; ?>" data-toggle="modal" data-original-title="<?php echo $this->lang->line('delete'); ?>"><i class="fa fa-trash"></i></a>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php
}
?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

        return true;
    }

</script>

<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });

    $('.delete_schedule').click(function(){
        var message_id = $(this).attr('data-id');
        if(confirm('<?php echo $this->lang->line('are_you_sure_want_to_delete'); ?>')){
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>admin/mailsms/delete_schedule',
                data: {message_id:message_id},
                dataType: "JSON",
                success: function (data) {
                    if (data.status == 1) {
                        successMsg(data.message);
                        location.reload();
                    }
                }
            })
        }
    })
</script>