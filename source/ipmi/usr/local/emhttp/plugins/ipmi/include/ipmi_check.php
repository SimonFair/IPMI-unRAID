<?
/* board info */
$boards = ['ASRock'=>'','ASRockRack'=>'', 'Dell' =>'','Supermicro'=>''];
$board  = ( $override == 'disable') ? trim(shell_exec("dmidecode -t 2 | grep 'Manufacturer' | awk -F 'r:' '{print $2}' | awk  '{print $1}'")) : $oboard;
$board_model = ( $override == 'disable') ? rtrim(ltrim(shell_exec("dmidecode -qt2|awk -F: '/^\tProduct Name:/ {print $2}'"))) : $omodel;
$board_status  = array_key_exists($board, $boards);
$sm_gen="";
if ($board == "Supermicro") {
    $smboard_model = ( $override == 'disable') ? intval(shell_exec("dmidecode -qt2|awk -F: '/^\tProduct Name:/{p=\$2} END{print substr(p,3,1)}'")) : $omodel;
    if ($smboard_model == '1') $smboard_model = ( $override == 'disable') ? intval(shell_exec("dmidecode -qt2|awk -F: '/^\tProduct Name:/{p=\$2} END{print substr(p,3,2)}'")) : $omodel;
    $sm_gen="Gen:$smboard_model";
}
if ($board == "Dell") {
    $board_model = ( $override == 'disable') ? rtrim(ltrim(shell_exec("dmidecode -qt1|awk -F: '/^\tProduct Name:/ {print $2}'"))) : $omodel;
  }
?>
