<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<script>
    console.log('right heeeeere!');
    console.log(<?php echo json_encode($student) ?>);
    console.log(window.location.pathname);
</script>
<div class="content-wrapper" style="min-height: 946px;">
    <div class="row">
        <div class="col-md-12">
            <section class="content-header" style="padding-right: 0;">
                <h1>
                    <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?> <small><?php echo $this->lang->line('student1'); ?></small>
                </h1>

            </section>
        </div>

        <div>
            <a id="sidebarCollapse" class="studentsideopen"><i class="fa fa-navicon"></i></a>
            <aside class="studentsidebar">
                <div class="stutop" id="">

                    <!-- Create the tabs -->
                    <div class="studentsidetopfixed">
                        <p class="classtap"><?php echo $student["class"]; ?> <a href="#" data-toggle="control-sidebar" class="studentsideclose"><i class="fa fa-times"></i></a></p>
                        <ul class="nav nav-justified studenttaps">
                            <?php foreach ($class_section as $skey => $svalue) {
                            ?>
                                <li <?php
                                    if ($student["section_id"] == $svalue["section_id"]) {
                                        echo "class='active'";
                                    }
                                    ?>><a href="#section<?php echo $svalue["section_id"] ?>" data-toggle="tab"><?php print_r($svalue["section"]); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <?php foreach ($class_section as $skey => $snvalue) {
                        ?>
                            <div class="tab-pane <?php
                                                    if ($student["section_id"] == $snvalue["section_id"]) {
                                                        echo "active";
                                                    }
                                                    ?>" id="section<?php echo $snvalue["section_id"]; ?>">
                                <?php
                                foreach ($studentlistbysection as $stkey => $stvalue) {
                                    if ($stvalue['section_id'] == $snvalue["section_id"]) {

                                ?>
                                        <div class="studentname">
                                            <a class="" href="<?php echo base_url() . "student/view/" . $stvalue["id"] ?>">
                                                <div class="icon">

                                                    <img src="<?php
                                                                if (!empty($stvalue["image"])) {
                                                                    echo base_url() . $stvalue["image"];
                                                                } else {

                                                                    if ($student['gender'] == 'Female') {
                                                                        echo base_url() . "uploads/student_images/default_female.jpg";
                                                                    } elseif ($student['gender'] == 'Male') {
                                                                        echo base_url() . "uploads/student_images/default_male.jpg";
                                                                    }
                                                                }
                                                                ?>" alt="User Image">
                                                </div>
                                                <div class="student-tittle"><?php echo $stvalue["firstname"] . " " . $stvalue["lastname"]; ?></div>
                                            </a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                        <div class="tab-pane" id="sectionB">
                            <h3 class="control-sidebar-heading">Recent Activity 2</h3>
                        </div>

                        <div class="tab-pane" id="sectionC">
                            <h3 class="control-sidebar-heading">Recent Activity 3</h3>
                        </div>
                        <div class="tab-pane" id="sectionD">
                            <h3 class="control-sidebar-heading">Recent Activity 3</h3>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>
            </aside>
        </div>
        <!-- /.control-sidebar -->
    </div>

    <section class="content">
        <div class="row">

            <div class="col-md-3">

                <div class="box box-primary" <?php
                                                if ($student["is_active"] == "no") {
                                                    echo "style='background-color:#f0dddd;'";
                                                }
                                                ?>>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php
                                                                                        if (!empty($student["image"])) {
                                                                                            echo base_url() . $student["image"];
                                                                                        } else {

                                                                                            if ($student['gender'] == 'Female') {
                                                                                                echo base_url() . "uploads/student_images/default_female.jpg";
                                                                                            } else {
                                                                                                echo base_url() . "uploads/student_images/default_male.jpg";
                                                                                            }
                                                                                        }
                                                                                        ?>" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo $student['firstname'] . " " . $student['lastname']; ?></h3>

                        <ul class="list-group list-group-unbordered">
                            <?php
                            if ($student['is_active'] == 'no') {
                            ?>



                                <li class="list-group-item listnoback">
                                    <b><?php echo $this->lang->line('disable') . " " . $this->lang->line('reason') ?></b> <span class="pull-right text-aqua"><?php echo $reason_data['reason'] ?></span>
                                </li>
                                <li class="list-group-item listnoback">
                                    <b><?php echo $this->lang->line('disable') . " " . $this->lang->line('note') ?></b> <span class="pull-right text-aqua"><?php echo $student['dis_note'] ?></span>
                                </li>
                                <li class="list-group-item listnoback">
                                    <b><?php echo $this->lang->line('disable') . " " . $this->lang->line('date') ?></b> <span class="pull-right text-aqua"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['disable_at'])); ?></span>
                                </li>


                            <?php } ?>

                            <li class="list-group-item listnoback">
                                <b><?php echo $this->lang->line('admission_no'); ?></b> <a class="pull-right text-aqua"><?php echo $student['admission_no']; ?></a>
                            </li>
                            <?php
                            if ($sch_setting->roll_no) { ?>
                                <li class="list-group-item listnoback">
                                    <b><?php echo $this->lang->line('roll_no'); ?></b> <a class="pull-right text-aqua"><?php echo $student['roll_no']; ?></a>
                                </li>
                            <?php
                            } ?>
                            <li class="list-group-item listnoback">
                                <b><?php echo $this->lang->line('class'); ?></b> <a class="pull-right text-aqua"><?php echo $student['class'] . " (" . $session . ")"; ?></a>
                            </li>
                            <li class="list-group-item listnoback">
                                <b><?php echo $this->lang->line('section'); ?></b> <a class="pull-right text-aqua"><?php echo $student['section']; ?></a>
                            </li>
                            <?php if ($sch_setting->rte) { ?>
                                <li class="list-group-item listnoback">
                                    <b><?php echo $this->lang->line('rte'); ?></b> <a class="pull-right text-aqua"><?php echo $student['rte']; ?></a>
                                </li>
                            <?php } ?>
                            <li class="list-group-item listnoback">
                                <b><?php echo $this->lang->line('gender'); ?></b> <a class="pull-right text-aqua"><?php echo $this->lang->line(strtolower($student['gender'])); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                if (!empty($siblings)) {
                ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('sibling'); ?></h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <?php
                            foreach ($siblings as $sibling_key => $sibling_value) {
                            ?>
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="siblingview">
                                        <img class="" src="<?php echo base_url() . $sibling_value->image; ?>" alt="User Avatar">
                                        <h4><a href="<?php echo site_url('student/view/' . $sibling_value->id) ?>"><?php echo $sibling_value->firstname . " " . $sibling_value->lastname ?></a></h4>
                                    </div>
                                    <!--TODO: I'm here elwiss -->
                                    <a href="<?php echo site_url('studentfee/addfee/' . $sibling_value->id) ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="" data-original-title="">
                                        <?php echo $currency_symbol; ?> <?php echo $this->lang->line('collect_fees'); ?>
                                    </a>
                                    <div class="box-footer no-padding">
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">


                                                <b><?php echo $this->lang->line('admission_no'); ?></b> <a class="pull-right text-aqua"><?php echo $sibling_value->admission_no; ?></a>
                                            </li>

                                            <li class="list-group-item">
                                                <b><?php echo $this->lang->line('class'); ?></b> <a class="pull-right text-aqua"><?php echo $sibling_value->class; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?php echo $this->lang->line('section'); ?></b> <a class="pull-right text-aqua"><?php echo $sibling_value->section; ?></a>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                        <!-- /.box-body -->

                    </div>

                <?php
                }
                ?>

            </div>
            <div class="col-md-9">

                <div class="nav-tabs-custom theme-shadow">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tab1"><a href="#activity" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('profile'); ?></a></li>


                        <?php
                        if ($this->module_lib->hasActive('fees_collection')) {
                            if (($this->rbac->hasPrivilege('collect_fees', 'can_view') ||
                                $this->rbac->hasPrivilege('search_fees_payment', 'can_view') ||
                                $this->rbac->hasPrivilege('search_due_fees', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_statement', 'can_view') ||
                                $this->rbac->hasPrivilege('balance_fees_report', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_carry_forward', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_master', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_group', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_type', 'can_view') ||
                                $this->rbac->hasPrivilege('fees_discount', 'can_view') ||
                                $this->rbac->hasPrivilege('accountants', 'can_view'))) {
                        ?>
                                <li class="" id="tab2"><a href="#fee" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('fees'); ?></a></li>
                        <?php
                            }
                        }



                        ?>
                        <li class="" id="tab3"><a href="#documents" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('documents'); ?></a></li>
                        <?php
                        if ($this->rbac->hasPrivilege('student_timeline', 'can_add')) {
                        ?>
                            <li class="" id="tab4"><a href="#timelineh" data-toggle="tab" aria-expanded="true"><?php echo $this->lang->line('timeline') ?></a></li>
                        <?php } ?>




                        <?php if ($student["is_active"] == "yes") { ?>
                            <?php
                            if ($this->rbac->hasPrivilege('disable_student', 'can_view')) {
                            ?>
                                <li class="pull-right dropdown">
                                    <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a style="cursor: pointer;" onclick="send_password()"><?php echo $this->lang->line('send_student_password'); ?></a></li>
                                        <li><a style="cursor: pointer;" onclick="send_parent_password()"> <?php echo $this->lang->line('send_parent_password'); ?></a></li>
                                    </ul>
                                </li>

                                <li class="pull-right">
                                    <a style="cursor: pointer;" onclick="disable_student('<?php echo $student["id"] ?>')" class="text-red" data-toggle="tooltip" data-placement="bottom" title="<?php echo "Disable"; ?>">
                                        <i class="fa fa-thumbs-o-down"></i><?php //echo "Disable Student";        
                                                                            ?>
                                    </a>
                                </li>

                            <?php
                            }

                            //5235
                            if ($this->rbac->hasPrivilege('student_login_credential_report', 'can_view')) {
                            ?>


                                <li class="pull-right">
                                    <a href="#" class="schedule_modal text-green" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('login_details'); ?>"><i class="fa fa-key"></i>
                                        <?php //echo $this->lang->line('login_details');    
                                        ?>
                                    </a>
                                </li>
                            <?php
                            }
                            if ($this->rbac->hasPrivilege('student', 'can_edit')) {
                            ?>

                                <li class="pull-right">
                                    <a href="<?php echo base_url() . "student/edit/" . $student["id"] ?>" class="" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-pencil"></i>
                                        <?php //echo $this->lang->line('login_details');    
                                        ?>
                                    </a>
                                </li>
                            <?php
                            }
                        } else {
                            ?>


                            <li class="pull-right">
                                <a href="#" onclick="enable('<?php echo $student["id"] ?>')" class="text-green" data-toggle="tooltip" data-placement="left" title="<?php echo "Enable"; ?>">
                                    <i class="fa fa-thumbs-o-up"></i><?php ?>
                                </a>
                            </li>

                        <?php } ?>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">

                            <div class="tshadow mb25 bozero">
                                <div class="table-responsive around10 pt0">
                                    <table class="table table-hover table-striped tmb0">
                                        <tbody>
                                            <?php if ($sch_setting->admission_date) {  ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('admission_date'); ?></td>
                                                    <td class="col-md-5">
                                                        <?php
                                                        if (!empty($student['admission_date'])) {
                                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['admission_date']));
                                                        }
                                                        ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('date_of_birth'); ?></td>
                                                <td><?php
                                                    if (!empty($student['admission_date'])) {
                                                        echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob']));
                                                    }
                                                    ?></td>
                                            </tr>
                                            <?php if ($sch_setting->category) {  ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('category'); ?></td>
                                                    <td>
                                                        <?php
                                                        foreach ($category_list as $value) {
                                                            if ($student['category_id'] == $value['id']) {
                                                                echo $value['category'];
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->mobile_no) {  ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('mobile_no'); ?></td>
                                                    <td><?php echo $student['mobileno']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->cast) {  ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('cast'); ?></td>
                                                    <td><?php echo $student['cast']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->religion) {  ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('religion'); ?></td>
                                                    <td><?php echo $student['religion']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->student_email) {  ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('email'); ?></td>
                                                    <td><?php echo $student['email']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            $cutom_fields_data = get_custom_table_values($student['id'], 'students');
                                            if (!empty($cutom_fields_data)) {
                                                foreach ($cutom_fields_data as $field_key => $field_value) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $field_value->name; ?></td>
                                                        <td>
                                                            <?php
                                                            if (is_string($field_value->field_value) && is_array(json_decode($field_value->field_value, true)) && (json_last_error() == JSON_ERROR_NONE)) {
                                                                $field_array = json_decode($field_value->field_value);
                                                                echo "<ul class='student_custom_field'>";
                                                                foreach ($field_array as $each_key => $each_value) {
                                                                    echo "<li>" . $each_value . "</li>";
                                                                }
                                                                echo "</ul>";
                                                            } else {
                                                                $display_field = $field_value->field_value;

                                                                if ($field_value->type == "link") {
                                                                    $display_field = "<a href=" . $field_value->field_value . " target='_blank'>" . $field_value->field_value . "</a>";
                                                                }
                                                                echo $display_field;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tshadow mb25 bozero">
                                <h3 class="pagetitleh2"><?php echo $this->lang->line('address'); ?> <?php echo $this->lang->line('detail'); ?></h3>
                                <div class="table-responsive around10 pt0">
                                    <table class="table table-hover table-striped tmb0">
                                        <tbody>
                                            <?php if ($sch_setting->current_address) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('current_address'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['current_address']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->permanent_address) { ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('permanent_address'); ?></td>
                                                    <td><?php echo $student['permanent_address']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tshadow mb25 bozero">
                                <h3 class="pagetitleh2"><?php echo $this->lang->line('parent'); ?> / <?php echo $this->lang->line('guardian_details'); ?> </h3>
                                <div class="table-responsive around10 pt10">
                                    <table class="table table-hover table-striped tmb0">
                                        <?php if ($sch_setting->father_name) {  ?>
                                            <tr>
                                                <td class="col-md-4"><?php echo $this->lang->line('father_name'); ?></td>
                                                <td class="col-md-5"><?php echo $student['father_name']; ?></td>
                                                <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="<?php
                                                                                                                                if (!empty($student["father_pic"])) {
                                                                                                                                    echo base_url() . $student["father_pic"];
                                                                                                                                } else {
                                                                                                                                    echo base_url() . "uploads/student_images/no_image.png";
                                                                                                                                }
                                                                                                                                ?>"></td>
                                            </tr>
                                        <?php }
                                        if ($sch_setting->father_phone) {  ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('father_phone'); ?></td>
                                                <td><?php echo $student['father_phone']; ?></td>
                                            </tr>
                                        <?php }
                                        if ($sch_setting->father_occupation) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('father_occupation'); ?></td>
                                                <td><?php echo $student['father_occupation']; ?></td>
                                            </tr>
                                        <?php }
                                        if ($sch_setting->mother_name) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('mother_name'); ?></td>
                                                <td><?php echo $student['mother_name']; ?></td>
                                                <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="<?php
                                                                                                                                if (!empty($student["mother_pic"])) {
                                                                                                                                    echo base_url() . $student["mother_pic"];
                                                                                                                                } else {
                                                                                                                                    echo base_url() . "uploads/student_images/no_image.png";
                                                                                                                                }
                                                                                                                                ?>"></td>
                                            </tr>
                                        <?php }
                                        if ($sch_setting->mother_phone) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('mother_phone'); ?></td>
                                                <td><?php echo $student['mother_phone']; ?></td>

                                            </tr>
                                        <?php }
                                        if ($sch_setting->mother_occupation) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('mother_occupation'); ?></td>
                                                <td><?php echo $student['mother_occupation']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?php echo $this->lang->line('guardian_name'); ?></td>
                                            <td><?php echo $student['guardian_name']; ?></td>
                                            <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="<?php
                                                                                                                            if (!empty($student["guardian_pic"])) {
                                                                                                                                echo base_url() . $student["guardian_pic"];
                                                                                                                            } else {
                                                                                                                                echo base_url() . "uploads/student_images/no_image.png";
                                                                                                                            }
                                                                                                                            ?>"></td>
                                        </tr>
                                        <?php if ($sch_setting->guardian_email) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('guardian_email'); ?></td>
                                                <td><?php echo $student['guardian_email']; ?></td>
                                            </tr>
                                        <?php }
                                        if ($sch_setting->guardian_relation) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('guardian_relation'); ?></td>
                                                <td><?php echo $student['guardian_relation']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?php echo $this->lang->line('guardian_phone'); ?></td>
                                            <td><?php echo $student['guardian_phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $this->lang->line('guardian_occupation'); ?></td>
                                            <td><?php echo $student['guardian_occupation']; ?></td>
                                        </tr>
                                        <?php if ($sch_setting->guardian_address) { ?>
                                            <tr>
                                                <td><?php echo $this->lang->line('guardian_address'); ?></td>
                                                <td><?php echo $student['guardian_address']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if ($sch_setting->route_list) { ?>
                                <?php
                                if ($this->module_lib->hasActive('transport')) {

                                    if ($student['vehroute_id'] != 0) {
                                ?>
                                        <div class="tshadow mb25  bozero">
                                            <h3 class="pagetitleh2"><?php echo $this->lang->line('route') . " " . $this->lang->line('details') ?></h3>

                                            <div class="table-responsive around10 pt0">
                                                <table class="table table-hover table-striped tmb0">
                                                    <tbody>

                                                        <tr>
                                                            <td class="col-md-4"><?php echo $this->lang->line('route'); ?></td>
                                                            <td class="col-md-5"><?php echo $student['route_title']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4"><?php echo $this->lang->line('vehicle_no'); ?></td>
                                                            <td class="col-md-5"><?php echo $student['vehicle_no']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('driver_name'); ?></td>
                                                            <td><?php echo $student['driver_name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo $this->lang->line('driver_contact'); ?></td>
                                                            <td><?php echo $student['driver_contact']; ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                            <?php
                                    }
                                }
                            }
                            ?>
                            <?php if ($sch_setting->hostel_id) {
                                if ($this->module_lib->hasActive('hostel')) {

                                    if ($student['hostel_room_id'] != 0) {
                            ?>
                                        <div class="tshadow mb25  bozero">
                                            <h3 class="pagetitleh2"><?php echo $this->lang->line('hostel') . " " . $this->lang->line('details') ?></h3>

                                            <div class="table-responsive around10 pt0">
                                                <table class="table table-hover table-striped tmb0">
                                                    <tbody>

                                                        <tr>
                                                            <td class="col-md-4"><?php echo $this->lang->line('hostel'); ?></td>
                                                            <td class="col-md-5"><?php echo $student['hostel_name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4"><?php echo $this->lang->line('room_no'); ?></td>
                                                            <td class="col-md-5"><?php echo $student['room_no']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4"><?php echo $this->lang->line('room_type'); ?></td>
                                                            <td class="col-md-5"><?php echo $student['room_type']; ?></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                            <?php
                                    }
                                }
                            }
                            ?>


                            <div class="tshadow mb25  bozero">
                                <h3 class="pagetitleh2"><?php echo $this->lang->line('miscellaneous_details'); ?></h3>
                                <div class="table-responsive around10 pt0">
                                    <table class="table table-hover table-striped tmb0">
                                        <tbody>
                                            <?php if ($sch_setting->is_blood_group) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('blood_group'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['blood_group']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->is_student_house) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('house'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['house_name']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->student_height) {  ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('height'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['height']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->student_weight) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('weight'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['weight']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->measurement_date) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('measurement_date'); ?></td>
                                                    <td class="col-md-5"><?php
                                                                            if (!empty($student['measurement_date'])) {
                                                                                echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['measurement_date']));
                                                                            }
                                                                            ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->previous_school_details) {  ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('previous_school_details'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['previous_school']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->national_identification_no) { ?>
                                                <tr>
                                                    <td class="col-md-4"><?php echo $this->lang->line('national_identification_no'); ?></td>
                                                    <td class="col-md-5"><?php echo $student['adhar_no']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->local_identification_no) { ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('local_identification_no'); ?></td>
                                                    <td><?php echo $student['samagra_id']; ?></td>
                                                </tr>
                                            <?php }
                                            if ($sch_setting->bank_account_no) { ?>
                                                <tr>
                                                    <td><?php echo $this->lang->line('bank_account_no'); ?></td>
                                                    <td><?php echo $student['bank_account_no']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $this->lang->line('bank_name'); ?></td>
                                                    <td><?php echo $student['bank_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $this->lang->line('ifsc_code'); ?></td>
                                                    <td><?php echo $student['ifsc_code']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="fee">
                            <?php
                            if (empty($student_due_fee) && empty($student_discount_fee)) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->lang->line('no_record_found'); ?>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="row no-print">
                                    <div class="col-md-12 mDMb10">
                                        <a href="#" class="btn btn-sm btn-info printSelected"><i class="fa fa-print"></i> <?php echo $this->lang->line('print_selected'); ?> </a>

                                        <button type="button" class="btn btn-sm btn-warning collectSelected" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.."><i class="fa fa-money"></i> <?php echo $this->lang->line('collect') . " " . $this->lang->line('selected') ?></button>

                                        <span class="pull-right"><?php echo $this->lang->line('date'); ?>: <?php echo date($this->customlib->getSchoolDateFormat()); ?></span>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">

                                        <thead>
                                            <tr>
                                                <th style="width: 10px"><input type="checkbox" id="select_all" /></th>
                                                <th><?php echo $this->lang->line('fees_group'); ?></th>
                                                <th><?php echo $this->lang->line('fees_code'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('due_date'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('status'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-left"><?php echo $this->lang->line('payment_id'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('mode'); ?></th>
                                                <th class="text text-left"><?php echo $this->lang->line('date'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('paid'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                                <th class="text text-right"><?php echo $this->lang->line('balance'); ?></th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_amount = 0;
                                            $total_deposite_amount = 0;
                                            $total_fine_amount = 0;
                                            $total_discount_amount = 0;
                                            $total_balance_amount = 0;
                                            $alot_fee_discount = 0;
                                            //TODO (elwiss): my work started here
                                            $feesy = [];
                                            foreach ($student_due_fee as $key => $fee) {
                                                foreach ($fee->fees as $fee_key => $fee_value) {
                                                    array_push($feesy, $fee_value);
                                                }
                                            }
                                            function date_compare($a, $b)
                                            {
                                                $t1 = new DateTime(($a->due_date));
                                                $t2 = new DateTime(($b->due_date));
                                                return $t1->getTimestamp() - $t2->getTimestamp();
                                            }
                                            usort($feesy, 'date_compare');
                                            ?>
                                            <script>
                                                console.log(<?php echo json_encode($feeso) ?>);
                                            </script>
                                            <?php

                                            $total = 0;
                                            foreach ($feesy as $fee_value) {
                                                $fee_paid = 0;
                                                $fee_discount = 0;
                                                $fee_fine = 0;
                                                $total++;
                                                if (!empty($fee_value->amount_detail)) {
                                                    $fee_deposits = json_decode(($fee_value->amount_detail));

                                                    foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                        $fee_paid = $fee_paid + $fee_deposits_value->amount;
                                                        $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                                                        $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                                                    }
                                                }
                                                $total_amount = $total_amount + $fee_value->amount;
                                                $total_discount_amount = $total_discount_amount + $fee_discount;
                                                $total_deposite_amount = $total_deposite_amount + $fee_paid;
                                                $total_fine_amount = $total_fine_amount + $fee_fine;
                                                $feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
                                                $total_balance_amount = $total_balance_amount + $feetype_balance;
                                            ?>
                                                <?php
                                                if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date('Y-m-d'))) {
                                                ?>
                                                    <tr class="danger font12">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <tr class="dark-gray">
                                                    <?php
                                                }
                                                    ?>
                                                    <td><input class="checkbox" type="checkbox" name="fee_checkbox" data-fee_master_id="<?php echo $fee_value->id ?>" data-fee_session_group_id="<?php echo $fee_value->fee_session_group_id ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id ?>"></td>
                                                    <td align="left"><?php
                                                                        echo $fee_value->name . " (" . $fee_value->type . ")";
                                                                        ?></td>
                                                    <td align="left"><?php echo $fee_value->code; ?></td>
                                                    <td align="left" class="text text-left">

                                                        <?php
                                                        if ($fee_value->due_date == "0000-00-00") {
                                                        } else {

                                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->due_date));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="left" class="text text-left width85">
                                                        <?php
                                                        if ($feetype_balance == 0) {
                                                        ?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
                                                                                                                                        } else if (!empty($fee_value->amount_detail)) {
                                                                                                                                            ?><span class="label label-warning"><?php echo $this->lang->line('partial'); ?></span><?php
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    ?><span class="label label-danger"><?php echo $this->lang->line('unpaid'); ?></span><?php
                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                        ?>

                                                    </td>
                                                    <td class="text text-right"><?php echo $fee_value->amount; ?></td>

                                                    <td class="text text-left"></td>
                                                    <td class="text text-left"></td>
                                                    <td class="text text-left"></td>
                                                    <td class="text text-right"><?php
                                                                                echo (number_format($fee_discount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo (number_format($fee_fine, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo (number_format($fee_paid, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                $display_none = "ss-none";
                                                                                if ($feetype_balance > 0) {
                                                                                    $display_none = "";

                                                                                    echo (number_format($feetype_balance, 2, '.', ''));
                                                                                }
                                                                                ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group pull-right">
                                                            <button type="button" data-student_session_id="<?php echo $fee_value->student_session_id; ?>" data-student_fees_master_id="<?php echo $fee_value->id; ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id; ?>" data-group="<?php echo $fee_value->name; ?>" data-type="<?php echo $fee_value->code; ?>" class="btn btn-xs btn-default myCollectFeeBtn <?php echo $display_none; ?>" title="<?php echo $this->lang->line('add_fees'); ?>" data-toggle="modal" data-target="#myFeesModal"><i class="fa fa-plus"></i></button>


                                                            <button class="btn btn-xs btn-default printInv" data-fee_master_id="<?php echo $fee_value->id ?>" data-fee_session_group_id="<?php echo $fee_value->fee_session_group_id ?>" data-fee_groups_feetype_id="<?php echo $fee_value->fee_groups_feetype_id ?>" title="<?php echo $this->lang->line('print'); ?>"><i class="fa fa-print"></i> </button>
                                                        </div>
                                                    </td>


                                                    </tr>

                                                    <?php
                                                    if (!empty($fee_value->amount_detail)) {

                                                        $fee_deposits = json_decode(($fee_value->amount_detail));

                                                        foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                                                    ?>
                                                            <tr class="white-td">
                                                                <td align="left"></td>
                                                                <td align="left"></td>
                                                                <td align="left"></td>
                                                                <td align="left"></td>
                                                                <td align="left"></td>
                                                                <td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
                                                                <td class="text text-left">


                                                                    <a href="#" data-toggle="popover" class="detail_popover"> <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
                                                                    <div class="fee_detail_popover" style="display: none">
                                                                        <?php
                                                                        if ($fee_deposits_value->description == "") {
                                                                        ?>
                                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>


                                                                </td>
                                                                <td class="text text-left"><?php echo $this->lang->line(strtolower($fee_deposits_value->payment_mode)); ?></td>
                                                                <td class="text text-left">

                                                                    <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
                                                                </td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_discount, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount_fine, 2, '.', '')); ?></td>
                                                                <td class="text text-right"><?php echo (number_format($fee_deposits_value->amount, 2, '.', '')); ?></td>
                                                                <td></td>
                                                                <td class="text text-right">
                                                                    <div class="btn-group pull-right">

                                                                        <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_delete')) { ?>
                                                                            <button class="btn btn-default btn-xs" data-invoiceno="<?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?>" data-main_invoice="<?php echo $fee_value->student_fees_deposite_id ?>" data-sub_invoice="<?php echo $fee_deposits_value->inv_no ?>" data-toggle="modal" data-target="#confirm-delete" title="<?php echo $this->lang->line('revert'); ?>">
                                                                                <i class="fa fa-undo"> </i>
                                                                            </button>
                                                                        <?php } ?>
                                                                        <button class="btn btn-xs btn-default printDoc" data-main_invoice="<?php echo $fee_value->student_fees_deposite_id ?>" data-sub_invoice="<?php echo $fee_deposits_value->inv_no ?>" title="<?php echo $this->lang->line('print'); ?>"><i class="fa fa-print"></i> </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                <?php
                                            }
                                            //TODO (elwiss): and finished here
                                                ?>
                                                <?php
                                                if (!empty($student_discount_fee)) {

                                                    foreach ($student_discount_fee as $discount_key => $discount_value) {
                                                ?>
                                                        <tr class="dark-light" hidden>
                                                            <td></td>
                                                            <td align="left"> <?php echo $this->lang->line('discount'); ?> </td>
                                                            <td align="left">
                                                                <?php echo $discount_value['code']; ?>
                                                            </td>
                                                            <td align="left"></td>
                                                            <td align="left" class="text text-left">
                                                                <?php
                                                                if ($discount_value['status'] == "applied") {
                                                                ?>
                                                                    <a href="#" data-toggle="popover" class="detail_popover">

                                                                        <?php echo $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']) . " : " . $discount_value['payment_id']; ?>

                                                                    </a>
                                                                    <div class="fee_detail_popover" style="display: none">
                                                                        <?php
                                                                        if ($discount_value['student_fees_discount_description'] == "") {
                                                                        ?>
                                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <p class="text text-danger"><?php echo $discount_value['student_fees_discount_description'] ?></p>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                <?php
                                                                } else {
                                                                    echo '<p class="text text-danger">' . $this->lang->line('discount_of') . " " . $currency_symbol . $discount_value['amount'] . " " . $this->lang->line($discount_value['status']);
                                                                }
                                                                ?>

                                                            </td>
                                                            <td></td>
                                                            <td class="text text-left"></td>
                                                            <td class="text text-left"></td>
                                                            <td class="text text-left"></td>
                                                            <td class="text text-right">
                                                                <?php
                                                                $alot_fee_discount = $alot_fee_discount;
                                                                ?>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <div class="btn-group pull-right">
                                                                    <?php
                                                                    if ($discount_value['status'] == "applied") {
                                                                    ?>

                                                                        <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_delete')) { ?>
                                                                            <button class="btn btn-default btn-xs" data-discounttitle="<?php echo $discount_value['code']; ?>" data-discountid="<?php echo $discount_value['id']; ?>" data-toggle="modal" data-target="#confirm-discountdelete" title="<?php echo $this->lang->line('revert'); ?>">
                                                                                <i class="fa fa-undo"> </i>
                                                                            </button>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                    <button type="button" data-modal_title="<?php echo $this->lang->line('discount') . " : " . $discount_value['code']; ?>" data-student_fees_discount_id="<?php echo $discount_value['id']; ?>" class="btn btn-xs btn-default applydiscount" title="<?php echo $this->lang->line('apply_discount'); ?>"><i class="fa fa-check"></i>
                                                                    </button>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>


                                                <tr class="box box-solid total-bg">
                                                    <td align="left"></td>
                                                    <td align="left"></td>
                                                    <td align="left"></td>
                                                    <td align="left"></td>
                                                    <td align="left" class="text text-left"><?php echo $this->lang->line('grand_total'); ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo ($currency_symbol . number_format($total_amount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-left"></td>
                                                    <td class="text text-left"></td>
                                                    <td class="text text-left"></td>

                                                    <td class="text text-right"><?php
                                                                                echo ($currency_symbol . number_format($total_discount_amount + $alot_fee_discount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo ($currency_symbol . number_format($total_fine_amount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo ($currency_symbol . number_format($total_deposite_amount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"><?php
                                                                                echo ($currency_symbol . number_format($total_balance_amount - $alot_fee_discount, 2, '.', ''));
                                                                                ?></td>
                                                    <td class="text text-right"></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="tab-pane" id="documents">
                            <div class="timeline-header no-border">
                                <button type="button" data-student-session-id="<?php echo $student['student_session_id'] ?>" class="btn btn-xs btn-primary pull-right myTransportFeeBtn"> <i class="fa fa-upload"></i> <?php echo $this->lang->line('upload_documents'); ?></button>

                                <!-- <h2 class="page-header"><?php //echo $this->lang->line('documents');             
                                                                ?> <?php //echo $this->lang->line('list');             
                                                                    ?></h2> -->
                                <div class="table-responsive" style="clear: both;">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <?php echo $this->lang->line('title'); ?>
                                                </th>
                                                <th>
                                                    <?php echo $this->lang->line('file'); ?> <?php echo $this->lang->line('name'); ?>
                                                </th>
                                                <th class="mailbox-date text-right">
                                                    <?php echo $this->lang->line('action'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <div class="row">
                                            <tbody>
                                                <?php
                                                if (empty($student_doc)) {
                                                ?>
                                                    <tr>
                                                        <td colspan="5" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    foreach ($student_doc as $value) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value['title']; ?></td>
                                                            <td><?php echo $value['doc']; ?></td>
                                                            <td class="mailbox-date pull-right">
                                                                <a href="<?php echo base_url(); ?>student/download/<?php echo $value['student_id'] . "/" . $value['doc']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                                <a href="<?php echo base_url(); ?>student/doc_delete/<?php echo $value['id'] . "/" . $value['student_id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            </table>
                        </div>

                        <div class="tab-pane" id="timelineh">
                            <div> <?php if ($this->rbac->hasPrivilege('student_timeline', 'can_add')) { ?>
                                    <input type="button" id="myTimelineButton" class="btn btn-sm btn-primary pull-right " value="<?php echo $this->lang->line('add') ?>" />

                                <?php } ?>
                            </div>


                            <br />
                            <div class="timeline-header no-border">
                                <div id="timeline_list">
                                    <?php
                                    if (empty($timeline_list)) {
                                    ?>
                                        <br />
                                        <div class="alert alert-info"><?php echo $this->lang->line("no_record_found") ?></div>



                                    <?php } else {
                                    ?>

                                        <ul class="timeline timeline-inverse">
                                            <?php
                                            foreach ($timeline_list as $key => $value) {
                                            ?>
                                                <li class="time-label">
                                                    <span class="bg-blue"> <?php
                                                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['timeline_date']));
                                                                            ?></span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-list-alt bg-blue"></i>
                                                    <div class="timeline-item">
                                                        <?php if ($this->rbac->hasPrivilege('student_timeline', 'can_delete')) { ?>
                                                            <span class="time"><a class="defaults-c text-right" data-toggle="tooltip" title="" onclick="delete_timeline('<?php echo $value['id']; ?>')" data-original-title="Delete"><i class="fa fa-trash"></i></a></span>
                                                        <?php } ?>
                                                        <?php if (!empty($value["document"])) { ?>
                                                            <span class="time"><a class="defaults-c text-right" style="color:#0084B4" data-toggle="tooltip" title="" href="<?php echo base_url() . "admin/timeline/download/" . $value["id"] . "/" . $value["document"] ?>" data-original-title="Download"><i class="fa fa-download"></i></a></span>
                                                        <?php } ?>
                                                        <h3 class="timeline-header text-aqua"> <?php echo $value['title']; ?> </h3>
                                                        <div class="timeline-body">
                                                            <?php echo $value['description']; ?>

                                                        </div>

                                                    </div>
                                                </li>

                                            <?php } ?>
                                            <li><i class="fa fa-clock-o bg-gray"></i></li>
                                        <?php } ?>
                                        </ul>
                                </div>


                                <!-- <h2 class="page-header"><?php //echo $this->lang->line('documents');               
                                                                ?> <?php //echo $this->lang->line('list');               
                                                                    ?></h2> -->

                            </div>

                        </div>

                        <div class="tab-pane" id="exam">

                            <div class="examgroup_result1"> </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<div class="modal fade" id="myTimelineModal" role="dialog">
    <div class="modal-dialog modal-sm400">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title transport_fees_title"></h4>
            </div>
            <div class="">
                <div class="">


                    <form id="timelineform" name="timelineform" method="post" enctype="multipart/form-data">
                        <div class="modal-body pt0 pb0">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div id='timeline_hide_show' class="row">
                                <input type="hidden" name="student_id" value="<?php echo $student["id"] ?>" id="student_id">

                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('title'); ?></label><small class="req"> *</small>
                                        <input id="timeline_title" name="timeline_title" placeholder="" type="text" class="form-control" />
                                        <span class="text-danger"><?php echo form_error('timeline_title'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?></label><small class="req"> *</small>
                                        <input id="timeline_date" value="<?php echo set_value('timeline_date', date($this->customlib->getSchoolDateFormat())); ?>" name="timeline_date" placeholder="" type="text" class="form-control" />
                                        <span class="text-danger"><?php echo form_error('timeline_date'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                        <textarea id="timeline_desc" name="timeline_desc" placeholder="" class="form-control"></textarea>
                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                        <div class=""><input id="timeline_doc_id" name="timeline_doc" placeholder="" type="file" class="filestyle form-control" data-height="40" value="<?php echo set_value('timeline_doc'); ?>" />
                                            <span class="text-danger"><?php echo form_error('timeline_doc'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="labeltopmb0"><?php echo $this->lang->line('visible'); ?></label>
                                        <input id="visible_check" checked="checked" name="visible_check" value="yes" placeholder="" type="checkbox" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            <button type="reset" id="reset" style="display: none" class="btn btn-info pull-right">Reset</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myTransportFeesModal" role="dialog">
    <div class="modal-dialog modal-sm400">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center transport_fees_title"></h4>
            </div>
            <div class="">
                <div class="">
                    <div class="">
                        <input type="hidden" class="form-control" id="transport_student_session_id" value="0" readonly="readonly" />
                        <form id="form1" action="<?php echo site_url('student/create_doc') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="modal-body pt0 pb0">
                                <div id='upload_documents_hide_show'>
                                    <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                                    <h4><?php echo $this->lang->line('upload_documents1'); ?></h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('title'); ?><small class="req"> *</small></label>
                                        <input id="first_title" name="first_title" placeholder="" type="text" class="form-control" value="<?php echo set_value('first_title'); ?>" />
                                        <span class="text-danger"><?php echo form_error('first_title'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('documents'); ?><small class="req"> *</small></label>
                                        <div class=""><input id="first_doc_id" name="first_doc" placeholder="" type="file" class="filestyle form-control" data-height="40" value="<?php echo set_value('first_doc'); ?>" />
                                            <span class="text-danger"><?php echo form_error('first_doc'); ?></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer" style="clear:both">
                                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php //echo $this->lang->line('cancel'); 
                                                                                                                    ?></button> -->
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title_logindetail"></h4>
            </div>
            <div class="modal-body_logindetail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="disable_modal" tabindex="-1" role="dialog" aria-labelledby="evaluation" style="padding-left: 0 !important">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"><?php echo $this->lang->line('disable') . " " . $this->lang->line('student') ?></h4>
            </div>
            <form role="form" id="disable_form" method="post" enctype="multipart/form-data" action="">

                <div class="modal-body pt0 pb0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('reason'); ?></label><small class="req"> *</small>
                                        <input type="hidden" name="student_id" id="disstudent_id">
                                        <select class="form-control" name="reason">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>
                                            <?php
                                            foreach ($reason as $value) {
                                            ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['reason'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('date'); ?></label>
                                        <input name="disable_date" class="form-control date" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" type="text" />

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('note'); ?></label>
                                        <textarea name="note" class="form-control"></textarea>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="box-footer">

                    <div class="pull-right paddA10">
                        <button class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait" value=""><?php echo $this->lang->line('save'); ?></button>

                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<div id="listCollectionModal" class="modal fade">
    <div class="modal-dialog">
        <form action="<?php echo site_url('studentfee/addfeegrp'); ?>" method="POST" id="collect_fee_group">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->lang->line('collect') . " " . $this->lang->line('fees'); ?></h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary payment_collect" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i class="fa fa-money"></i> <?php echo $this->lang->line('pay'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".date_fee").datepicker({
            format: date_format,
            autoclose: true,
            language: '<?php echo $language_name; ?>',
            endDate: '+0d',
            todayHighlight: true
        });

        $(document).on('click', '.printDoc', function() {
            var main_invoice = $(this).data('main_invoice');
            var sub_invoice = $(this).data('sub_invoice');
            var student_session_id = '<?php echo $student['student_session_id'] ?>';
            $.ajax({
                url: '<?php echo site_url("studentfee/printFeesByName") ?>',
                type: 'post',
                data: {
                    'student_session_id': student_session_id,
                    'main_invoice': main_invoice,
                    'sub_invoice': sub_invoice
                },
                success: function(response) {
                    Popup(response);
                }
            });
        });
        $(document).on('click', '.printInv', function() {
            var fee_master_id = $(this).data('fee_master_id');
            var fee_session_group_id = $(this).data('fee_session_group_id');
            var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
            $.ajax({
                url: '<?php echo site_url("studentfee/printFeesByGroup") ?>',
                type: 'post',
                data: {
                    'fee_groups_feetype_id': fee_groups_feetype_id,
                    'fee_master_id': fee_master_id,
                    'fee_session_group_id': fee_session_group_id
                },
                success: function(response) {
                    Popup(response);
                }
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).on('click', '.save_button', function(e) {
        var $this = $(this);
        var action = $this.data('action');
        $this.button('loading');
        var form = $(this).attr('frm');
        var feetype = $('#feetype_').val();
        var date = $('#date').val();
        var student_session_id = $('#std_id').val();
        var amount = $('#amount').val();
        var amount_discount = $('#amount_discount').val();
        var amount_fine = $('#amount_fine').val();
        var description = $('#description').val();
        var parent_app_key = $('#parent_app_key').val();
        var guardian_phone = $('#guardian_phone').val();
        var guardian_email = $('#guardian_email').val();
        var student_fees_master_id = $('#student_fees_master_id').val();
        var fee_groups_feetype_id = $('#fee_groups_feetype_id').val();
        var payment_mode = $('input[name="payment_mode_fee"]:checked').val();
        var student_fees_discount_id = $('#discount_group').val();
        $.ajax({
            url: '<?php echo site_url("studentfee/addstudentfee") ?>',
            type: 'post',
            data: {
                action: action,
                student_session_id: student_session_id,
                date: date,
                type: feetype,
                amount: amount,
                amount_discount: amount_discount,
                amount_fine: amount_fine,
                description: description,
                student_fees_master_id: student_fees_master_id,
                fee_groups_feetype_id: fee_groups_feetype_id,
                payment_mode: payment_mode,
                guardian_phone: guardian_phone,
                guardian_email: guardian_email,
                student_fees_discount_id: student_fees_discount_id,
                parent_app_key: parent_app_key
            },
            dataType: 'json',
            success: function(response) {
                $this.button('reset');
                if (response.status === "success") {
                    if (action === "collect") {
                        window.location.replace(window.location.href.split("#")[0]+"#fee");
                        location.reload(true);
                    } else if (action === "print") {
                        Popup(response.print, true);
                    }
                } else if (response.status === "fail") {
                    $.each(response.error, function(index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            }
        });
    });
</script>


<script>
    var base_url = '<?php echo base_url() ?>';

    function Popup(data, winload = false) {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
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
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
            if (winload) {
                window.location.reload(true);
            }
        }, 500);


        return true;
    }
    $(document).ready(function() {
        $('.delmodal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        $('#listCollectionModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $('#confirm-delete').on('show.bs.modal', function(e) {
            $('.invoice_no', this).text("");
            $('#main_invoice', this).val("");
            $('#sub_invoice', this).val("");

            $('.invoice_no', this).text($(e.relatedTarget).data('invoiceno'));
            $('#main_invoice', this).val($(e.relatedTarget).data('main_invoice'));
            $('#sub_invoice', this).val($(e.relatedTarget).data('sub_invoice'));


        });

        $('#confirm-discountdelete').on('show.bs.modal', function(e) {
            $('.discount_title', this).text("");
            $('#discount_id', this).val("");
            $('.discount_title', this).text($(e.relatedTarget).data('discounttitle'));
            $('#discount_id', this).val($(e.relatedTarget).data('discountid'));
        });

        $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var main_invoice = $('#main_invoice').val();
            var sub_invoice = $('#sub_invoice').val();

            $modalDiv.addClass('modalloading');
            $.ajax({
                type: "post",
                url: '<?php echo site_url("studentfee/deleteFee") ?>',
                dataType: 'JSON',
                data: {
                    'main_invoice': main_invoice,
                    'sub_invoice': sub_invoice
                },
                success: function(data) {
                    $modalDiv.modal('hide').removeClass('modalloading');
                    location.reload(true);
                }
            });


        });

        $('#confirm-discountdelete').on('click', '.btn-discountdel', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var discount_id = $('#discount_id').val();


            $modalDiv.addClass('modalloading');
            $.ajax({
                type: "post",
                url: '<?php echo site_url("studentfee/deleteStudentDiscount") ?>',
                dataType: 'JSON',
                data: {
                    'discount_id': discount_id
                },
                success: function(data) {
                    $modalDiv.modal('hide').removeClass('modalloading');
                    location.reload(true);
                }
            });


        });


        $(document).on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var main_invoice = $('#main_invoice').val();
            var sub_invoice = $('#sub_invoice').val();

            $modalDiv.addClass('modalloading');
            $.ajax({
                type: "post",
                url: '<?php echo site_url("studentfee/deleteFee") ?>',
                dataType: 'JSON',
                data: {
                    'main_invoice': main_invoice,
                    'sub_invoice': sub_invoice
                },
                success: function(data) {
                    $modalDiv.modal('hide').removeClass('modalloading');
                    location.reload(true);
                }
            });


        });
        $('.detail_popover').popover({
            placement: 'right',
            title: '',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function() {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
    var fee_amount = 0;
    var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
</script>
<div class="modal fade" id="myFeesModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title text-center fees_title"></h4>
            </div>
            <div class="modal-body pb0">
                <div class="form-horizontal balanceformpopup">
                    <div class="box-body">

                        <input type="hidden" class="form-control" id="std_id" value="<?php echo $student["student_session_id"]; ?>" readonly="readonly" />
                        <input type="hidden" class="form-control" id="parent_app_key" value="<?php echo $student['parent_app_key'] ?>" readonly="readonly" />
                        <input type="hidden" class="form-control" id="guardian_phone" value="<?php echo $student['guardian_phone'] ?>" readonly="readonly" />
                        <input type="hidden" class="form-control" id="guardian_email" value="<?php echo $student['guardian_email'] ?>" readonly="readonly" />
                        <input type="hidden" class="form-control" id="student_fees_master_id" value="0" readonly="readonly" />
                        <input type="hidden" class="form-control" id="fee_groups_feetype_id" value="0" readonly="readonly" />
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"><?php echo $this->lang->line('date'); ?></label>
                            <div class="col-sm-9">
                                <input id="date" name="admission_date" placeholder="" type="text" class="form-control date_fee" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('amount'); ?><small class="req"> *</small></label>
                            <div class="col-sm-9">

                                <input type="text" autofocus="" class="form-control modal_amount" id="amount" value="0">

                                <span class="text-danger" id="amount_error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"> <?php echo $this->lang->line('discount'); ?> <?php echo $this->lang->line('group'); ?></label>
                            <div class="col-sm-9">
                                <select class="form-control modal_discount_group" id="discount_group">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                </select>

                                <span class="text-danger" id="amount_error"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('discount'); ?><small class="req"> *</small></label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                        <div class="">
                                            <input type="text" class="form-control" id="amount_discount" value="0">

                                            <span class="text-danger" id="amount_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 ltextright">

                                        <label for="inputPassword3" class="control-label"><?php echo $this->lang->line('fine'); ?><small class="req">*</small></label>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="">
                                            <input type="text" class="form-control" id="amount_fine" value="0">

                                            <span class="text-danger" id="amount_fine_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--./col-sm-9-->
                        </div>




                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('mode'); ?></label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="payment_mode_fee" value="Cash" checked="checked"><?php echo $this->lang->line('cash'); ?>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="payment_mode_fee" value="Cheque"><?php echo $this->lang->line('cheque'); ?>
                                </label>
                                <span class="text-danger" id="payment_mode_error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line('note'); ?></label>

                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="description" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <button type="button" class="btn cfees save_button" id="load" data-action="collect" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $currency_symbol; ?> <?php echo $this->lang->line('collect_fees'); ?> </button>
                <button type="button" class="btn cfees save_button" id="load" data-action="print" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $currency_symbol; ?> <?php echo $this->lang->line('collect') . " & " . $this->lang->line('print') ?></button>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $("#myFeesModal").on('shown.bs.modal', function(e) {
        e.stopPropagation();
        var discount_group_dropdown = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        var data = $(e.relatedTarget).data();
        var modal = $(this);
        var type = data.type;
        var amount = data.amount;
        var group = data.group;
        var fee_groups_feetype_id = data.fee_groups_feetype_id;
        var student_fees_master_id = data.student_fees_master_id;
        var student_session_id = data.student_session_id;

        $('.fees_title').html("");
        $('.fees_title').html("<b>" + group + ":</b> " + type);
        $('#fee_groups_feetype_id').val(fee_groups_feetype_id);
        $('#student_fees_master_id').val(student_fees_master_id);



        $.ajax({
            type: "post",
            url: '<?php echo site_url("studentfee/geBalanceFee") ?>',
            dataType: 'JSON',
            data: {
                'fee_groups_feetype_id': fee_groups_feetype_id,
                'student_fees_master_id': student_fees_master_id,
                'student_session_id': student_session_id
            },
            beforeSend: function() {
                $('#discount_group').html("");
                $("span[id$='_error']").html("");
                $('#amount').val("");
                $('#amount_discount').val("0");
                $('#amount_fine').val("0");
                modal.addClass('modal_loading');
            },
            success: function(data) {

                if (data.status === "success") {
                    fee_amount = data.balance;

                    $('#amount').val(data.balance);
                    $('#amount_fine').val(data.remain_amount_fine);


                    $.each(data.discount_not_applied, function(i, obj) {
                        discount_group_dropdown += "<option value=" + obj.student_fees_discount_id + " data-disamount=" + obj.amount + ">" + obj.code + "</option>";
                    });
                    $('#discount_group').append(discount_group_dropdown);




                }
            },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");

            },
            complete: function() {
                modal.removeClass('modal_loading');
            }
        });


    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });
    $(document).ready(function() {
        $('.table-fixed-header').fixedHeader();
    });

    //  $(window).on('resize', function () {
    //    $('.header-copy').width($('.table-fixed-header').width())
    //});

    (function($) {

        $.fn.fixedHeader = function(options) {
            var config = {
                topOffset: 50
                //bgColor: 'white'
            };
            if (options) {
                $.extend(config, options);
            }

            return this.each(function() {
                var o = $(this);

                var $win = $(window);
                var $head = $('thead.header', o);
                var isFixed = 0;
                var headTop = $head.length && $head.offset().top - config.topOffset;

                function processScroll() {
                    if (!o.is(':visible')) {
                        return;
                    }
                    if ($('thead.header-copy').size()) {
                        $('thead.header-copy').width($('thead.header').width());
                    }
                    var i;
                    var scrollTop = $win.scrollTop();
                    var t = $head.length && $head.offset().top - config.topOffset;
                    if (!isFixed && headTop !== t) {
                        headTop = t;
                    }
                    if (scrollTop >= headTop && !isFixed) {
                        isFixed = 1;
                    } else if (scrollTop <= headTop && isFixed) {
                        isFixed = 0;
                    }
                    isFixed ? $('thead.header-copy', o).offset({
                        left: $head.offset().left
                    }).removeClass('hide') : $('thead.header-copy', o).addClass('hide');
                }
                $win.on('scroll', processScroll);

                // hack sad times - holdover until rewrite for 2.1
                $head.on('click', function() {
                    if (!isFixed) {
                        setTimeout(function() {
                            $win.scrollTop($win.scrollTop() - 47);
                        }, 10);
                    }
                });

                $head.clone().removeClass('header').addClass('header-copy header-fixed').appendTo(o);
                var header_width = $head.width();
                o.find('thead.header-copy').width(header_width);
                o.find('thead.header > tr:first > th').each(function(i, h) {
                    var w = $(h).width();
                    o.find('thead.header-copy> tr > th:eq(' + i + ')').width(w);
                });
                $head.css({
                    margin: '0 auto',
                    width: o.width(),
                    'background-color': config.bgColor
                });
                processScroll();
            });
        };

    })(jQuery);


    $(".applydiscount").click(function() {
        $("span[id$='_error']").html("");
        $('.discount_title').html("");
        $('#student_fees_discount_id').val("");
        var student_fees_discount_id = $(this).data("student_fees_discount_id");
        var modal_title = $(this).data("modal_title");


        $('.discount_title').html("<b>" + modal_title + "</b>");

        $('#student_fees_discount_id').val(student_fees_discount_id);
        $('#myDisApplyModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });




    $(document).on('click', '.dis_apply_button', function(e) {
        var $this = $(this);
        $this.button('loading');

        var discount_payment_id = $('#discount_payment_id').val();
        var student_fees_discount_id = $('#student_fees_discount_id').val();
        var dis_description = $('#dis_description').val();

        $.ajax({
            url: '<?php echo site_url("admin/feediscount/applydiscount") ?>',
            type: 'post',
            data: {
                discount_payment_id: discount_payment_id,
                student_fees_discount_id: student_fees_discount_id,
                dis_description: dis_description
            },
            dataType: 'json',
            success: function(response) {
                $this.button('reset');
                if (response.status === "success") {
                    location.reload(true);
                } else if (response.status === "fail") {
                    $.each(response.error, function(index, value) {
                        var errorDiv = '#' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.printSelected', function() {
            var array_to_print = [];
            $.each($("input[name='fee_checkbox']:checked"), function() {
                var fee_session_group_id = $(this).data('fee_session_group_id');
                var fee_master_id = $(this).data('fee_master_id');
                var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
                item = {};
                item["fee_session_group_id"] = fee_session_group_id;
                item["fee_master_id"] = fee_master_id;
                item["fee_groups_feetype_id"] = fee_groups_feetype_id;

                array_to_print.push(item);
            });
            if (array_to_print.length === 0) {
                alert("<?php echo $this->lang->line('no_record_selected'); ?>");
            } else {
                $.ajax({
                    url: '<?php echo site_url("studentfee/printFeesByGroupArray") ?>',
                    type: 'post',
                    data: {
                        'data': JSON.stringify(array_to_print)
                    },
                    success: function(response) {
                        Popup(response);
                    }
                });
            }
        });


        $(document).on('click', '.collectSelected', function() {
            var $this = $(this);
            var array_to_collect_fees = [];
            $.each($("input[name='fee_checkbox']:checked"), function() {
                var fee_session_group_id = $(this).data('fee_session_group_id');
                var fee_master_id = $(this).data('fee_master_id');
                var fee_groups_feetype_id = $(this).data('fee_groups_feetype_id');
                item = {};
                item["fee_session_group_id"] = fee_session_group_id;
                item["fee_master_id"] = fee_master_id;
                item["fee_groups_feetype_id"] = fee_groups_feetype_id;

                array_to_collect_fees.push(item);
            });

            $.ajax({
                type: 'POST',
                url: base_url + "studentfee/getcollectfee",
                data: {
                    'data': JSON.stringify(array_to_collect_fees)
                },
                dataType: "JSON",
                beforeSend: function() {
                    $this.button('loading');
                    console.log(JSON.stringify(array_to_collect_fees));
                    console.log(base_url + "studentfee/getcollectfee");
                },
                success: function(data) {

                    $("#listCollectionModal .modal-body").html(data.view);
                    $(".date").datepicker({
                        format: date_format,
                        autoclose: true,
                        language: '<?php echo $language_name; ?>',
                        endDate: '+0d',
                        todayHighlight: true
                    });
                    $("#listCollectionModal").modal('show');
                    $this.button('reset');
                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");

                },
                complete: function() {
                    $this.button('reset');
                }
            });

        });

    });


    $(function() {
        $(document).on('change', "#discount_group", function() {
            var amount = $('option:selected', this).data('disamount');

            var balance_amount = (parseFloat(fee_amount) - parseFloat(amount)).toFixed(2);
            if (typeof amount !== typeof undefined && amount !== false) {
                $('div#myFeesModal').find('input#amount_discount').prop('readonly', true).val(amount);
                $('div#myFeesModal').find('input#amount').val(balance_amount);

            } else {
                $('div#myFeesModal').find('input#amount').val(fee_amount);
                $('div#myFeesModal').find('input#amount_discount').prop('readonly', false).val(0);
            }

        });
    });

    $("#collect_fee_group").submit(function(e) {
        var form = $(this);
        var url = form.attr('action');
        var smt_btn = $(this).find("button[type=submit]");
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'JSON',
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function() {
                smt_btn.button('loading');
            },
            success: function(response) {

                if (response.status === 1) {
                    window.location.replace(window.location.href.split("#")[0]+"#fee");
                        location.reload(true);
                } else if (response.status === 0) {
                    $.each(response.error, function(index, value) {
                        var errorDiv = '#form_collection_' + index + '_error';
                        $(errorDiv).empty().append(value);
                    });
                }
            },
            error: function(xhr) { // if error occured

                alert("Error occured.please try again");

            },
            complete: function() {
                smt_btn.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    $("#select_all").change(function() { //"select all" change 
        $('input:checkbox').not(this).prop('checked', this.checked);
        // $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });
</script>

<script>

let url = window.location.href.split("#");
    /*
        activity
fee
documents
timelineh
    */
    if (url.length == 2) {
        let id = url[1];
        switch (id) {
            case "activity":
                break;
            case "fee":
                activateTab('tab2',id);
                break;
            case "documents":
                activateTab('tab3',id);
                break;
            case "timelineh":
                activateTab('tab4',id);
                break;

            default:
                break;
        }
    }

    function activateTab(tab, id){
        document.getElementById('tab1').className='';
        document.getElementById(tab).className+=' active';
        document.getElementById('activity').className= document.getElementById('activity').className.split(' ')[0];
        document.getElementById(id).className+=' active';
    }
</script>