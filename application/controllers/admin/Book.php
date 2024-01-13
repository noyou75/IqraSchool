<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Book extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('encoding_lib');
    }

    public function index()
    {
        if (!$this->rbac->hasPrivilege('books', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'book/index');

        $data['title'] = 'Add Book';
        $data['title_list'] = 'Book Details';
        $listbook = $this->book_model->listbook();
        $data['listbook'] = $listbook;
        $this->load->view('layout/header');
        $this->load->view('admin/book/createbook', $data);
        $this->load->view('layout/footer');
    }

    public function getall()
    {


        if (!$this->rbac->hasPrivilege('books', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'book/getall');
        if ($this->input->method() == "get") {
            $listbook = $this->book_model->bookgetall();
            $data['listbook'] = $listbook;
            // TODO: @elwiss START 12/10/2021
            $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
            FROM `expenses`
            join expense_head on expenses.exp_head_id = expense_head.id WHERE date=CURRENT_DATE();')->result();
            $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date=CURRENT_DATE();')->result();
            $data['fees'] = $this->db->query('
                SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
                where DATE(student_fees_deposite.created_at) = CURRENT_DATE();
            ')->result();
            $data['method'] = $this->input->method();
            // TODO: @elwiss END 12/10/2021
        } else {
            $period = $this->input->post('period');
            $data['period'] = $period;
            switch ($period) {
                case 'today':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date=CURRENT_DATE();')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date=CURRENT_DATE();')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
                        where DATE(student_fees_deposite.created_at) = CURRENT_DATE();
                    ')->result();
                    $data['method'] = $this->input->method();
                    break;

                case 'this_week':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 1 week) and CURRENT_DATE();')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 1 week) and CURRENT_DATE();')->result();
                    $data['fees'] = $this->db->query('
                    SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
                    FROM `student_fees_deposite`
                    LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
                    left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
                    RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
                    right JOIN student_session on student_fees_master.student_session_id = student_session.id
                    right join students on student_session.student_id = students.id
                    where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 1 week) and CURRENT_DATE();
                    ')->result();
                    // where date_format(student_fees_deposite.created_at, "%u/%m/%y") = date_format(CURRENT_DATE(), "%u/%m/%y");
                    $data['method'] = $this->input->method();
                    break;

                case 'last_week':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 2 week) and subdate(CURRENT_DATE(), interval 1 week);')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 2 week) and subdate(CURRENT_DATE(), interval 1 week);')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 2 week) and subdate(CURRENT_DATE(), interval 1 week);
')->result();
                    // where week(DATE(student_fees_deposite.created_at)) = week(CURRENT_DATE())-1;
                    $data['method'] = $this->input->method();
                    break;

                case 'this_month':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 1 month) and CURRENT_DATE();')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 1 month) and CURRENT_DATE();')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 1 month) and CURRENT_DATE();
                        ')->result();
                    // where month(DATE(student_fees_deposite.created_at)) = month(CURRENT_DATE());
                    $data['method'] = $this->input->method();
                    break;

                case 'last_month':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 2 month) and subdate(CURRENT_DATE(), interval 1 month);')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 2 month) and subdate(CURRENT_DATE(), interval 1 month);')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 2 month) and subdate(CURRENT_DATE(), interval 1 month);
                        ')->result();
                    // where month(DATE(student_fees_deposite.created_at)) = month(CURRENT_DATE()) - 1;
                    $data['method'] = $this->input->method();
                    break;

                case 'last_3_month':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 3 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 3 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 3 month) and subdate(CURRENT_DATE(), interval 0 month);
                        ')->result();
                    $data['method'] = $this->input->method();
                    break;

                case 'last_6_month':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 6 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 6 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 6 month) and subdate(CURRENT_DATE(), interval 0 month);
                        ')->result();
                    $data['method'] = $this->input->method();
                    break;

                case 'last_12_month':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 12 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN subdate(CURRENT_DATE(), interval 12 month) and subdate(CURRENT_DATE(), interval 0 month);')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
where student_fees_deposite.created_at BETWEEN subdate(CURRENT_DATE(), interval 12 month) and subdate(CURRENT_DATE(), interval 0 month);
                        ')->result();
                    $data['method'] = $this->input->method();
                    break;

                case 'this_year':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE year(date)=year(CURRENT_DATE());')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE year(date)=year(CURRENT_DATE());')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
                        where year(DATE(student_fees_deposite.created_at)) = year(CURRENT_DATE());
                    ')->result();
                    $data['method'] = $this->input->method();
                    break;

                case 'last_year':
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE year(date)=year(CURRENT_DATE()) - 1;')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE year(date)=year(CURRENT_DATE()) - 1;')->result();
                    $data['fees'] = $this->db->query('
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
                        where year(DATE(student_fees_deposite.created_at)) = year(CURRENT_DATE()) - 1;
                    ')->result();
                    $data['method'] = $this->input->method();
                    break;

                default:
                    # code...
                    $date_from = $this->input->post('date_from');
                    $date_to = $this->input->post('date_to');
                    $data['expenses'] = $this->db->query('SELECT expenses.name, expenses.amount, expense_head.exp_category, expenses.date
FROM `expenses`
join expense_head on expenses.exp_head_id = expense_head.id WHERE date BETWEEN STR_TO_DATE("' . $date_from . '","%d/%m/%Y") AND STR_TO_DATE("' . $date_to . '","%d/%m/%Y");')->result();
                    $data['income'] = $this->db->query('SELECT income.name, income.amount, income_head.income_category, income.date
FROM `income`
join income_head on income.inc_head_id = income_head.id WHERE date BETWEEN STR_TO_DATE("' . $date_from . '","%d/%m/%Y") AND STR_TO_DATE("' . $date_to . '","%d/%m/%Y");')->result();
                    $data['fees'] = $this->db->query(
                        '
                        SELECT CONCAT(students.firstname," ",students.lastname) as full_name, fee_groups_feetype.amount,student_fees_deposite.amount_detail as collected_by, fee_groups.name as category, student_fees_deposite.created_at as date 
FROM `student_fees_deposite`
LEFT JOIN fee_groups_feetype on student_fees_deposite.fee_groups_feetype_id = fee_groups_feetype.id
left join fee_groups on fee_groups.id = fee_groups_feetype.fee_groups_id
RIGHT JOIN student_fees_master on student_fees_deposite.student_fees_master_id = student_fees_master.id
right JOIN student_session on student_fees_master.student_session_id = student_session.id
right join students on student_session.student_id = students.id
                        where DATE(student_fees_deposite.created_at) BETWEEN STR_TO_DATE("' . $date_from . '","%d/%m/%Y") AND STR_TO_DATE("' . $date_to . '","%d/%m/%Y");'
                    )->result();
                    $data['method'] = $this->input->method();
                    $data['date_from'] = $date_from;
                    $data['date_to'] = $date_to;
                    break;
            }
        }
        $this->load->view('layout/header');
        $this->load->view('admin/book/getall', $data);
        $this->load->view('layout/footer');
    }

    function create()
    {
        if (!$this->rbac->hasPrivilege('books', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add Book';
        $data['title_list'] = 'Book Details';
        $this->form_validation->set_rules('book_title', $this->lang->line('book_title'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $listbook = $this->book_model->listbook();
            $data['listbook'] = $listbook;
            $this->load->view('layout/header');
            $this->load->view('admin/book/createbook', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'book_title' => $this->input->post('book_title'),
                'book_no' => $this->input->post('book_no'),
                'isbn_no' => $this->input->post('isbn_no'),
                'subject' => $this->input->post('subject'),
                'rack_no' => $this->input->post('rack_no'),
                'publish' => $this->input->post('publish'),
                'author' => $this->input->post('author'),
                'qty' => $this->input->post('qty'),
                'perunitcost' => $this->input->post('perunitcost'),
                'description' => $this->input->post('description')
            );

            if (isset($_POST['postdate']) && $_POST['postdate'] != '') {
                $data['postdate'] = date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('postdate')));
            }
            $this->book_model->addbooks($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/book/index');
        }
    }

    function edit($id)
    {
        if (!$this->rbac->hasPrivilege('books', 'can_edit')) {
            access_denied();
        }

        $data['title'] = 'Edit Book';
        $data['title_list'] = 'Book Details';
        $data['id'] = $id;
        $editbook = $this->book_model->get($id);
        $data['editbook'] = $editbook;
        $this->form_validation->set_rules('book_title', $this->lang->line('book_title'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $listbook = $this->book_model->listbook();
            $data['listbook'] = $listbook;
            $this->load->view('layout/header');
            $this->load->view('admin/book/editbook', $data);
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'book_title' => $this->input->post('book_title'),
                'book_no' => $this->input->post('book_no'),
                'isbn_no' => $this->input->post('isbn_no'),
                'subject' => $this->input->post('subject'),
                'rack_no' => $this->input->post('rack_no'),
                'publish' => $this->input->post('publish'),
                'author' => $this->input->post('author'),
                'qty' => $this->input->post('qty'),
                'perunitcost' => $this->input->post('perunitcost'),
                //'postdate' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('postdate'))),
                'description' => $this->input->post('description')
            );
            if (isset($_POST['postdate']) && $_POST['postdate'] != '') {
                $data['postdate'] = date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('postdate')));
            } else {
                $data['postdate'] = "";
            }

            $this->book_model->addbooks($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/book/index');
        }
    }

    function delete($id)
    {
        if (!$this->rbac->hasPrivilege('books', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Fees Master List';
        $this->book_model->remove($id);
        redirect('admin/book/getall');
    }

    public function getAvailQuantity()
    {

        $book_id = $this->input->post('book_id');
        $available = 0;
        if ($book_id != "") {
            $result = $this->bookissue_model->getAvailQuantity($book_id);
            $available = $result->qty - $result->total_issue;
        }
        $result_final = array('status' => '1', 'qty' => $available);
        echo json_encode($result_final);
    }

    function import()
    {
        $targetEncoding = "UTF-8";
        $sourceEncoding = "ISO-8859-1";
        $data['fields'] = array('book_title', 'book_no', 'isbn_no', 'subject', 'rack_no', 'publish', 'author', 'qty', 'perunitcost', 'postdate', 'description', 'available');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_csv_upload');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header');
            $this->load->view('admin/book/import', $data);
            $this->load->view('layout/footer');
        } else {
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if ($ext == 'csv') {
                    $file = $_FILES['file']['tmp_name'];
                    $this->load->library('CSVReader');
                    $result = $this->csvreader->parse_file($file);

                    $rowcount = 0;
                    if (!empty($result)) {
                        foreach ($result as $r_key => $r_value) {
                            $result[$r_key]['book_title'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['book_title']);
                            $result[$r_key]['book_no'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['book_no']);
                            $result[$r_key]['isbn_no'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['isbn_no']);
                            $result[$r_key]['subject'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['subject']);
                            $result[$r_key]['rack_no'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['rack_no']);
                            $result[$r_key]['publish'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['publish']);
                            $result[$r_key]['author'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['author']);
                            $result[$r_key]['qty'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['qty']);
                            $result[$r_key]['perunitcost'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['perunitcost']);
                            $result[$r_key]['postdate'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['postdate']);
                            $result[$r_key]['description'] = iconv($sourceEncoding, $targetEncoding, $result[$r_key]['description']);
                            
                            // $result[$r_key]['book_title'] = $this->encoding_lib->toUTF8($result[$r_key]['book_title']);
                            // $result[$r_key]['book_no'] = $this->encoding_lib->toUTF8($result[$r_key]['book_no']);
                            // $result[$r_key]['isbn_no'] = $this->encoding_lib->toUTF8($result[$r_key]['isbn_no']);
                            // $result[$r_key]['subject'] = $this->encoding_lib->toUTF8($result[$r_key]['subject']);
                            // $result[$r_key]['rack_no'] = $this->encoding_lib->toUTF8($result[$r_key]['rack_no']);
                            // $result[$r_key]['publish'] = $this->encoding_lib->toUTF8($result[$r_key]['publish']);
                            // $result[$r_key]['author'] = $this->encoding_lib->toUTF8($result[$r_key]['author']);
                            // $result[$r_key]['qty'] = $this->encoding_lib->toUTF8($result[$r_key]['qty']);
                            // $result[$r_key]['perunitcost'] = $this->encoding_lib->toUTF8($result[$r_key]['perunitcost']);
                            // $result[$r_key]['postdate'] = $this->encoding_lib->toUTF8($result[$r_key]['postdate']);
                            // $result[$r_key]['description'] = $this->encoding_lib->toUTF8($result[$r_key]['description']);
                            $rowcount++;
                        }

                        $this->db->insert_batch('books', $result);
                    }
                    $array = array('status' => 'success', 'error' => '', 'message' => $this->lang->line('records_found_in_CSV_file_total') . ' ' . $rowcount . ' ' . $this->lang->line('records_imported_successfully'));
                }
            } else {
                $msg = array(
                    'e' => 'The File field is required.',
                );
                $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('total') . ' ' . count($result) . "  " . $this->lang->line('records_found_in_CSV_file_total') . " " . $rowcount . ' ' . $this->lang->line('records_imported_successfully') . '</div>');
            redirect('admin/book/import');
        }
    }

    function import_new()
    {

        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ($ext == 'csv') {
                $file = $_FILES['file']['tmp_name'];
                $this->load->library('CSVReader');
                $result = $this->csvreader->parse_file($file);

                $rowcount = 0;
                if (!empty($result)) {
                    foreach ($result as $r_key => $r_value) {
                        $result[$r_key]['book_title'] = $this->encoding_lib->toUTF8($result[$r_key]['book_title']);
                        $result[$r_key]['book_no'] = $this->encoding_lib->toUTF8($result[$r_key]['book_no']);
                        $result[$r_key]['isbn_no'] = $this->encoding_lib->toUTF8($result[$r_key]['isbn_no']);
                        $result[$r_key]['subject'] = $this->encoding_lib->toUTF8($result[$r_key]['subject']);
                        $result[$r_key]['rack_no'] = $this->encoding_lib->toUTF8($result[$r_key]['rack_no']);
                        $result[$r_key]['publish'] = $this->encoding_lib->toUTF8($result[$r_key]['publish']);
                        $result[$r_key]['author'] = $this->encoding_lib->toUTF8($result[$r_key]['author']);
                        $result[$r_key]['qty'] = $this->encoding_lib->toUTF8($result[$r_key]['qty']);
                        $result[$r_key]['perunitcost'] = $this->encoding_lib->toUTF8($result[$r_key]['perunitcost']);
                        $result[$r_key]['postdate'] = $this->encoding_lib->toUTF8($result[$r_key]['postdate']);
                        $result[$r_key]['description'] = $this->encoding_lib->toUTF8($result[$r_key]['description']);
                        $rowcount++;
                    }

                    $this->db->insert_batch('books', $result);
                }
                $array = array('status' => 'success', 'error' => '', 'message' => 'records found in CSV file. Total ' . $rowcount . 'records imported successfully.');
            }
        } else {
            $msg = array(
                'e' => 'The File field is required.',
            );
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        }

        echo json_encode($array);
    }

    function handle_csv_upload()
    {
        $error = "";
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('csv');
            $mimes = array(
                'text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt'
            );
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if (!in_array($_FILES['file']['type'], $mimes)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('file_type_not_allowed'));
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', $this->lang->line('extension_not_allowed'));
                return false;
            }
            if ($error == "") {
                return true;
            }
        } else {
            $this->form_validation->set_message('handle_csv_upload', $this->lang->line('please_select_file'));
            return false;
        }
    }

    function exportformat()
    {
        $this->load->helper('download');
        $filepath = "./backend/import/import_book_sample_file.csv";
        $data = file_get_contents($filepath);
        $name = 'import_book_sample_file.csv';

        force_download($name, $data);
    }

    public function issue_report()
    {

        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'Library/book/issue_report');
        $data['title'] = 'Add Teacher';
        $teacher_result = $this->teacher_model->getLibraryTeacher();
        $data['teacherlist'] = $teacher_result;

        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $issued_books = $this->bookissue_model->getissueMemberBooks();

        $data['issued_books'] = $issued_books;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/book/issuereport', $data);

        $this->load->view('layout/footer', $data);
    }

    public function issue_returnreport()
    {
        $this->session->set_userdata('top_menu', 'Reports');
        $this->session->set_userdata('sub_menu', 'Reports/library');
        $this->session->set_userdata('subsub_menu', 'Reports/library/issue_returnreport');
        $data['title'] = 'Add Teacher';
        $teacher_result = $this->teacher_model->getLibraryTeacher();
        $data['teacherlist'] = $teacher_result;

        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $issued_books = $this->bookissue_model->getissuereturnMemberBooks();
        $data['issued_books'] = $issued_books;

        $this->load->view('layout/header', $data);
        $this->load->view('admin/book/issue_returnreport', $data);
        $this->load->view('layout/footer', $data);
    }
}
