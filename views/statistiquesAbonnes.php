<?php
$abonne1C=new AbonneC();
$listeAbonnes=$abonne1C->afficherAbonnes();
$lundi=0;
$mardi=0;
$mercredi=0;
$jeudi=0;
$vendredi=0;
$samedi=0;
$dimanche=0;

$janvier=0;
$fevrier=0;
$mars=0;
$avril=0;
$mai=0;
$juin=0;
$juillet=0;
$aout=0;
$septembre=0;
$octobre=0;
$novembre=0;
$decembre=0;

foreach($listeAbonnes as $row){
    $dateJ=date("D",strtotime($row['Date_Creation']));
    switch($dateJ)
    {
        case "Mon":
            $lundi+=1;
            break;
        case "Tue":
            $mardi+=1;
            break;
        case "Wed":
            $mercredi+=1;
            break;
        case "Thu":
            $jeudi+=1;
            break;
        case "Fri":
            $vendredi+=1;
            break;
        case "Sat":
            $samedi+=1;
            break;
        case "Sun":
            $dimanche+=1;
            break;
    }

    $dateM=date("M",strtotime($row['Date_Creation']));
    switch($dateM)
    {
        case "Jan":
            $janvier+=1;
            break;
        case "Feb":
            $fevrier+=1;
            break;
        case "Mar":
            $mars+=1;
            break;
        case "Apr":
            $avril+=1;
            break;
        case "May":
            $mai+=1;
            break;
        case "Jun":
            $juin+=1;
            break;
        case "Jul":
            $juillet+=1;
            break;
        case "Aug":
            $aout+=1;
            break;
        case "Sep":
            $septembre+=1;
            break;
        case "Oct":
            $octobre+=1;
            break;
        case "Nov":
            $novembre+=1;
            break;
        case "Dec":
            $decembre+=1;
            break;
    }

}

?>