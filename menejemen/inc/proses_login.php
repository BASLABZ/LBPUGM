
<?php
session_start();
include 'inc-db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$query = "SELECT operator_username, operator_password, operator_name, operator_id, ref_level.level_id, level_name FROM ref_operator left join ref_level on ref_level.level_id=ref_operator.level_id_fk
    WHERE operator_username='".$username."' AND operator_password='".$password."' ";
    
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
if ($password == $data['operator_password'])
{
echo "<script> alert('Login Sukses');</script>";
    // menyimpan username dan level ke dalam session
    $_SESSION['operator_id']       = $data['operator_id']; //
    $_SESSION['level_id']    = $data['level_id'];
    $_SESSION['level_name']  = $data['level_name'];
    $_SESSION['operator_username']   = $data['operator_username'];
<<<<<<< HEAD
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">'; exit;
=======
    // $_SESSION['login_time'] = date('Y-m-d');
    //Penggunaan Meta Header HTTP
    if ($data['level_id']){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../admin/index.php">';    

    }else if($data['level']=='2'){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../koordinator-penelitian/index.php">';    
    }else if($data['level']=='3'){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../kepala-laboratorium/index.php">';    
 
    }
    exit;
>>>>>>> d15e8b6ead176c3d5eb34de08855c4b32ebc3634
}
else 
echo "<script> alert('Proses Login Gagal Silahkan Melakukan Login Lagi');</script>"; 
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';    
    exit;
?>