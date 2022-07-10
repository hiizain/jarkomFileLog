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

                // -------------------------------------------------------------------------
                // $lineOut = explode(",", $lineOut);
                // $pecahLineOut = explode(" ", $lineOut[0]);
                // $jamOut = $pecahLineOut[3];
                // $jamOut = strtotime($jamOut);
                // $jamOut = date('h:i:s', $jamOut);
                // // die(var_dump($pecahLineOut));
                // //var_dump($lineOut);                
                // //echo "size = ".sizeof($lineOut);
                // if($jamOut === $jamIn || $jamOut >= $jamIn){
                //     if (sizeof($lineOut)>=18){
                //         if($lineOut[7] === "in"){
                //             $viaOut = $lineOut[18];
                //             if ($viaIn === $viaOut){
                //                 //echo "via : ".$via." / ".$lineOut[18];
                //                 //echo "<br>";
                //                 echo "jamIn = ".$jamIn." jamOut = ".$jamOut;
                //                 echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                //                 echo " ,dengan tujuan : ".$lineOut[19];
                //                 //echo "ada";
                //                 // echo "line Out = ".$lOut;
                //                 echo "<br>";
                //                 break;
                //             }                             
                //         }
                //     } 
                //     // $lOut ++;
                // }
                // -------------------------------------------------------------------------

                // -------------------------------------------------------------------------
                // // echo "LOut = ".$lOut."n = ".$n."</br>";
                // if($lOut!=0) {
                //     if ($jamOut === $jamIn || $jamOut >= $jamIn){
                //         // echo "LOut = ".$lOut."n = ".$n."</br>";
                //         $n ++;
                //     } else if($jamOut === $jamIn || $jamOut >= $jamIn){
                //         $lOut ++;
                //         // $lineOut = fgets($output);
                //         // if($lineOut == null){
                //         //     break;
                //         // } 
                //         //echo $line.") ";
                //         $lineOut = explode(",", $lineOut);
                //         $pecahLineOut = explode(" ", $lineOut[0]);
                //         $jamOut = $pecahLineOut[3];
                //         $jamOut = strtotime($jamOut);
                //         $jamOut = date('h:i:s', $jamOut);
                //         // die(var_dump($pecahLineOut));
                //         //var_dump($lineOut);                
                //         //echo "size = ".sizeof($lineOut);
                //         if (sizeof($lineOut)>=18){
                //             if($lineOut[7] === "in"){
                //                 $viaOut = $lineOut[18];
                //                 if ($viaIn === $viaOut){
                //                     if($jamOut === $jamIn || $jamOut >= $jamIn){
                //                         //echo "via : ".$via." / ".$lineOut[18];
                //                         //echo "<br>";
                //                         echo "jamIn = ".$jamIn." jamOut = ".$jamOut;
                //                         echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                //                         echo " ,dengan tujuan : ".$lineOut[19];
                //                         //echo "ada";
                //                         echo "line Out = ".$lOut;
                //                         echo "<br>";
                //                         break;
                //                     } 
                //                 }                             
                //             }
                //         } 
                //         // $lOut ++;
                        
                //     }
                // } else {
                //     $lOut ++;
                //     // $lineOut = fgets($output);
                //     // if($lineOut == null){
                //     //     break;
                //     // } 
                //     //echo $line.") ";
                //     $lineOut = explode(",", $lineOut);
                //     $pecahLineOut = explode(" ", $lineOut[0]);
                //     $jamOut = $pecahLineOut[3];
                //     $jamOut = strtotime($jamOut);
                //     $jamOut = date('h:i:s', $jamOut);
                //     // die(var_dump($pecahLineOut));
                //     //var_dump($lineOut);                
                //     //echo "size = ".sizeof($lineOut);
                //     if (sizeof($lineOut)>=18){
                //         if($lineOut[7] === "in"){
                //             $viaOut = $lineOut[18];
                //             if ($viaIn === $viaOut){
                //                 if($jamOut === $jamIn || $jamOut >= $jamIn){
                //                     //echo "via : ".$via." / ".$lineOut[18];
                //                     //echo "<br>";
                //                     echo "jamIn = ".$jamIn." jamOut = ".$jamOut;
                //                     echo "NIM = ".$nim." ,dengan IP : ".$ipSrc." ,via : ".$viaIn;
                //                     echo " ,dengan tujuan : ".$lineOut[19];
                //                     //echo "ada";
                //                     echo "line Out = ".$lOut;
                //                     echo "<br>";
                //                     break;
                //                 } 
                //             }                             
                //         }
                //     } 
                // }
                // $lOut ++;
                // -------------------------------------------------------------------------
            }

            fclose($output);
        }
    }
}

fclose($input);
?>