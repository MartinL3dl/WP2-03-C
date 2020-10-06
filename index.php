<?php
$euro = filter_input(INPUT_POST, 'euro');
$submit = filter_input(INPUT_POST, 'submit');
$switch = filter_input(INPUT_POST, 'switch');
define('usdczk', 23);
define('gbpczk', 30);
define('euroczk', 27);

$amount = $euro;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C</title>
</head>
<body>
    
    <?php
    if (isset($submit)) {
    switch ($switch) {
        case 'czk_euro': 
            $converted = $amount / euroczk;
            $currencyfrom = "czk";
            $currencyto = "eur";
        ?>
            
            <?php
            break;
        
            case 'euro_czk': 
            $converted = $amount * euroczk;
            $currencyfrom = "eur";
            $currencyto = "czk";
            ?>
            <?php break;
            case 'czk_usd': 
                $converted = $amount / usdczk;
                $currencyfrom = "czk";
                $currencyto = "usd";
            ?>
                <?php break;
            case 'usd_czk': 
                $converted = $amount * usdczk;
                $currencyfrom = "usd";
                $currencyto = "czk";
            ?>
               
               <?php break;
            case 'czk_gbp': 
                $converted = $amount / gbpczk;
                $currencyfrom = "czk";
                $currencyto = "gbp";
            ?>
                 <?php break;
            

        default: 
        $converted = $amount * gbpczk;
                $currencyfrom = "gbp";
                $currencyto = "czk";
        ?>
        
           <?php break;
           
    } ?> <p>vaše transakce <?=$amount?> <?=$currencyfrom?> byla převedena na částku <?=$converted?> <?=$currencyto?> </p>
    

    
        

        
    <?php }
else { ?>
    <form action="index.php" method="post">
    
    Peníze : <input type="text" name="euro" id="euro">
    KČ na Euro: <input type="radio" name="switch" value="czk_euro" id="switch">
    Euro na KČ: <input type="radio" name="switch" value="euro_czk" id="switch">
    KČ na USD <input type="radio" name="switch" value="czk_usd" id="switch">
    USD na KČ <input type="radio" name="switch" value="usd_czk" id="switch">
    KČ na GBP <input type="radio" name="switch" value="czk_gbp" id="switch">
    GBP na KČ <input type="radio" name="switch" value="gbp_czk" id="switch">
        <input type="submit" value="submit" name="submit">
    </form>

    <?php
}  ?>


</body>
</html>