<?php

require_once './snmp/snmp.php';

function show_snmp($snmpName, $snmpId, $db_table_name, $start_from=0, $limit=10, $desc=True) {
    $str = intval(substr($snmpId, -1))+1;

    echo '<center>';
    echo '<div class="container22">';
    echo '<br>';   
    echo '<div> '; 
    echo '<h3>Czujnik'.($str-1).': '.$snmpId .'</h3>';

    echo '<table id="baza">';
    echo '<thead>';
    echo '<tr id="mainrow">'; 
    echo '<th width="10%">id</th><th>snmp_oid</th><th>name</th><th>value</th><th>datetime</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $snmp_array = retrieve_snmp($snmpName, $snmpId, $db_table_name, $start_from, $limit, $desc);
    for ($x = 0; $x < count($snmp_array); $x++) {
        echo '<tr>';
        echo
        '<td>'.$snmp_array[$x]["id"].'</td>'.
        '<td>'.$snmp_array[$x]["snmp_oid"].'</td>'.
        '<td>'.$snmp_array[$x]["name"].'</td>'.
        '<td>'.$snmp_array[$x]["value"].'</td>'.
        '<td>'.$snmp_array[$x]["datetime"].'</td>'.
        '</tr></td>';
    }
    if(count($snmp_array) == 0) {
        echo 'Brak rekordów w bazie danych';
    }
    echo '</tbody>';
    echo '</table>';

    $per_page_record = $limit;
    echo '<div class="pagination2">';
    $total_records = count(retrieve_snmp($snmpName, $snmpId, $db_table_name, 0, 1844674407370955161, $desc));
    echo "</br>"; 
    #echo $total_records;
    $total_pages = ceil($total_records / $per_page_record);     
    $pagLink = "";

    if(!isset($page)) {
        $page=1;
    }
    
    if($page>=2){   
        echo "<a href='index.php?str=".$str."&page=".($page-1)."'>  Prev </a>";   
    } 

    for ($i=1; $i<=$total_pages; $i++) {   
        if ($i == $page) {   
            $pagLink .= "<a class = 'active' href='index.php?str=".$str."&page="  
                                              .$i."'>".$i." </a>";   
        } 
        else  {   
            $pagLink .= "<a href='index.php?str=".$str."&page=".$i."'>   
                                              ".$i." </a>";     
        }     
    }
    echo $pagLink;
    if($page<$total_pages){   
        echo "<a href='index.php?str=".$str."&page=".($page+1)."'>  Next </a>";   
    }
    echo '</div>';

    echo '<div class="inline"> ';  
    echo '<input id="page" type="number" min="1" max="'.$total_pages.'"'.
        'placeholder="'.$page.'"/"'.$total_pages.'" required>';   
    echo '<button onClick="go2Page();">Go</button>'; 
     echo '</div>';  

    echo '</div>';
    echo '</div>';
    echo '</center>';
    ?> 
    <script>
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'index.php?str='<?php echo $str."&page='+".$page;   ?>
    }   
    </script>
    <?php 
}