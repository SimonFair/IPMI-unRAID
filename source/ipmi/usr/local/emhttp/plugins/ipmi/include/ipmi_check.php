<?
/* board info */
$boards = ['ASRock'=>'','ASRockRack'=>'', 'Dell' =>'','Supermicro'=>''];
$board  = ( $override == 'disable') ? trim(shell_exec("dmidecode -t 2 | grep 'Manufacturer' | awk -F 'r:' '{print $2}' | awk  '{print $1}'")) : $oboard;
$board_model = ( $override == 'disable') ? rtrim(ltrim(shell_exec("dmidecode -qt2|awk -F: '/^\tProduct Name:/ {print $2}'"))) : $omodel;
$board_status  = array_key_exists($board, $boards);
?>