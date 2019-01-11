<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Total Cost</title>
        <style>
            body {
                color: <?= SfgColor ?>;
                background-color: <?= $bgColor ?>;
                font-family: <?= $font ?>;
            }
        </style>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
      
    <body>
        <?php
        include "costForm.html";
        
        $fgColor = '';
        $bgColor = '';
        $font = '';
        
        // put your code here
        if(isset($_POST['submit'])) {
            $bgColor = $_POST['bgColor'];
            $fgColor = $_POST['fgColor'];
            $font = $_POST['fontChoice'];
        
        if(isset($_POST['submit'])) {
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
        echo "<h2>Total Cost - Welcome $fName $lName.</h2>";
        }
        if(isset($_POST['submit'])) {
            $costPerWidget = 20;
            $taxRate = .06;
            $discount = .25;
            
            // if quantity is less greater than 0
            if($_POST['quantity'] > 0) {
                $quantity = $_POST['quantity'];
                $totalCost = $quantity * $costPerWidget;
                
                // if cost is over 50 dollars
                if($totalCost > 50) {
                    $preTaxSub = $totalCost * $discount;
                    $totalCost -= $preTaxSub;
                    
                    echo "\t\t<p>You requested $_POST[quantity] widgets at \$20 each.</p>\n"; 
                    echo "\t\t<p>Your total with tax, minus your " . $discount . ", comes to $$totalCost.</p>\n";
                    
                } else {
                    
                    echo "\t\t<p>You requested $_POST[quantity] widgets at \$20 each.</p>\n";
                    echo "\t\t<p>Your total comes to $$totalCost.</p>\n";
                }
                $installment = round($totalCost / 12, 2);
  
                echo "\t\t<p>You may purchase the widgets in 12 monthly installments of $$installment </p>\n";
            
            } else {
              echo "\t\t<h2>Please make sure that you enter a quantity and then resubmit</h2>\n";  
            }
        } // end if quantity 0
        }
        
        
        ?>
    </body>
    
</html>
