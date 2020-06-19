<?php
	$array = array(321,312,3,4,5,67,45,56,5,7,6,787,8,7,2);
	function checkArray($array) {
		for ($i=0; $i < count($array); $i++) { 
			if($array[$i] == 67) {
				echo "Mảng đã cho có số 67";
			}
			break;
		}
		echo "Mảng đã cho không có số 67";
	}
	checkArray($array);
	echo "<br>";

	$array2 = [];
	$vitri = [];
	for ($i=0; $i < 100; $i++) { 
		$array2[$i] = $i+1;
		if($array2[$i]%3 == 0) {
			$vitri[] = $i;
		}
	}
	function printVitri ($vitri) {
		$string = '';
		foreach ($vitri as $key => $value) {
			$string .= $value.'-';
		}
		echo substr($string, 0, -1);
	}
	printVitri($vitri);
	echo "<br>";
	echo "<br>";
	echo "<br>";

	$a = array(321,312,3,4,5,67,45,56,5,7,6,787,8,7,2,-123);
	$c = count($a);
	function checkBiggest($a, $c) {
		if($c == 1) {
			return $a[0];
		}
		return min($a[$c-1],checkBiggest($a, $c-1));
	}
	echo checkBiggest($a, $c);
	echo "<br>";
	echo min($a);
	echo "<br>";

	$cc = [];
	for ($i=0; $i < count($a); $i++) { 
		if(isset($cc[$a[$i]])) {
			echo 3;
			exit();
		}
	}
	echo "<br>";
	echo "<br>";

	$h = '1';
	echo $h;
	echo "<br>";
	$g = &$h;
	echo $g;
	echo "<br>";
	$g = "2$g";
	echo $h;
	echo "<br>";
	echo $h.", ".$g;

	echo "<br>";
	echo "<br>";

	$tt = "abcef";
	echo substr($tt,0,-3);

	echo "<br>";
	echo "<br>";

	// function twoSum($nums, $target) {
 //        $map = array();
        
 //        foreach($nums as $key => $number) {
 //            $complement = $target - $number;
            
 //            if (isset($map[$complement])) {
 //                return array($map[$complement], $key);
 //            }
            
 //            if(!isset($map[$number]))
 //            	$map[$number] = $key;
 //        }
        
 //        throw new exception("No two numbers equal sum.");
 //    }
 //    var_dump(twoSum($array, 14));
	// echo "<br>";
	// echo "<br>";

 //    function checkPalindrome($n) {
 //    	$number = $n;
 //    	$reverse_number = 0;
 //    	while($number > 0) {
 //    		$between = $number % 10;
 //    		$reverse_number = $reverse_number * 10 + $between;
 //    		$number = ($number - $between) / 10;
 //    	}

 //    	return $n == $reverse_number;
 //    }

 //    function highestPalindromeNumber($n) {
 //    	$upper_limit = 0;

 //    	// find the maximum number with n-digit
 //    	for ($i=1; $i <= $n; $i++) { 
 //    		$upper_limit *= 10;
 //    		$upper_limit += 9;
 //    	}

 //    	$lower_limit = 1 + (int)($upper_limit / 10);
 //  //   	echo $upper_limit;
	// 	// echo "<br>";
 //  //   	echo $lower_limit;
 //    	$max = 0;
 //    	for ($i=$lower_limit; $i <= $upper_limit; $i++) { 
 //    		if(checkPalindrome($i)) {
 //    			for ($j=$i; $j <= $upper_limit; $j++) { 
 //    				if(checkPalindrome($j)) {
 //    					if($max < $i*$j && checkPalindrome($i*$j)) {
	// 						echo $i.":::".$j.":::".$i*$j."<br>";
 //    						$max = $i*$j;
 //    					}
 //    				}
 //    			}
 //    		}
 //    	}
 //    	echo $max;
 //    }

    // highestPalindromeNumber(4);
	echo "<br>";
	echo "<br>";

	// $stringT = "Hello? World abc!!!";
	// $res = "";
	// $countS = strlen($stringT) - 1;
	// for ($i=$countS; $i > 0; $i--) { 
	// 	$res .= $stringT[$i];
	// }
	// echo $res;


	$stringM = "Miracles Group";
	$shiftBy = 1;
	$alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$newAlphabet = substr($alphabet, $shiftBy).substr($alphabet, 0, $shiftBy);
	$res = strtr($stringM, $alphabet, $newAlphabet);
	echo substr($alphabet, 1);


	/*Tạo 1 string $alphabet = "a->zA->Z", tạo thêm 1 string $newAlphabet dịch chuyển bảng chữ cái tới 1 đơn vị bằng cách dùng dùng substr($alphabet, 1).substr($alphabet, 0, 1) . Sau đó dùng hàm thay thế strtr($str, $alphabet, $newAlphabet).


	Tạo biến $result = "", dùng hàm for i chạy từ strlen($str)-1 về i>0 {$result .= $str[$i];}


	Tạo biến result = 1, dùng hàm for i chạy 1 tới num với result *= i


	Không hiểu đề bài nói gì, nguyên văn đề bài như sau:
"Câu 4.
https://prnt.sc/qazlxo
Hiện cần check 1 text truyên"

*/


?>