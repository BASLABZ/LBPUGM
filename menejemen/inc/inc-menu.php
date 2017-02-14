<?php
// include 'inc-db.php';
// session_start();
//--tampilkan menu 
$sqlmenu1="select menu_id, menu_name, menu_parent from ref_menu where menu_parent = 0";

$resultmenu1=mysql_query($sqlmenu1);
//$run=mysql_query($sqlmenu1);

while($datamenu1=mysql_fetch_array($resultmenu1)){
    $varMenuId=$datamenu1['menu_id'];
    $varMenuName=$datamenu1['menu_name'];
    $varMenuParent=$datamenu1['menu_parent'];?>
    
    <li class="panel" >
    <a href="#" data-toggle="collapse" data-target=".collapse-<?php echo $varMenuId; ?>" style="color: white;">
        <i class="icon-tasks"> </i>
        <?php echo $varMenuName ?>
        <span class="pull-right">
            <i class="icon-angle-left"></i>
        </span>
    </a>
        <?php
        //--tonton menu_id berdasarkan levelnya apa
        $sqlmenu2="select menu_id from ref_level_menu where level_id=1";
        
        $resultmenu2=mysql_query($sqlmenu2);
        ?>
        <ul class="collapse-<?php echo $varMenuId; ?> collapse">
        <?php
        while($datamenu2=mysql_fetch_array($resultmenu2)){
            $varMenuId2=$datamenu2['menu_id'];
            //--tampilan daftar menunya
            $sqlmenu3="select menu_id, menu_name, menu_url from ref_menu where menu_id='".$varMenuId2."'";
            $sqlmenu3=$sqlmenu3 . " and menu_parent='".$varMenuId."'";
        	?>
        	
        	<?php
            $resultmenu3=mysql_query($sqlmenu3);
            while($datamenu3=mysql_fetch_array($resultmenu3)){
                $varMenuName3=$datamenu3['menu_name'];
                $varMenuUrl3=$datamenu3['menu_url'];?>
                
                <li class=""><a href="index.php?hal=<?php echo $varMenuUrl3?>" style="color: white;"><?php echo $varMenuName3 ?></a></li>
            <?php
            } // tutup while datamenu3
        } // tutup while datamenu 2
        ?>
        </ul>
    </li>
<?php
} // tutup while datamenu 1
?>