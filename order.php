<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Window</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php
        //Get POST data
        $size = $_POST['size'];
        $number_of_creams = $_POST['number_of_creams'];
        $sugar = $_POST['sugar'];
        $size2 = $_POST['size2'];
        $number_of_creams2 = $_POST['number_of_creams2'];
        $sugar2 = $_POST['sugar2'];
        
        //Set number_of_coffees variable
        if($sugar != null && $number_of_creams != null){
            $number_of_coffees = 1;
        }
        
        if($sugar2 != null && $number_of_creams2 != null){
            $number_of_coffees = 2;
        }
        ?>
    
        <h1>Thanks for your order! Here it is:</h1>
            <?php
                if($number_of_coffees <= 0){
                    echo '<h3>You have ordered no coffee!</h3>';
                } else if ($number_of_coffees > 2){
                    echo '<h3>You may only place up to two orders!</h3>';
                } else if($number_of_creams > 3 || $sugar > 3){
                    echo 'You cannot order more than three sugars or creams!';
                }
                
                //Executes Switch block for coffee image resizing if number of coffees is greater than zero
                if($number_of_coffees > 0 && $number_of_coffees < 3 && $number_of_creams <= 3 && $sugar <= 3){
                    echo '<b>Order #1</b>: $' . Price1($size) . ' (tax included)<br/>';
                    echo '<b>Order #2</b>: $' . Price2($number_of_coffees, $size2) . ' (tax included)<br/>';
                    echo '<b>Total</b>: $' . number_format(Price1($size) + Price2($number_of_coffees, $size2), 2) . ' (tax included)<br/>';
                    echo '<br>';
                    echo '<div id="order1">';
                    echo '<h3>Order #1</h3>';
                    
                    switch ($size) {
                        case "Small":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:40px;height:70px;" />';
                                Plus($sugar, $number_of_creams);
                                Sugar($sugar);
                                Cream($number_of_creams);
                                break;
                        case "Regular":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:60px;height:90px;" />';
                                Plus($sugar, $number_of_creams);
                                Sugar($sugar);
                                Cream($number_of_creams);
                                break;
                        case "Large":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:80px;height:110px;" />';
                                Plus($sugar, $number_of_creams);
                                Sugar($sugar);
                                Cream($number_of_creams);
                                break;
                        case "Extra_large":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:100px;height:130px;" />';
                                Plus($sugar, $number_of_creams);
                                Sugar($sugar);
                                Cream($number_of_creams);
                                break;    
                        default:
                            echo "Invalid";
                    }
                } else {
                    echo ' Invalid entry, please return to the previous page.';
                }
                echo '</div>';
                
                //Adding plus if sugar or cream is present
                function Plus($sugar, $number_of_creams) {
                    if ($sugar > 0 || $number_of_creams > 0){
                        echo '<img src="assignment-images/plus.jpg" alt="plus" style="width:30px;height:30px;" />';
                    } else {
                        echo '<br>(Black coffee)';
                    }
                }
            
                //Sugar
                function Sugar($sugar) {
                    for ($i = 0; $i < $sugar; $i++) {
                       echo '<img src="assignment-images/sugar.jpg" alt="sugar" style="width:50px;height:50px;" />';
                    }
                }
                
                //Cream
                function Cream($number_of_creams) {
                    for ($i = 0; $i < $number_of_creams; $i++) { 
                        echo '<img src="assignment-images/cream.jpg" alt="cream" style="width:50px;height:50px;" />';
                    }
                }
                //Pricing
                function Price1($size){
                    $baseCost = 2.00;
                    $tax = 0.13;
                    $regular = 2.25;
                    $large = 2.50;
                    $extralarge = 2.75;
                    
                    if ($size == 'Small'){
                        return number_format($baseCost + ($baseCost * $tax), 2);
                    } if ($size == 'Regular'){
                        return number_format($regular + ($regular * $tax), 2);
                    } else if ($size == 'Large'){
                        return number_format($large + ($large * $tax), 2);
                    } else if ($size == 'Extra_large'){
                        return number_format($extralarge + ($extralarge * $tax), 2);
                    } else {
                        return number_format(0, 2);
                    }                 
                }
                
                function Price2($number_of_coffees, $size2){
                    $baseCost = 2.00;
                    $tax = 0.13;
                    $regular = 2.25;
                    $large = 2.50;
                    $extralarge = 2.75;
                    
                    if($number_of_coffees == 2){
                        if ($size2 == 'Small'){
                            return number_format($baseCost + ($baseCost * $tax), 2);
                        } if ($size2 == 'Regular'){
                            return number_format($regular + ($regular * $tax), 2);
                        } else if ($size2 == 'Large'){
                            return number_format($large + ($large * $tax), 2);
                        } else if ($size2 == 'Extra_large'){
                            return number_format($extralarge + ($extralarge * $tax), 2);
                        } else {
                            return number_format(0, 2);
                        }
                    }
                }
                    
            ?>
        <br>
        <br>
            <?php 
                if($number_of_coffees != 2){
                    echo '';
                }
                if($number_of_coffees == 2  && $number_of_creams2 <= 3 && $sugar2 <= 3){
                    echo '<div id="order2">';
                    echo '<h3>Order #2</h3>';
                    
                    Switch ($size2) {
                        case "Small":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:40px;height:70px;" />';
                                Plus($sugar2, $number_of_creams2);
                                Sugar($sugar2);
                                Cream($number_of_creams2);
                                break;
                        case "Regular":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:60px;height:90px;" />';
                                Plus($sugar2, $number_of_creams2);
                                Sugar($sugar2);
                                Cream($number_of_creams2);
                                break;
                        case "Large":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:80px;height:110px;" />';
                                Plus($sugar2, $number_of_creams2);
                                Sugar($sugar2);
                                Cream($number_of_creams);
                                break;
                        case "Extra_large":
                            echo '<img src="assignment-images/cup.jpg" alt="coffee" style="width:100px;height:130px;" />';
                                Plus($sugar, $number_of_creams);
                                Sugar($sugar);
                                Cream($number_of_creams2);
                                break;    
                        default:
                            echo "Invalid";
                        }
                }
                echo '</div>'
            ?>
        
    </body>        
</html>
            