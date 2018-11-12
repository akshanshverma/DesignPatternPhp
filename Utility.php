<?php
    /**
     * 
     * Purpose: Utility is a helper class which hold funtion.
     *
     *  @author  Akshansh Verma
     *  @version 1.0
     *  @since   12-10-2018
     */
   class Utility{
       /**
        * replaceF function is use to take user name is replace tha "<<UserName>>"
        * template to the nam of the user
        * @* @param $S to give function string value which we want to replace 
        */
       static function replaceF($S)
       {
            $template = "Hello <<UserName>>, How are you?";
            //str_replace to replace  <<UserName>> from template
            echo str_replace("<<UserName>>", $S , $template)."\n";
       }

       /**
        * flipCoin function take input the number of times to flip Coin.
        * and print percent of head and tail.
        * @param $n number of time user want to flip coin
        */
       static function flipCoin($n)
       {    
           //h and t to count head and tails.
            $h=0;
            $t=0;
            
            for($i = 0;$i<$n;$i++)
            {
                if (random_int(0,1)==1) 
                {
                    $t++;
                } 
                else 
                {
                    $h++;
                }
            }
            echo ($h/($h+$t))*100;
            echo "% head"."\n";
            echo ($t/($h+$t))*100;
            echo "% tail"."\n";
       }
       
       /**function leapYear is use to check the year is leap year or not it 
        * take input form use and print year is leap or not 
        *
        * @param $n is year which we want ot check leap year or not  
        */
       static function leapYear($n)
       {
            if (strlen((string)$n)==4) 
            {
                //check year is leap or not
                if ((($n % 4 == 0) && ($n % 100 != 0)) || ($n % 400 == 0)) 
                {
                echo "leap year"."\n";
                } 
                else 
                {
                    echo "not leap year"."\n";
                }   
            }  
            else
            {
                echo "invalid input"."\n";
            }                                
       }

       /**
        * funcction powerOfTwo is use to take the number and give 
        * output form one to n number of 2^n
        * @* @param $n to take number until we want power of two
        */

       static function powerOfTwo($n)
       {   
           if ($n >= 0 && $n < 31) {
               $pow = 2**$n;
               $all = 0; $count = 1;
               while($all != $pow)
               {
                   $all = 2** $count;
                   echo $all."\n";
                    $count++;
               }
           } else {
               echo "enter value between 0 to 31"."\n";
               Utility::powerOfTwo();
           }
           
       } 

        /**
        * function harmonicNumber is a function which calculate the sum of factorial 
        * of n number
        *
        * @param $n number is a number until we need harmonic value
        */

       static function harmonicNumber($n)
       {
            //sum is use to save the total sum of n value
            $sum = 0;
            for($i = 1; $i <= $n; $i++)
            {
                $sum += 1/$i;
            }
            echo $sum."\n";
       }

       /**
        * function factor is to find the all prime factors of any number 
        * and print the values 
        * @param $n to get prime factor of number 
        * 
        */
      
       static function factors($n)
       {    
           //array to store the prime factors of number            
           $arr = array();
           //starting of prime factors
           $i = 2;
           $index = 0;
           //while loop until we get 1 
           while($n != 1)
           {
               //$b is boolean value to check the number is prime or not
               $b = true;
               //for loop to get prime number one by one
               for($j = 2; $j < $i/2; $j++)
               {
                   if($i % $j == 0)
                   {
                       $b = false;
                       break;
                   }
               }
               //if number is prime then is will check how many time that prime number 
               //is deided by n 
               if($b)
               {
                   while($n % $i == 0)
                   {
                       $arr[$index++] = $i;
                       $n = $n / $i;
                   }
               }
               //i++ to get next number which we want to check prime ot not 
                $i++;
           }

           //forEach to print all prime factors 
           foreach($arr as $print)
           {
               echo $print."\n";
              
           }
       }

       /**
        * function gambler is use to take input form user and gamble 
        * the stack until user win of user lost all money

        * @param $stack total amount user have 
        * @param $goal how much he want to win
        * @param $n number of time he gamble his stack
        */

       static function gambler($stake,$goal,$n)
       {    
           $win = 0;
           $count = 0;
           for($i = 0;$i < $n; $i++)
           {
               $temp = $stake;
               //while loop until user win or loss all stack 
                while($temp != $goal && $temp != 0)
                {
                    $count++;
                    if ((random_int(0,1))==1) 
                    {
                       $temp++;
                    } 
                    else 
                    {
                        $temp--;
                    }
                    
                }
                if($temp == $goal)
                {
                    $win++;
                }

           }
           echo "no of win ".$win."\n";
           echo "count ".$count."\n";
           echo "win percentage ".(($win/$n)*100)."%"."\n";
           echo "loss percentage ".((($n-$win)/$n)*100)."%"."\n";
       }

       /**
        * function getInt is method which take user input and 
        * check the input is numeric or not
        * @return $n int type value
        */
       static public function getInt()
       {
            fscanf(STDIN,"%d\n",$n);
            while(!is_numeric($n))
            {
                echo "enter numeric value"."\n";
                fscanf(STDIN,"%d\n",$n);
            }
            return $n;     
       }

       /**
        * function couponNumber is to generate n number of coupon number 
        * 
        * @param $n number of coupon user want  
        */
       static function couponNumbers($n)
       {    
           //array to save the coupon
           $arr = array();
           //$i = 0;
           //count to count the number of thime rendom number generated
           $count = 0;
           //index to change the index of array
           $index = 0;
           //while loop until use get n number of coupon
           while(sizeof($arr) != $n)
           {
               $count++;
               $num = random_int(10,($n+100));
               //if condition to check the coupon use unique or not
               if(!array_search("cou".$num."pon",$arr))
               {
                   $arr[$index++] = ("cou".$num."pon");
               }
           }

           //no of time coupon generated
           echo "count ".$count."\n";
           //unique coupon
           foreach ($arr as $print) {
               echo $print."\n";
           }
       }

    //    static function twoDArray()
    //    {
    //        echo "enter row size"."\n";
    //        $m = Utility::getInt();
    //        echo "\n"."enter colums size"."\n";
    //        $n = Utility::getInt();
    //        $arr = array();
    //        echo "enter valus"."\n";

    //        for($i = 0;$i < $m; $i++)
    //        {
    //            $iArr = array();
    //            for($j = 0; $j < $n ;$j++ )
    //            {
    //                $iArr[$j] = trim(fgets(STDIN));
    //            } 
    //            array_push($arr,$iArr);
    //        }


    //        for($i = 0;$i < $m; $i++)
    //        {
    //            for($j = 0; $j < $n ;$j++ )
    //            {
    //                echo $arr[$i][$j]." ";
    //            }
    //            echo "\n";
    //        }
    //    }

       /**
        * funtion addsToZero to check the the sum of three value in array is zero or not
        *
        * @param $arr array in which we want to check the sum of value is zero or not 
        */
       static function addsToZero($arr)
       {
           //count to check no of total values 
           $count = 0;
           // three nested for loop to take three values 
           for($i = 0; $i < sizeof($arr); $i++)
           {
               for($j = $i + 1; $j < sizeof($arr); $j++)
               {
                   for($j2 = $j + 1; $j2 < sizeof($arr); $j2++)
                   {
                       if($arr[$i]+$arr[$j]+$arr[$j2]==0)
                       {
                           //values which sum is zero
                           echo $arr[$i]." + ".$arr[$j]." + ".$arr[$j2]." = 0"."\n";
                           $count++;
                       }
                   }
               }
           }
           //total no of zero sum
           echo "total sum ".$count;
       }

       /**
        * function distance is use to claculate the distance of x and y for 0,0
        * @param $x is x coordinate 
        * @param $y is y coordinate
        * @return distance from zero
        */
       static function distance($x,$y)
       {
           return sqrt(($x*$x) +($y*$y));
       }

       /*static function stopWatch()
       {
           $st = 0; $sp = 0;
           echo "press 1 to start watch"."\n"."press 2 to stop watch"."\n";
           $start = Utility::getInt();
           if($start == 1)
           {
               $st = time();
           }
           $stop = Utility::getInt();
           if($stop == 2)
           {
               $sp = time();
           }

           echo ($sp - $st)." sec";
           
       }*/

       
   }
  
?>
