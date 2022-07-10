<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Data Log</h4>
    <?php 
    $input = fopen('input.txt', "r"); 
    // $lOut = 0;
    while(true)
    {
        $cekInVirt = null;
        $lineIn = fgets($input);
        if($lineIn == null){
            break;
        } 
        $cekInVirt = strstr( $lineIn, "VIRT:" );
        if($cekInVirt != null){
            $pecahLineIn = explode(" ", $lineIn);
            $jamIn = $pecahLineIn[3];
            $jamIn = strtotime($jamIn);
            $jamIn = date('h:i:s', $jamIn);
            $pecahCek = explode(" ", $cekInVirt);
            //die(var_dump($pecahCek));
            //break;
            if (sizeof($pecahCek)>=5){
                $viaIn = trim($pecahCek[5]);
                $pengguna = explode("/", $pecahCek[3]);
                //die(var_dump($pengguna));
                $nim = $pengguna[0];
                $ipSrcTemp = explode(":", $pengguna[1]);
                // die(var_dump($ipSrcTemp));
                $ipSrc = $ipSrcTemp[0];
                //echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                //echo "<br>";
                $output = fopen('output copy.txt', "r"); 
                //$line = 1;
                $n = 0;
                while(true)
                {
                    // $cekOut = 1;
                    // echo $n."</br>";
                    $lineOut = fgets($output);
                    if($lineOut == null){
                        break;
                    } 
                    
                    // $lineOut = fgets($output);
                    // if($lineOut == null){
                    //     break;
                    // } 
                    //echo $line.") ";
                    $lineOut = explode(",", $lineOut);
                    $pecahLineOut = explode(" ", $lineOut[0]);
                    $jamOut = $pecahLineOut[3];
                    $jamOut = strtotime($jamOut);
                    $jamOut = date('h:i:s', $jamOut);
                    // die(var_dump($pecahLineOut));
                    //var_dump($lineOut);                
                    //echo "size = ".sizeof($lineOut);
                    if($jamOut === $jamIn || $jamOut >= $jamIn){
                        if (sizeof($lineOut)>=18){
                            if($lineOut[7] === "in"){
                                $viaOut = $lineOut[18];
                                if ($viaIn === $viaOut){
                                    //echo "via : ".$via." / ".$lineOut[18];
                                    //echo "<br>";
                                    ?>
                                        <table style="border: 1px;">
                                            <thead>
                                                <tr>
                                                    <th>NIM/NIP</th>
                                                    <th>IP Source</th>
                                                    <th>Via</th>
                                                    <th>Tujuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?=$nim?></td>
                                                    <td><?=$ipSrc?></td>
                                                    <td><?=$viaIn?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php
                                    // echo "jamIn = ".$jamIn." jamOut = ".$jamOut;
                                    // echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                                    // echo " ,dengan tujuan : ".$lineOut[19];
                                    //echo "ada";
                                    // echo "line Out = ".$lOut;
                                    echo "<br>";
                                    break;
                                }                             
                            }
                        } 
                        // $lOut ++;
                    }

                }

                fclose($output);
            }
        }
    }

    fclose($input);
    ?>
    <table>
        <th>
            <td>NIM/NIP</td>
            <td>IP Source</td>
            <td>Via</td>
            <td>Tujuan</td>
        </th>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>


<?php 
$input = fopen('input.txt', "r"); 
// $lOut = 0;
while(true)
{
    $cekIn = null;
	$lineIn = fgets($input);
    if($lineIn == null){
        break;
    } 
    $cekIn = strstr( $lineIn, "VIRT:" );
    if($cekIn != null){
        $pecahLineIn = explode(" ", $lineIn);
        $jamIn = $pecahLineIn[3];
        $jamIn = strtotime($jamIn);
        $jamIn = date('h:i:s', $jamIn);
        $pecahCek = explode(" ", $cekIn);
        //die(var_dump($pecahCek));
        //break;
        if (sizeof($pecahCek)>=5){
            $viaIn = trim($pecahCek[5]);
            $pengguna = explode("/", $pecahCek[3]);
            //die(var_dump($pengguna));
            $nim = $pengguna[0];
            $ipSrcTemp = explode(":", $pengguna[1]);
            // die(var_dump($ipSrcTemp));
            $ipSrc = $ipSrcTemp[0];
            //echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
            //echo "<br>";
            $output = fopen('output copy.txt', "r"); 
            //$line = 1;
            $n = 0;
            while(true)
            {
                // $cekOut = 1;
                // echo $n."</br>";
                $lineOut = fgets($output);
                if($lineOut == null){
                    break;
                } 
                
                // $lineOut = fgets($output);
                // if($lineOut == null){
                //     break;
                // } 
                //echo $line.") ";
                $lineOut = explode(",", $lineOut);
                $pecahLineOut = explode(" ", $lineOut[0]);
                $jamOut = $pecahLineOut[3];
                $jamOut = strtotime($jamOut);
                $jamOut = date('h:i:s', $jamOut);
                // die(var_dump($pecahLineOut));
                //var_dump($lineOut);                
                //echo "size = ".sizeof($lineOut);
                if($jamOut === $jamIn || $jamOut >= $jamIn){
                    if (sizeof($lineOut)>=18){
                        if($lineOut[7] === "in"){
                            $viaOut = $lineOut[18];
                            if ($viaIn === $viaOut){
                                //echo "via : ".$via." / ".$lineOut[18];
                                //echo "<br>";
                                echo "jamIn = ".$jamIn." jamOut = ".$jamOut;
                                echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                                echo " ,dengan tujuan : ".$lineOut[19];
                                //echo "ada";
                                // echo "line Out = ".$lOut;
                                echo "<br>";
                                break;
                            }                             
                        }
                    } 
                    // $lOut ++;
                }

            }

            fclose($output);
        }
    }
}

fclose($input);
?>