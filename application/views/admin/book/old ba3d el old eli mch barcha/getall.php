<script>
    var period = "<?php echo $period; ?>";
    var expenses = <?php echo json_encode($expenses); ?>;
    var income = <?php echo json_encode($income); ?>;
    var fees = <?php echo json_encode($fees); ?>;
    var financial_data = [];
    var sum = 0;
    if (period === "period") {
        console.log("<?php echo $date_from ?>");
        console.log("<?php echo $date_to ?>");
    }
    expenses.forEach((d, i, arr) => {
        financial_data.push({
            type: "Depense",
            category:d.exp_category,
            name: d.name,
            amount: d.amount,
            collectedBy: "-",
            date_data: new Date(d.date),
            date: new Date(d.date).toDateString(),
            color: "danger"
        });
        if (d.amount !== null) sum -= parseFloat(d.amount);
    });
    income.forEach((d, i, arr) => {
        financial_data.push({
            type: "Revenue",
            category:d.income_category,
            name: d.name,
            amount: d.amount,
            collectedBy: "-",
            date_data: new Date(d.date),
            date: new Date(d.date).toDateString(),
            color: "success"
        });
        if (d.amount !== null) sum += parseFloat(d.amount);
    });
    fees.forEach((d, i, arr) => {
        financial_data.push({
            type: "Frais",
            name: d.full_name,
            category:d.category,
            amount: d.amount,
            collectedBy: JSON.parse(d.collected_by)['1'].description,
            date_data: new Date(d.date),
            date: new Date(d.date).toDateString(),
            color: "info"
        });
        if (d.amount !== null) sum += parseFloat(d.amount);
    });
    financial_data.sort((a, b) => a.date_data - b.date_data);
</script>
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">
    /*REQUIRED*/
    .carousel-row {
        margin-bottom: 10px;
    }

    .slide-row {
        padding: 0;
        background-color: #ffffff;
        min-height: 150px;
        border: 1px solid #e7e7e7;
        overflow: hidden;
        height: auto;
        position: relative;
    }

    .slide-carousel {
        width: 20%;
        float: left;
        display: inline-block;
    }

    .slide-carousel .carousel-indicators {
        margin-bottom: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
    }

    .slide-carousel .carousel-indicators li {
        border-radius: 0;
        width: 20px;
        height: 6px;
    }

    .slide-carousel .carousel-indicators .active {
        margin: 1px;
    }

    .slide-content {
        position: absolute;
        top: 0;
        left: 20%;
        display: block;
        float: left;
        width: 80%;
        max-height: 76%;
        padding: 1.5% 2% 2% 2%;
        overflow-y: auto;
    }

    .slide-content h4 {
        margin-bottom: 3px;
        margin-top: 0;
    }

    .slide-footer {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 78%;
        height: 20%;
        margin: 1%;
    }

    /* Scrollbars */
    .slide-content::-webkit-scrollbar {
        width: 5px;
    }

    .slide-content::-webkit-scrollbar-thumb:vertical {
        margin: 5px;
        background-color: #999;
        -webkit-border-radius: 5px;
    }

    .slide-content::-webkit-scrollbar-button:start:decrement,
    .slide-content::-webkit-scrollbar-button:end:increment {
        height: 5px;
        display: block;
    }
</style>

<div class="content-wrapper" style="min-height: 946px;">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull">
                        <h1><?php echo $this->lang->line('rapp_fin'); ?></h1>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>

                    <form role="form" action="<?php echo site_url('admin/book/getall') ?>" method="post" class="">
                        <div class="box-body row">

                            <?php echo $this->customlib->getCSRF(); ?>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('search') . " " . $this->lang->line('type'); ?></label>
                                    <select class="form-control" name="period" onchange="showdate(this.value)">
                                        <option id="select-today" value="today">Today</option>
                                        <option id="select-this_week" value="this_week">This Week</option>
                                        <option id="select-last_week" value="last_week">Last Week</option>
                                        <option id="select-this_month" value="this_month">This Month</option>
                                        <option id="select-last_month" value="last_month">Last Month</option>
                                        <option id="select-last_3_month" value="last_3_month">Last 3 Months</option>
                                        <option id="select-last_6_month" value="last_6_month">Last 6 Months</option>
                                        <option id="select-last_12_month" value="last_12_month">Last 12 Months</option>
                                        <option id="select-this_year" value="this_year">This Year</option>
                                        <option id="select-last_year" value="last_year">Last Year</option>
                                        <option id="select-period" value="period">Period</option>
                                    </select>
                                </div>
                            </div>

                            <div id='date_result'>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header ptbnull">
                            <h3 class="box-title titlefix"><i class="fa fa-money"></i> <?php echo $this->lang->line('financial_book') . " " . $this->lang->line('report'); ?></h3>
                        </div>
                        <div class="box-body table-responsive">
                            <div class="download_label"><?php
                                                        echo $this->lang->line('payroll') . " " . $this->lang->line('report') . "<br>";
                                                        $this->customlib->get_postmessage();;
                                                        ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>


                                        <th><?php echo $this->lang->line('type'); ?></th>
                                        <th><?php echo $this->lang->line('category'); ?></th>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th class="text text-center"><?php echo $this->lang->line('ammount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>

                                        <th>Collectioné par</th>
                                        <th><?php echo $this->lang->line('date'); ?></th>


                                    </tr>
                                </thead>
                                <tbody id="the-table">
                                    <?php
                                    $basic = 0;
                                    $gross = 0;
                                    $net = 0;
                                    $earnings = 0;
                                    $deduction = 0;
                                    $tax = 0;

                                    if (empty($payrollList)) {
                                    ?>

                                        <?php
                                    } else {
                                        $count = 1;

                                        foreach ($payrollList as $key => $value) {


                                            $basic += $value["basic"];
                                            $gross += $value["basic"] + $value["total_allowance"];
                                            $net += $value["net_salary"];
                                            $earnings += $value["total_allowance"];
                                            $deduction += $value["total_deduction"];
                                            if ($value["tax"] != '') {
                                                $taxdata = $value["tax"];
                                            } else {
                                                $taxdata = 0;
                                            }
                                            $tax += $taxdata;
                                            $total = 0;
                                            $grd_total = 0;
                                        ?>
                                            <tr>


                                                <td style="text-transform: capitalize;">
                                                    <span data-toggle="popover" class="detail_popover" data-original-title="" title=""><a href="<?php echo base_url() ?>admin/staff/profile/<?php echo $value['staff_id']; ?>"><?php echo $value['name'] . " " . $value['surname']; ?></a></span>
                                                    <div class="fee_detail_popover" style="display: none"><?php echo $this->lang->line('staff_id'); ?><?php echo ": " . $value['employee_id']; ?></div>
                                                </td>
                                                <td>
                                                    <?php echo $value['user_type']; ?>
                                                </td>
                                                <td>
                                                    <span data-original-title="" title=""><?php
                                                                                            echo $value['designation'];;
                                                                                            ?></span>

                                                </td>
                                                <td>
                                                    <?php echo $value['month'] . " - " . $value['year']; ?>
                                                </td>
                                                <td>

                                                    <span data-toggle="popover" class="detail_popover" data-original-title="" title=""><a href="#"><?php echo $value['id']; ?></a></span>
                                                    <div class="fee_detail_popover" style="display: none"><?php echo $this->lang->line('mode'); ?>: <?php
                                                                                                                                                    if (array_key_exists($value["payment_mode"], $payment_mode)) {
                                                                                                                                                        echo $payment_mode[$value["payment_mode"]];
                                                                                                                                                    }
                                                                                                                                                    ?></div>

                                                </td>
                                                <td class="text text-right">
                                                    <?php echo number_format($value['basic'], 2, '.', ''); ?>
                                                </td>

                                                <td class="text text-right">
                                                    <?php echo (number_format($value['total_allowance'], 2, '.', '')); ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    $t = ($value['total_deduction']);
                                                    echo (number_format($t, 2, '.', ''))
                                                    ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php echo number_format($value['basic'] + $value['total_allowance'] - $t, 2, '.', ''); ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    if ($value['tax'] != '') {
                                                        $t = $value['tax'];
                                                    } else {
                                                        $t = 0;
                                                    }

                                                    echo (number_format($t, 2, '.', ''))
                                                    ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    $t = ($value['net_salary']);
                                                    echo (number_format($t, 2, '.', ''))
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                        <tr class="box box-solid total-bg">

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><?php echo $this->lang->line('grand_total'); ?> </td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($basic, 2, '.', '')); ?></td>

                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($earnings, 2, '.', '')); ?></td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($deduction, 2, '.', '')); ?></td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($gross, 2, '.', '')); ?></td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($tax, 2, '.', '')); ?></td>
                                            <td class="text text-right"><?php echo ($currency_symbol . number_format($net - $tax, 2, '.', '')); ?></td>



                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<script>
    <?php
    if ($search_type == 'period') {
    ?>

        $(document).ready(function() {
            showdate('period');
        });

    <?php
    }
    ?>
    const table = document.getElementById('the-table');
    let tableElements = "";
    financial_data.forEach((d, i, arr) => {
        tableElements += `
        <tr class="${d.color}" >
            <td>${d.type}</td>
            <td>${d.category}</td>
            <td>${d.name}</td>
            <td>${d.amount}</td>
            <td>${d.collectedBy}</td>
            <td>${d.date.toString()}</td>
        </tr>\n
    `;
    });
    tableElements += `
    <tr class="box box-solid total-bg">
        <td></td>
        <td></td>
        <td><?php echo $this->lang->line('grand_total'); ?> </td>
        <td>${sum} <?php echo $currency_symbol; ?></td>
        <td></td>
        <td></td>
    </tr>
    `;
    table.innerHTML = tableElements;
    const chosenPeriod = document.getElementById("select-" + period);
    chosenPeriod.selected = true;
</script>