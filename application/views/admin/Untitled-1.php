<div class="content-wrapper" style="min-height: 946px;">
    <section class="content">
        <div class="">

            <?php if ($mysqlVersion && $sqlMode && strpos($sqlMode->mode, 'ONLY_FULL_GROUP_BY') !== FALSE) { ?>
                                            <div class="alert alert-danger">
                                                Smart School may not work properly because ONLY_FULL_GROUP_BY is enabled, consult with your hosting
                                                provider to disable ONLY_FULL_GROUP_BY in sql_mode configuration.
                                            </div>
            <?php } ?>
 
            <?php
            $show = false;
            $role = $this->customlib->getStaffRole();
            $role_id = json_decode($role)->id;
            foreach ($notifications as $notice_key => $notice_value) {

                if ($role_id == 7) {
                    $show = true;
                } elseif (date($this->customlib->getSchoolDateFormat()) >= date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($notice_value->publish_date))) {
                    $show = true;
                }
                if ($show) {
                    ?>

                                                                            <div class="dashalert alert alert-success alert-dismissible" role="alert">
                                                                                <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close"
                                                                                    data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>

                                                                                <a href="<?php echo site_url('admin/notification') ?>">
                                                                                    <?php echo $notice_value->title; ?>
                                                                                </a>
                                                                            </div>

                                                                            <?php
                }
            }
            ?>

        </div>
        <div class="row">
            <?php
            if ($this->module_lib->hasActive('fees_collection')) {
                if ($this->rbac->hasPrivilege('fees_awaiting_payment_widegts', 'can_view')) {
                    ?>
                                                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                                                <div class="topprograssstart">
                                                                                    <p class="text-uppercase mt5 clearfix"><i class="fa fa-money ftlayer"></i>
                                                                                        <?php echo $this->lang->line('fees') . " " . $this->lang->line('awaiting') . " " . $this->lang->line('payment'); ?><span
                                                                                            class="pull-right">
                                                                                            <?php echo $total_paid; ?>/
                                                                                            <?php echo $total_fees ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-aqua" style="width: <?php echo $fessprogressbar; ?>%">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <?php
                }
            }
            ?>

            <?php
            if ($this->module_lib->hasActive('front_office')) {
                if ($this->rbac->hasPrivilege('conveted_leads_widegts', 'can_view')) {
                    ?>
                                                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                                                <div class="topprograssstart">
                                                                                    <p class="text-uppercase mt5 clearfix"><i class="fa fa-ioxhost ftlayer"></i>
                                                                                        <?php echo $this->lang->line('converted') . " " . $this->lang->line('leads') ?><span
                                                                                            class="pull-right">
                                                                                            <?php echo $total_complete + 0; ?>/
                                                                                            <?php echo $total_enquiry; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-red"
                                                                                                style="width: <?php echo $fenquiryprogressbar; ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                }
            }
            if ($this->rbac->hasPrivilege('staff_present_today_widegts', 'can_view')) {
                ?>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="topprograssstart">
                                                    <p class="text-uppercase mt5 clearfix"><i class="fa fa-calendar-check-o ftlayer"></i>
                                                        <?php echo $this->lang->line('staff') . ' ' . $this->lang->line('present') . ' ' . $this->lang->line('today'); ?><span
                                                            class="pull-right">
                                                            <?php echo $Staffattendence_data + 0; ?>/
                                                            <?php echo $getTotalStaff_data; ?>
                                                        </span>
                                                    </p>
                                                    <div class="progress-group">
                                                        <div class="progress progress-minibar">
                                                            <div class="progress-bar progress-bar-green"
                                                                style="width: <?php echo $percentTotalStaff_data; ?>%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
            }
            if ($this->module_lib->hasActive('student_attendance')) {
                if ($this->rbac->hasPrivilege('student_present_today_widegts', 'can_view')) {
                    ?>


                                                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                                                <div class="topprograssstart">
                                                                                    <p class="text-uppercase mt5 clearfix"><i class="fa fa-calendar-check-o ftlayer"></i>
                                                                                        <?php echo $this->lang->line('student') . ' ' . $this->lang->line('present') . ' ' . $this->lang->line('today'); ?><span
                                                                                            class="pull-right">
                                                                                            <?php echo 0 + $attendence_data['total_half_day'] + $attendence_data['total_late'] + $attendence_data['total_present']; ?>/
                                                                                            <?php echo $total_students; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-yellow"
                                                                                                style="width: <?php echo 0 + $attendence_data['total_half_day'] + $attendence_data['total_late'] + $attendence_data['total_present']; ?>%">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                            <?php }
            }
            ?>
        </div><!--./row-->


        <div class="row">
            <?php
            $bar_chart = true;

            if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
                if ($this->rbac->hasPrivilege('fees_collection_and_expense_monthly_chart', 'can_view')) {

                    $div_rol = 3;
                    $userdata = $this->customlib->getUserData();
                    ?>
                                                                            <div class="col-lg-7 col-md-7 col-sm-12 col60">

                                                                                <div class="box box-primary borderwhite">
                                                                                    <div class="box-header with-border">
                                                                                        <h3 class="box-title">
                                                                                            <?php echo $this->lang->line('fees_collection_&_expenses_for'); ?>
                                                                                            <?php echo $this->lang->line('_expenses_for') ?>
                                                                                            <?php echo $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                                                                                            ;
                                                                                            ?>
                                                                                        </h3>
                                                                                        <div class="box-tools pull-right">
                                                                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="box-body">
                                                                                        <div class="chart">
                                                                                            <canvas id="barChart" height="95"></canvas>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                            <?php }
            }
            ?>
            <?php
            if ($this->module_lib->hasActive('income')) {
                if ($this->rbac->hasPrivilege('income_donut_graph', 'can_view')) {
                    ?>
                                                                            <div class="col-lg-5 col-md-5 col-sm-12 col40">

                                                                                <div class="box box-primary borderwhite">
                                                                                    <div class="box-header with-border">
                                                                                        <h3 class="box-title">
                                                                                            <?php echo $this->lang->line('income') . " - " . $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                                                                                            ;
                                                                                            ?>
                                                                                        </h3>
                                                                                    </div>


                                                                                    <div class="box-body">
                                                                                        <div class="chart-responsive">
                                                                                            <canvas id="doughnut-chart" class="" height="148"></canvas>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <?php
                }
            }
            ?>
        </div><!--./row-->

        <div class="row">
            <?php
            $line_chart = true;
            if (($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))) {
                if ($this->rbac->hasPrivilege('fees_collection_and_expense_yearly_chart', 'can_view')) {
                    $div_rol = 3;
                    ?>
                                                                            <div class="col-lg-7 col-md-7 col-sm-12 col60">

                                                                                <div class="box box-info borderwhite">
                                                                                    <div class="box-header with-border">
                                                                                        <h3 class="box-title">
                                                                                            <?php echo $this->lang->line('fees_collection_&_expenses_for_session'); ?>
                                                                                            <?php echo $this->setting_model->getCurrentSessionName(); ?>
                                                                                        </h3>
                                                                                        <div class="box-tools pull-right">
                                                                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box-body">
                                                                                        <div class="chart">
                                                                                            <canvas id="lineChart" height="95"></canvas>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                            <?php
                }
            }
            if ($this->module_lib->hasActive('expense')) {
                ?>
                                            <?php if ($this->rbac->hasPrivilege('expense_donut_graph', 'can_view')) { ?>
                                                                            <div class="col-lg-5 col-md-5 col-sm-12 col40">
                                                                                <div class="box box-primary borderwhite">
                                                                                    <div class="box-header with-border">
                                                                                        <h3 class="box-title">
                                                                                            <?php echo $this->lang->line('expense') . " - " . $this->lang->line(strtolower(date('F'))) . " " . date('Y');
                                                                                            ;
                                                                                            ?>
                                                                                        </h3>
                                                                                    </div><!--./info-box-->

                                                                                    <div class="box-body">
                                                                                        <div class="chart-responsive">
                                                                                            <canvas id="doughnut-chart1" class="" height="148"></canvas>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                </div>
                                                                            </div>
                                            <?php }
            }
            ?>
        </div><!--./row-->




        <div class="row">


            <?php
            if ($this->module_lib->hasActive('fees_collection')) {
                if ($this->rbac->hasPrivilege('fees_overview_widegts', 'can_view')) {
                    ?>
                                                                            <div class="col-md-3 col-sm-6">

                                                                                <div class="topprograssstart">
                                                                                    <h5 class="pro-border pb10">
                                                                                        <?php echo $this->lang->line('fees') . " " . $this->lang->line('overview') ?>
                                                                                    </h5>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $fees_overview['total_unpaid']; ?>
                                                                                        <?php echo $this->lang->line('unpaid'); ?><span class="pull-right">
                                                                                            <?php echo round($fees_overview['unpaid_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar" style="width: <?php echo $fees_overview['unpaid_progress']; ?>%">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $fees_overview['total_partial']; ?>
                                                                                        <?php echo $this->lang->line('partial'); ?><span class="pull-right">
                                                                                            <?php echo round($fees_overview['partial_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-aqua"
                                                                                                style="width: <?php echo $fees_overview['partial_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $fees_overview['total_paid']; ?>
                                                                                        <?php echo $this->lang->line('paid'); ?><span class="pull-right">
                                                                                            <?php echo round($fees_overview['paid_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-aqua"
                                                                                                style="width: <?php echo $fees_overview['paid_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <?php
                }
            }
            if ($this->module_lib->hasActive('front_office')) {
                if ($this->rbac->hasPrivilege('enquiry_overview_widegts', 'can_view')) {
                    ?>
                                                                            <div class="col-md-3 col-sm-6">

                                                                                <div class="topprograssstart">
                                                                                    <h5 class="pro-border pb10">
                                                                                        <?php echo $this->lang->line('enquiry') . " " . $this->lang->line('overview'); ?>
                                                                                    </h5>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $enquiry_overview['active']; ?>
                                                                                        <?php echo $this->lang->line('active') ?><span class="pull-right">
                                                                                            <?php echo round($enquiry_overview['active_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-red"
                                                                                                style="width: <?php echo $enquiry_overview['active_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $enquiry_overview['won']; ?>
                                                                                        <?php echo $this->lang->line('won') ?><span class="pull-right">
                                                                                            <?php echo round($enquiry_overview['won_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-yellow"
                                                                                                style="width: <?php echo $enquiry_overview['won_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $enquiry_overview['passive']; ?>
                                                                                        <?php echo $this->lang->line('passive') ?><span class="pull-right">
                                                                                            <?php echo round($enquiry_overview['passive_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-yellow"
                                                                                                style="width: <?php echo $enquiry_overview['passive_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $enquiry_overview['lost']; ?>
                                                                                        <?php echo $this->lang->line('lost') ?><span class="pull-right">
                                                                                            <?php echo round($enquiry_overview['lost_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-yellow"
                                                                                                style="width: <?php echo $enquiry_overview['lost_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $enquiry_overview['dead']; ?>
                                                                                        <?php echo $this->lang->line('dead') ?><span class="pull-right">
                                                                                            <?php echo round($enquiry_overview['dead_progress'], 2); ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-yellow"
                                                                                                style="width: <?php echo $enquiry_overview['dead_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <?php
                }
            }

            if ($this->module_lib->hasActive('library')) {
                if ($this->rbac->hasPrivilege('book_overview_widegts', 'can_view')) {
                    ?>


                                                                            <div class="col-md-3 col-sm-6">

                                                                                <div class="topprograssstart">
                                                                                    <h5 class="pro-border pb10">
                                                                                        <?php echo $this->lang->line('library') . " " . $this->lang->line('overview'); ?>
                                                                                    </h5>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $book_overview['dueforreturn']; ?>
                                                                                        <?php echo $this->lang->line('due') . " " . $this->lang->line('for') . " " . $this->lang->line('return'); ?><span
                                                                                            class="pull-right"></span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-green"
                                                                                                style="width: <?php echo $book_overview['dueforreturn']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $book_overview['forreturn']; ?>
                                                                                        <?php echo $this->lang->line('returned') ?><span class="pull-right"></span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-green"
                                                                                                style="width: <?php echo $book_overview['forreturn']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $book_overview['total_issued']; ?>
                                                                                        <?php echo $this->lang->line('issued_out_of'); ?>
                                                                                        <?php echo $book_overview['total'] ?><span class="pull-right">
                                                                                            <?php echo $book_overview['issued_progress']; ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-green"
                                                                                                style="width: <?php echo $book_overview['issued_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $book_overview['availble']; ?>
                                                                                        <?php echo $this->lang->line('available_out_of') ?>
                                                                                        <?php echo $book_overview['total']; ?><span class="pull-right">
                                                                                            <?php echo $book_overview['availble_progress']; ?>%
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar progress-bar-green"
                                                                                                style="width: <?php echo $book_overview['availble_progress']; ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!--./topprograssstart-->

                                                                            </div><!--./col-md-3-->


                                                                            <?php
                }
            }
            if ($this->module_lib->hasActive('student_attendance')) {
                if ($this->rbac->hasPrivilege('today_attendance_widegts', 'can_view')) {
                    ?>
                                                                            <div class="col-md-3 col-sm-6">

                                                                                <div class="topprograssstart">
                                                                                    <h5 class="pro-border pb10">
                                                                                        <?php echo $this->lang->line('student') . " " . $this->lang->line('today') . " " . $this->lang->line('attendance'); ?>
                                                                                    </h5>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $attendence_data['total_present']; ?>
                                                                                        <?php echo $this->lang->line('present'); ?><span class="pull-right">
                                                                                            <?php echo $attendence_data['present']; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar" style="width: <?php echo $attendence_data['present']; ?>"></div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $attendence_data['total_late']; ?>
                                                                                        <?php echo $this->lang->line('late') ?><span class="pull-right">
                                                                                            <?php echo $attendence_data['late']; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar" style="width: <?php echo $attendence_data['late']; ?>"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $attendence_data['total_absent']; ?>
                                                                                        <?php echo $this->lang->line('absent'); ?><span class="pull-right">
                                                                                            <?php echo $attendence_data['absent']; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar" style="width: <?php echo $attendence_data['absent']; ?>"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="text-uppercase mt10 clearfix">
                                                                                        <?php echo $attendence_data['total_half_day']; ?>
                                                                                        <?php echo $this->lang->line('half_day'); ?><span class="pull-right">
                                                                                            <?php echo $attendence_data['half_day']; ?>
                                                                                        </span>
                                                                                    </p>
                                                                                    <div class="progress-group">
                                                                                        <div class="progress progress-minibar">
                                                                                            <div class="progress-bar" style="width: <?php echo $attendence_data['half_day']; ?>"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!--./topprograssstart-->

                                                                            </div><!--./col-md-3-->
                                                                            <?php
                }
            }


            $currency_symbol = $this->customlib->getSchoolCurrencyFormat();

            $div_col = 12;
            $div_rol = 12;
            $bar_chart = true;
            $line_chart = true;
            if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                $div_col = 9;
                $div_rol = 12;
            }

            $widget_col = array();
            if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
                $widget_col[0] = 1;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                $widget_col[1] = 2;
                $div_rol = 3;
            }

            if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
                $widget_col[2] = 3;
                $div_rol = 3;
            }
            $div = sizeof($widget_col);
            if (!empty($widget_col)) {
                $widget = 12 / $div;
            } else {

                $widget = 12;
            }
            ?>


            <div class="row">

                <div class="col-lg-9 col-md-9 col-sm-12 col80">
                    <div class="row">
                        <?php
                        if ($this->module_lib->hasActive('fees_collection')) {
                            if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) {
                                ?>
                                                                                        <div class="col-md-4 col-sm-6">
                                                                                            <div class="info-box">
                                                                                                <a href="<?php echo site_url('studentfee') ?>">
                                                                                                    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
                                                                                                    <div class="info-box-content">
                                                                                                        <span class="info-box-text">
                                                                                                            <?php echo $this->lang->line('monthly_fees_collection'); ?>
                                                                                                        </span>
                                                                                                        <span class="info-box-number">
                                                                                                            <?php echo $currency_symbol . $month_collection; ?>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                        <?php }
                        }
                        ?>
                        <?php
                        if ($this->module_lib->hasActive('expense')) {
                            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                                ?>

                                                                                        <div class="col-md-4 col-sm-6">
                                                                                            <div class="info-box">
                                                                                                <a href="<?php echo site_url('admin/expense') ?>">
                                                                                                    <span class="info-box-icon bg-red"><i class="fa fa-credit-card"></i></span>
                                                                                                    <div class="info-box-content">
                                                                                                        <span class="info-box-text">
                                                                                                            <?php echo $this->lang->line('monthly_expenses'); ?>
                                                                                                        </span>
                                                                                                        <span class="info-box-number">
                                                                                                            <?php echo $currency_symbol . $month_expense; ?>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php
                            }
                        }

                        if ($this->rbac->hasPrivilege('student_count_widget', 'can_view')) {
                            ?>


                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="info-box">
                                                                <a href="<?php echo site_url('student/search') ?>">
                                                                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text">
                                                                            <?php echo $this->lang->line('student'); ?>
                                                                        </span>
                                                                        <span class="info-box-number">
                                                                            <?php echo $total_students; ?>
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                        <?php } ?>
                    </div>


                    <?php
                    if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
                        $div_rol = 3;
                        ?>
                                                    <div class="box box-primary borderwhite" style="display: none;">
                                                        <div class="box-body">
                                                            <!-- THE CALENDAR -->
                                                            <div id="calendar"></div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /. box -->
                    <?php } ?>

                </div><!--./col-lg-9-->
                <?php
                if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                    // print_r($roles);
                    ?>

                                                <div class="col-lg-3 col-md-3 col-sm-12 col20" style="  margin-top: -210px;">

                                                    <?php foreach ($roles as $key => $value) {
                                                        ?>
                                                                                    <div class="info-box" style="  margin-bottom: 21px;">
                                                                                        <a href="#">
                                                                                            <span class="info-box-icon bg-yellow"><i class="fa fa-user-secret"></i></span>
                                                                                            <div class="info-box-content">
                                                                                                <span class="info-box-text">
                                                                                                    <?php echo $key; ?>
                                                                                                </span>
                                                                                                <span class="info-box-number">
                                                                                                    <?php echo $value; ?>
                                                                                                </span>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                    <?php } ?>



                                                </div><!--./col-lg-3-->
                <?php } ?>
            </div><!--./row-->








        </div><!--./row-->


</div>
<div id="newEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <?php echo "Add New Event"; ?>
                </h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form" id="addevent_form" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event'); ?>
                                <?php echo $this->lang->line('title'); ?>
                            </label><small class="req"> *</small>
                            <input class="form-control" name="title" id="input-field">
                            <span class="text-danger">
                                <?php echo form_error('title'); ?>
                            </span>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('description'); ?>
                            </label>
                            <textarea name="description" class="form-control" id="desc-field"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event'); ?>
                                <?php echo $this->lang->line('date'); ?>
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_dates" class="form-control pull-right"
                                    id="date-field">
                            </div>
                            <!-- <input class="form-control" type="text" autocomplete="off"  name="event_dates" id="date-field"> -->
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event'); ?>
                                <?php echo $this->lang->line('color'); ?>
                            </label>
                            <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)   ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event'); ?>
                                <?php echo $this->lang->line('type'); ?>
                            </label>
                            <br />
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="public" id="public">
                                <?php echo $this->lang->line('public'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="private" checked id="private">
                                <?php echo $this->lang->line('private'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="sameforall" id="public">
                                <?php echo $this->lang->line('all'); ?>
                                <?php echo json_decode($role)->name; ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="protected" id="public">
                                <?php echo $this->lang->line('protected'); ?>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn btn-primary submit_addevent pull-right"
                                value="<?php echo $this->lang->line('save'); ?>">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="viewEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <?php echo $this->lang->line('edit') ?>
                    <?php echo $this->lang->line('event') ?>
                </h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form" method="post" id="updateevent_form" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event') ?>
                                <?php echo $this->lang->line('title') ?>
                            </label>
                            <input class="form-control" name="title" placeholder="Event Title" id="event_title">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('description') ?>
                            </label>
                            <textarea name="description" class="form-control" placeholder="Event Description"
                                id="event_desc"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event') ?>
                                <?php echo $this->lang->line('date') ?>
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="eventdates" class="form-control pull-right"
                                    id="eventdates">
                            </div>
                            <!-- <input class="form-control" type="text" autocomplete="off" name="eventdates" placeholder="Event Dates" id="eventdates"> -->
                        </div>
                        <input type="hidden" name="eventid" id="eventid">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event') ?>
                                <?php echo $this->lang->line('color') ?>
                            </label>
                            <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color"
                                id="event_color" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)  ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $colorid = trim($color, "#");
                                // print_r($colorid);
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper selectevent">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">
                                <?php echo $this->lang->line('event') ?>
                                <?php echo $this->lang->line('type') ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="public" id="public">
                                <?php echo $this->lang->line('public') ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="private" id="private">
                                <?php echo $this->lang->line('private') ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="sameforall" id="public">
                                <?php echo $this->lang->line('all') ?>
                                <?php echo json_decode($role)->name; ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="protected" id="public">
                                <?php echo $this->lang->line('protected') ?>
                            </label>
                        </div>

                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">

                            <input type="submit" class="btn btn-primary submit_update pull-right"
                                value="<?php echo $this->lang->line('save'); ?>">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
                                                            <input type="button" id="delete_event" class="btn btn-primary submit_delete pull-right"
                                                                value="<?php echo $this->lang->line('delete'); ?>">
                            <?php } ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>