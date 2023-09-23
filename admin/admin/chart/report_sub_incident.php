<?php
// Medical

// Medical Stroke
if( $stro >   $high && $stro > $oth  ){
    $fm = $stro;
    $fmc = 'Stroke';

    if( $high > $oth ){
        $sm = $high;
        $smc = 'Highblood';
        $tm = $oth;
        $tmc = 'Others';
    }
    else{
        $sm = $oth;
        $smc = 'Others';
        $tm = $high;  
        $tmc = 'Highblood';
    }
}


// Medical Highblood

else  if( $high >   $stro && $high > $oth  ){
    $fm = $high;
    $fmc = 'Highblood';

    if( $stro > $oth ){
        $sm = $stro;
        $smc = 'Stroke';
        $tm = $oth;
        $tmc =  'Others';
    }
    else{
        $sm = $oth;
        $smc = 'Others';
        $tm = $stro;  
        $tmc =  'Stroke';
    }
}


// Medical Others
else   if( $oth >   $stro && $oth > $high  ) {

    $fm = $oth;
    $fmc = 'Others';

    if( $stro > $high ){
        $sm = $stro;
        $smc = 'Stroke';
        $tm = $high;
        $tmc =  'Highblood';
    }
    else{
        $sm = $high;
        $smc = 'Highblood';
        $tm = $stro;  
        $tmc =  'Stroke';
    }
}


else{

    $fm = '__';
    $fmc = '__';
    $sm = '__';
    $smc = '__';
     
    $tm = '__';
    $tmc =  '__';
   
}


// Trauma

// Trauma Self Accident

if( $sel >   $vech && $sel > $drow && $sel > $oths  ){
    $fst = $sel;
    $fstc = 'Self Accident';

    if( $vech > $drow && $vech > $oths ){
        $st = $vech;
        $stc = 'Vehicle Accident';

        if($drow > $oths ){
            
            $tt = $drow;
            $ttc = 'Drowning';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
            $tt = $oths;
            $ttc = 'Others';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        
       
    }
    
    else if( $drow > $vech && $drow > $oths ){
        $st = $drow;
        $stc = 'Drowning';

        if($vech > $oths ){
            
            $tt = $vech;
            $ttc =  'Vehicle Accident';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
            $tt = $vech;
            $ttc =  'Others';
            $ft = $oths;
            $ftc = 'Vehicle Accident';
        }

    }


    else{
        $st = $oths;
        $stc = 'Others';

        if($vech > $drow ){
            
            $tt = $vech;
            $ttc =  'Vehicle Accident';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        else{
            $tt = $drow;
            $ttc =  'Drowning';
            $ft = $vech;
            $ftc = 'Vehicle Accident';
        }


    }
}


// Trauma Vehicle Accident

else if( $vech >   $sel && $vech > $drow && $vech > $oths  ){
    $fst = $vech;
    $fstc = 'Vehicle Accident';

    if( $sel > $drow && $sel > $oths ){
        $st = $sel;
        $stc = 'Self Accident';

        if($drow > $oths ){
            
            $tt = $drow;
            $ttc = 'Drowning';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
                
            $tt = $oths;
            $ttc = 'Others';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        
       
    }
    
    else if( $drow > $sel && $drow > $oths ){
        $st = $drow;
        $stc = 'Drowning';

        if($sel > $oths ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
            $tt = $oths;
            $ttc =  'Others';
            $ft = $sel;
            $ftc = 'Self Accident';
        }

    }


    else{
        $st = $oths;
        $stc = 'Others';

        if($sel > $drow ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        else{
            $tt = $drow;
            $ttc =  'Drowning';
            $ft = $sel;
            $ftc = 'Self Accident';
           
        }


    }
}




// Trauma Drowning


else if( $drow >   $sel && $drow > $vech && $drow > $oths  ){
    $fst = $drow;
    $fstc = 'Drowning';

    if( $sel > $vech && $sel > $oths ){
        $st = $sel;
        $stc = 'Self Accident';

        if($vech > $oths ){
            
            $tt = $vech;
            $ttc = 'Vehicle Accident';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
            $tt = $vech;
            $ttc = 'Others';
            $ft = $vech;
            $ftc = 'Vehicle Accident';
        }
        
       
    }
    
    else if( $vech > $sel && $vech > $oths ){
        $st = $drow;
        $stc = 'Vehicle Accident';

        if($sel > $oths ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $oths;
            $ftc = 'Others';
        }
        else{
            $tt = $oths;
            $ttc =  'Others';
            $ft = $sel;
            $ftc = 'Self Accident';
        }

    }


    else{
        $st = $oths;
        $stc = 'Others';

        if($sel > $vech ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $vech;
            $ftc = 'Vehicle Accident';
        }
        else{
            $tt = $vech;
            $ttc =  'Vehicle Accident';

            $ft = $sel;
            $ftc = 'Self Accident';
        }


    }
}



else if( $oths >   $sel && $oths > $vech && $oths > $drow  ){

    $fst = $oths;
    $fstc = 'Others';

    if( $sel > $vech && $sel > $drow ){
        $st = $sel;
        $stc = 'Self Accident';

        if($vech > $drow ){
            
            $tt = $vech;
            $ttc = 'Vehicle Accident';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        else{
            $tt = $drow;
            $ttc = 'Drowning';
            $ft = $vech;
            $ftc = 'Vehicle Accident';
        }
        
       
    }
    
    else if( $vech > $sel && $vech > $drow ){
        $st = $drow;
        $stc = 'Vehicle Accident';

        if($sel > $drow ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $drow;
            $ftc = 'Drowning';
        }
        else{
            $tt = $drow;
            $ttc =  'Drowning';

            $ft = $sel;
            $ftc = 'Self Accident';
        }

    }


    else{
        $st = $drow;
        $stc =  'Drowning';

        if($sel > $vech ){
            
            $tt = $sel;
            $ttc =  'Self Accident';
            $ft = $vech;
            $ftc = 'Vehicle Accident';
        }
        else{
            $tt = $vech;
            $ttc =  'Vehicle Accident';
            $ft = $sel;
            $ftc = 'Self Accident';
        }


    }
}

else{

    $fst = '__';
    $fstc = '__';
    $st = '__';
    $stc = '__';
     
    $tt = '__';
    $ttc =  '__';
    $ft = '__';
    $ftc = '__ ';
}






?>