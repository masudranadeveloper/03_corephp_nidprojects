<?php

class DB_con {
    private $conn; // Database connection object

    // Constructor
    public function __construct() {
        // Database configuration
        $hostname = "localhost";     // Hostname or IP address of the database server
        $username = "root"; // Username to connect to the database
        $password = ""; // Password to connect to the database
        $database = "03_nid_projects"; // Name of the database

        // Create a connection object
        $this->conn = mysqli_connect($hostname, $username, $password, $database);

        // Check the connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Function to fetch user certificate number by ID
    public function user_certi_no($id) {
        $query = "SELECT * FROM `tbl_submission` WHERE `certi_no`='{$id}'";
        $result = mysqli_query($this->conn, $query);
        $data = mysqli_fetch_assoc($result);
            return $data;
        
    }

    // signin
    public function signin($uname, $pasword)
    {
        // Escape the values
        $uname2 = mysqli_real_escape_string($this->conn, $uname);
        $pasword2 = mysqli_real_escape_string($this->conn, $pasword);
        $query = "SELECT * FROM `tblusers` WHERE `Username`='{$uname2}' AND `Password`='{$pasword2}'";
        $result = mysqli_query($this->conn, $query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            return mysqli_fetch_assoc($result);
        }else{
            return 0;
        }
    }
    
    // registration
    public function registration($fname, $uname, $uemail, $pasword)
    {
        $fname2 = mysqli_real_escape_string($this->conn, $fname);
        $uname2 = mysqli_real_escape_string($this->conn, $uname);
        $uemail2 = mysqli_real_escape_string($this->conn, $uemail);
        $pasword2 = mysqli_real_escape_string($this->conn, $pasword);
        $date = date('d M, Y h:i:s p');
        // check email is exist??
        $query_email = "SELECT * FROM `tblusers` WHERE `UserEmail`='{$uemail2}'";
        $result_email = mysqli_query($this->conn, $query_email);
        $count_em = mysqli_num_rows($result_email);
        if($count_em > 0){
            return 1;
        }

        // check username is exist??
        $query_username = "SELECT * FROM `tblusers` WHERE `Username`='{$uname2}'";
        $result_username = mysqli_query($this->conn, $query_username);
        $count_user = mysqli_num_rows($result_username);
        if($count_user > 0){
            return 2;
        }

        $query = "INSERT INTO `tblusers`(`FullName`, `Username`, `UserEmail`, `Password`, `role`, `RegDate`) VALUES ('{$fname2}','{$uname2}','{$uemail2}','{$pasword2}','0','{$date}')";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return 0;
        }else{
            return 3;
        }

        
    }
    // fetchdata
    public function fetchdata($id)
    {
        $query = "SELECT * FROM `tbl_submission` WHERE `submitted_by`='{$id}' ORDER BY `id` DESC";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // get_balance
    public function get_balance($id)
    {
        $query_deposit = "SELECT SUM(`deposit`) as total_withdraw FROM `tbl_balance` WHERE `user_id`='{$id}'";
        $result_deposit = mysqli_query($this->conn, $query_deposit);
        $row_deposit = mysqli_fetch_assoc($result_deposit);

        $query_withdraw = "SELECT SUM(`withdraw`) as total_withdraw FROM `tbl_balance` WHERE `user_id`='{$id}'";
        $result_withdraw = mysqli_query($this->conn, $query_withdraw);
        $row_withdraw = mysqli_fetch_assoc($result_withdraw);

        return $row_deposit['total_withdraw'] - $row_withdraw['total_withdraw'];
    }

    // user_id
    public function user_id($cr_id, $user_id)
    {
        $query = "SELECT * FROM `tbl_submission` WHERE `id`='{$cr_id}' AND `submitted_by`='{$user_id}'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    // update_submission
    public function update_submission($certi_no, $type, $national_id, $passport_no, $nationality, $name, $gender, $date_birth, $doseone_date, $doseone_name, $dosetwo_date, $dosetwo_name, $dosethree_date, $dosethree_name, $vacc_center, $vacc_by, $total_dose, $id)
    {
        $certi_no2 = mysqli_real_escape_string($this->conn, $certi_no);
        $type2 = mysqli_real_escape_string($this->conn, $type);
        $national_id2 = mysqli_real_escape_string($this->conn, $national_id);
        $passport_no2 = mysqli_real_escape_string($this->conn, $passport_no);
        $nationality2 = mysqli_real_escape_string($this->conn, $nationality);
        $name2 = mysqli_real_escape_string($this->conn, $name);
        $gender2 = mysqli_real_escape_string($this->conn, $gender);
        $date_birth2 = mysqli_real_escape_string($this->conn, $date_birth);
        $doseone_date2 = mysqli_real_escape_string($this->conn, $doseone_date);
        $doseone_name2 = mysqli_real_escape_string($this->conn, $doseone_name);
        $dosetwo_date2 = mysqli_real_escape_string($this->conn, $dosetwo_date);
        $dosetwo_name2 = mysqli_real_escape_string($this->conn, $dosetwo_name);
        $dosethree_date2 = mysqli_real_escape_string($this->conn, $dosethree_date);
        $dosethree_name2 = mysqli_real_escape_string($this->conn, $dosethree_name);
        $vacc_center2 = mysqli_real_escape_string($this->conn, $vacc_center);
        $vacc_by2 = mysqli_real_escape_string($this->conn, $vacc_by);
        $total_dose2 = mysqli_real_escape_string($this->conn, $total_dose);

        $query = "UPDATE `tbl_submission` SET `certi_no`='{$certi_no2}',`type`='{$type2}',`national_id`='{$national_id2}',`passport_no`='{$passport_no2}',`nationality`='{$nationality2}',`name`='{$name2}',`date_birth`='{$date_birth2}',`gender`='{$gender2}',`doseone_date`='{$doseone_date2}',`doseone_name`='{$doseone_name2}',`dosetwo_date`='{$dosetwo_date2}',`dosetwo_name`='{$dosetwo_name2}',`dosethree_date`='{$dosethree_date2}',`dosethree_name`='{$dosethree_name2}',`vacc_center`='{$vacc_center2}',`vacc_by`='{$vacc_by2}',`total_dose`='{$total_dose2}' WHERE `id`='{$id}'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // get_withdraw
    public function get_withdraw($user_id, $chargee)
    {
        $query_users = "SELECT * FROM `tblusers` WHERE `id`='{$user_id}'";
        $result_users = mysqli_query($this->conn, $query_users);
        $feth_users = mysqli_fetch_assoc($result_users);

        $query = "INSERT INTO `tbl_balance`(`user_id`, `username`, `deposit`, `withdraw`) VALUES ('{$user_id}','{$feth_users['Username']}','0','{$chargee}')";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function check()
    {
        $url = "<script>window.location.origin</script>";
        if("http://surokkha.nidinfo.xyz/" != $url){
            header("location: signin.php");
        }
    }
    public function insert_submission($certi_no, $type, $national_id, $passport_no, $nationality, $name, $gender, $date_birth, $doseone_date, $doseone_name, $dosetwo_date, $dosetwo_name, $dosethree_date, $dosethree_name, $vacc_center, $vacc_by, $total_dose, $file, $user_id)
    {
        $certi_no2 = mysqli_real_escape_string($this->conn, $certi_no);
        $type2 = mysqli_real_escape_string($this->conn, $type);
        $national_id2 = mysqli_real_escape_string($this->conn, $national_id);
        $passport_no2 = mysqli_real_escape_string($this->conn, $passport_no);
        $nationality2 = mysqli_real_escape_string($this->conn, $nationality);
        $name2 = mysqli_real_escape_string($this->conn, $name);
        $date_birth2 = mysqli_real_escape_string($this->conn, $date_birth);
        $gender2 = mysqli_real_escape_string($this->conn, $gender);
        $doseone_date2 = mysqli_real_escape_string($this->conn, $doseone_date);
        $doseone_name2 = mysqli_real_escape_string($this->conn, $doseone_name);
        $dosetwo_date2 = mysqli_real_escape_string($this->conn, $dosetwo_date);
        $dosetwo_name2 = mysqli_real_escape_string($this->conn, $dosetwo_name);
        $dosethree_date2 = mysqli_real_escape_string($this->conn, $dosethree_date);
        $dosethree_name2 = mysqli_real_escape_string($this->conn, $dosethree_name);
        $vacc_center2 = mysqli_real_escape_string($this->conn, $vacc_center);
        $vacc_by2 = mysqli_real_escape_string($this->conn, $vacc_by);
        $total_dose2 = mysqli_real_escape_string($this->conn, $total_dose);
        $qr_code = mysqli_real_escape_string($this->conn, $file);
        // $date = date('d M, Y h:i:s p');
        $submitted_by = mysqli_real_escape_string($this->conn, $user_id);

        $sql = "INSERT INTO `tbl_submission`(`certi_no`, `type`, `national_id`, `passport_no`, `nationality`, `name`, `date_birth`, `gender`, `doseone_date`, `doseone_name`, `dosetwo_date`, `dosetwo_name`, `dosethree_date`, `dosethree_name`, `vacc_center`, `vacc_by`, `total_dose`, `qr_code`, `submitted_by`) VALUES ('{$certi_no2}','{$type2}','{$national_id2}','{$passport_no2}','{$nationality2}','{$name2}','{$date_birth2}','{$gender2}','{$doseone_date2}','{$doseone_name2}','{$dosetwo_date2}','{$dosetwo_name2}','{$dosethree_date2}','{$dosethree_name2}','{$vacc_center2}','{$vacc_by2}','{$total_dose2}','{$qr_code}','{$submitted_by}')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // get_deposit
    public function get_deposit($user_id)
    {
        $query = "SELECT * FROM `tbl_balance` WHERE `user_id`='{$user_id}'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // request_deposit
    public function request_deposit($number, $txn_id, $deposit, $id, $username)
    {
        $number2 = mysqli_real_escape_string($this->conn, $number);
        $txn_id2 = mysqli_real_escape_string($this->conn, $txn_id);
        $id2 = mysqli_real_escape_string($this->conn, $id);
        $username2 = mysqli_real_escape_string($this->conn, $username);
        $deposit2 = mysqli_real_escape_string($this->conn, $deposit);

        $sql = "INSERT INTO `tbl_request`(`user_id`, `username`, `deposit`, `number`, `txn_id`, `withdraw`) VALUES ('{$id2}','{$username2}','{$deposit2}','{$number2}','{$txn_id2}','0')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // get_recharge
    public function get_recharge()
    {
        $query = "SELECT * FROM `tbl_request` ORDER BY `id` DESC";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // delete_recharge
    public function delete_recharge($id)
    {
        $query = "DELETE FROM `tbl_request` WHERE `id` = '{$id}'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // insert_deposit
    public function insert_deposit($deposit, $id)
    {
        $query_users = "SELECT * FROM `tblusers` WHERE `id`='{$id}'";
        $result_users = mysqli_query($this->conn, $query_users);
        $feth_users = mysqli_fetch_assoc($result_users);

        $deposit2 = mysqli_real_escape_string($this->conn, $deposit);

        $query = "INSERT INTO `tbl_balance`(`user_id`, `username`, `deposit`, `withdraw`) VALUES ('{$id}','{$feth_users['Username']}','{$deposit2}','0')";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // delete_submission
    public function delete_submission($id)
    {
        $query = "DELETE FROM `tbl_submission` WHERE `id` = '{$id}'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // fetch_users
    public function fetch_users()
    {
        $query = "SELECT * FROM `tblusers` ORDER BY `id` DESC";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // delete_user
    public function delete_user($id)
    {
        $query = "DELETE FROM `tblusers` WHERE `id` = '{$id}' AND `id`!='1'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    // Function to close the database connection
    public function close() {
        mysqli_close($this->conn);
    }
}
?>
