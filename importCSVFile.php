<?php
if(isset($_POST['import'])){
    $fileName = $_FILES['csv_file']['name'];
    $file_ext = explode('.', $fileName);
    $file_ext = end($file_ext);
    if( $file_ext == "csv"){
        $countLine=0;
        $totalAmount = 0;
        $totalQuantity = 0;

        $path = 'uploads/csv/'.$fileName;
        if(move_uploaded_file($_FILES['csv_file']['tmp_name'], 'uploads/csv/'.$fileName)){
        $file = fopen($fileName, "r");

        echo "<br><hr>";
        echo '<table class="table table-bordered table-sm table-striped table-hover" id="order-table" table-responsive>';

        while (($line = fgetcsv($file)) !== false) {
            $num = count($line);
            if ($countLine == 0) {
                echo '<thead class="thead-dark text-center"><tr>';
            }else{
                echo '<tr class="table-light">';
                $totalAmount += $line[3];
                $totalQuantity += $line[1];
            }
   
            for ($count=0; $count < $num; $count++) {
                if(empty($line[$count])) {
                    $value = "&nbsp;";
                }else{
                    $value = $line[$count];
                }
                if ($countLine == 0) {
                    echo '<th>'.$value.'</th>';
                }
                else{
                    if($count > 0){
                        if($count > 1) {number_format($value, 2, '.', ',');}
                        echo '<td class="text-right">'.$value.'</td>';
                    }    
                    else echo '<td>'.$value.'</td>';
                }
            }
   
            if ($countLine == 0) {
                echo '</tr></thead><tbody>';
            }else{
                echo '</tr>';
            }
            $countLine++;
        }
        fclose($file);
        echo '</table>';
        echo '
        <div style="display: flex; align-item: flex-end">
            <table class="table table-bordered table-md table-responsive">
                <tr>
                    <td class="text-left table-dark">Total quantity :</td> 
                    <td class="text-right table-light">'. $totalQuantity . ' Pieces</td>
                </tr>
                <tr>
                    <td class="text-left table-dark">Total amount :</td>
                    <td class="text-right table-light">'. number_format($totalAmount, 2, '.', ','). ' Baht. </td>
                </tr>
            </table>
        </div>
        ';
    }
    }
}
?>