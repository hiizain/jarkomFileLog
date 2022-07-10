<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarkom Praktikum</title>
</head>
<body>
    <?php
            //File Input
        $arrVirt=read_file_input();
        $arrVirt_jlmh = count($arrVirt);
        for($i=0;$i<$arrVirt_jlmh;$i++)
        {
            $split=explode(" ",$arrVirt[$i]);
            $via[$i]=$split[0];
            $split2=explode("/",$split[2]);
            $nim[$i]=$split2[0];
            $ip[$i]=strtok($split2[1], ':');
        }
            //File Output
        $arrTcp=read_file_output();
        $arrTcp_jlmh = count($arrTcp);
        for($i=0;$i<$arrTcp_jlmh;$i++)
        {
            $split=explode(" ",$arrTcp[$i]);
            $viaout[$i]=$split[0];
            $tujuan[$i]=$split[1];
            // echo $ipout[$i];
        }

            // Matching
        for($i=0;$i<$arrVirt_jlmh;$i++)
        {
            echo "NIM/NIP   =".$nim[$i]."<br />";
            echo "IP Asli   =".$ip[$i]."<br />";
            echo "IP VPN    =".$via[$i]."<br />";
            echo "IP Tujuan    = <br/>";
            for($j=0;$j<$arrTcp_jlmh;$j++){
                if($via[$i] === $viaout[$j]){
                    echo $tujuan[$j].", ";
                }
            }
            echo "<br />";
            echo "<br />";
        }



        function read_file_input()
        {
            // Membuka file
            // $file       = fopen('D:\Kuliah Online\Semester 4\JarKom\mahasiswa\input\openvpn.log.0','r') or die("Gagal membuka file!");
            $file       = fopen('input.txt','r') or die("Gagal membuka file!");

            while (!feof($file)) 
            {
                // $arr_file   = fgets($file);
                $arrFile[]  = fgets($file);

            }

            // var_dump($arrFile);
            $index = 0;
            $arrFile_jlmh = count($arrFile);
            // $arrVirt = array(1000);
            // for($i=0;$i<=count($arrFile);$i++)
            for($i=0;$i<$arrFile_jlmh;$i++)
            {
                if (strpos($arrFile[$i],"VIRT") !== false && strpos($arrFile[$i],"failed") === false) {
                    if($index === 0){
                        $arrVirt[$index]=$arrFile[$i];
                        $arrVirt[$index]=substr($arrVirt[$index], strpos($arrVirt[$index], "VIRT") + 6);
                        // echo $arrVirt[$index]."<br />";
                        $index++;
                    }
                    $arrVirt_temp=substr($arrFile[$i], strpos($arrFile[$i], "VIRT") + 6);
                    $count = 0;
                    for($j=0;$j<$index;$j++){
                        if($arrVirt_temp === $arrVirt[$j]){
                            $count++;
                        }
                    }
                    if($count === 0){
                        $arrVirt[$index]=$arrVirt_temp;
                        // echo $arrVirt[$index]."<br />";
                        $index++;
                    }
                    
                }
            }
            fclose($file);

            return $arrVirt;
        }
        
        function read_file_output()
        {
            // Membuka file
            // $file       = fopen('D:\Kuliah Online\Semester 4\JarKom\mahasiswa\output\filter.log.0','r') or die("Gagal membuka file!");
            $file       = fopen('output.txt','r') or die("Gagal membuka file!");

            while (!feof($file)) 
            {
                // $arr_file   = fgets($file);
                $arrFile[]  = fgets($file);

            }

            // var_dump($arrFile);
            $index = 0;
            $arrFile_jlmh = count($arrFile);
            // $arrVirt = array(1000);
            // for($i=0;$i<=count($arrFile);$i++)
            for($i=0;$i<$arrFile_jlmh;$i++)
            {
                if (strpos($arrFile[$i],"udp") !== false && strpos($arrFile[$i],"210.57.216.4") === false) {
                    if($index === 0){
                        $arrTcp[$index]=$arrFile[$i];
                        $arrTcp[$index]=substr($arrTcp[$index], strpos($arrTcp[$index], "10.0"));
                        $split=explode(",",$arrTcp[$index]);
                        $arrTcp[$index]=$split[0]." ".$split[1];
                        // echo $arrTcp[$index]."<br />";
                        $index++;
                    }
                    $arrTcp_temp=substr($arrFile[$i], strpos($arrFile[$i], "10.0"));
                    $split=explode(",",$arrTcp_temp);
                    $arrTcp_temp=$split[0]." ".$split[1];
                    $count = 0;
                    for($j=0;$j<$index;$j++){
                        if($arrTcp_temp === $arrTcp[$j]){
                            $count++;
                        }
                    }
                    if($count === 0){
                        $arrTcp[$index]=$arrTcp_temp;
                        // echo $arrTcp[$index]."<br />";
                        $index++;
                    }
                }
            }
            fclose($file);
            return $arrTcp;
        }
    ?> 
</body>
</html>