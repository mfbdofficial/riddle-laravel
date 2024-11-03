<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Riddle_returnSolutionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_dayOneRiddleChallenge()
    {
        function capitalizeEachWord(string $string): string
        {
            $wordArray = explode(" ", $string);
            $wordArrayModification = [];
            foreach ($wordArray as $eachWord) {
                $wordArrayModification[] = ucfirst($eachWord);
            }
            $wordResult = implode(" ", $wordArrayModification);
            return $wordResult;
        }
        self::assertEquals('Muhammad Fajar Budi Dharmawan', capitalizeEachWord('muhammad fajar budi dharmawan'));
        self::assertEquals('Muhammad Fajar Budi Dharmawan', ucwords('muhammad fajar budi dharmawan'));

        function numberOfStepsToReduceANumberToZero($num) 
        {
            $step = 0;
            while ($num != 0) {
                $step++;
                if ($num % 2 == 0) {
                    $num = $num / 2;
                } else {
                    $num = $num - 1;
                }
            }
            return $step;
        }
        function numberOfStepsToReduceANumberToZeroBySenior($num)
        {
            $i = 0;
            while($num){
                $num = $num % 2 == 0 ? $num / 2 : $num - 1;
                $i++;
            }
            return $i;
        }
        self::assertEquals(12, numberOfStepsToReduceANumberToZero(123));
        self::assertEquals(6, numberOfStepsToReduceANumberToZeroBySenior(14));

        function compareTriplets($a, $b): array
        {
            $firstPersonScore = 0;
            $secondPersonScore = 0;
            for ($i = 0; $i < count($a); $i++) { 
                if ($a[$i] != $b[$i]) {
                    $a[$i] > $b[$i] ? $firstPersonScore++ : $secondPersonScore++;
                }
            }
            return [$firstPersonScore, $secondPersonScore];
        }
        $Alice = [17, 28, 30];
        $Bob = [99, 16, 8];
        self::assertEquals([2, 1], compareTriplets($Alice, $Bob));
    }

    public function test_dayTwoRiddleChallenge()
    {
        function binaryArrayToNumberBasic($arr): int
        {
            $arrReverse = [];
            for ($i = count($arr) - 1; $i >= 0; $i--) { 
                $arrReverse[] = $arr[$i];
            }
            $decimalResult = 0;
            for ($i = 0; $i < count($arr); $i++) {
                $binaryValue = 0;
                for ($j = 0; $j <= $i; $j++) {  
                    if ($j == 0) {
                        $binaryValue += 1;
                    } else {
                        $binaryValue = $binaryValue * 2;
                    }
                }
                //echo $binaryValue; //hanya untuk debug
                $decimalResult += $arrReverse[$i] * $binaryValue;
            }
            return $decimalResult;
        }
        function binaryArrayToNumber($arr): int
        {
            $arrReverse = [];
            for ($i = count($arr) - 1; $i >= 0; $i--) { 
                $arrReverse[] = $arr[$i];
            }
            $decimalResult = 0;
            for ($i = 0; $i < count($arr); $i++) {
                $decimalResult += $arrReverse[$i] * pow(2, $i);
            }
            return $decimalResult;
        }
        function binaryArrayToNumberBySenior(array $arr): int 
        {
            return bindec(implode('', $arr));
        }
        self::assertEquals(11, binaryArrayToNumberBasic([1, 0, 1, 1]));
        self::assertEquals(15, binaryArrayToNumber([1, 1, 1, 1]));
        self::assertEquals(13, binaryArrayToNumberBySenior([1, 1, 0, 1]));

        function middleNode($head): array
        {
            $headFromMiddle = [];
            if (count($head) % 2 == 1) {
                for ($i = round(count($head) / 2) - 1; $i  < count($head); $i ++) { 
                    $headFromMiddle[] = $head[$i];
                }
            } else {
                for ($i = count($head) / 2; $i  < count($head); $i ++) { 
                    $headFromMiddle[] = $head[$i];
                }
            }
            return $headFromMiddle;
        }
        /*
        function middleNodeLinkedList($head) 
        { //di atas itu cara kalo array, tapi kalo linked list itu perlakukannya berbeda
            $middle = $head;
            $count = 0;
            while ($head != null && $head->next != null) {
                $head = $head->next;
                $count++;
            }
            $step = $count / 2;
            for ($i = 0; $i < $step; $i++) {
                $middle = $middle->next;
            }
            return $middle;
        }
        function middleNodeBySenior($head) 
        {
            $slow = $head;
            while ($head != null && $head->next != null) {
                $slow = $slow->next;          
                $head = $head->next->next;
            }
            return $slow;
        }
        */
        self::assertEquals([3, 4, 5], middleNode([1, 2, 3, 4, 5]));
        self::assertEquals([20, 14, 35, 47, 55], middleNode([1, 8, 7, 109, 99, 20, 14, 35, 47, 55]));
    }

    public function test_dayThreeRiddleChallenge() 
    {
        function reverseWords($str): string
        {
            $arrStr = explode(' ', $str);
            $arrStrReverse = [];
            foreach ($arrStr as $word) {
                $wordReverse = '';
                for ($i = strlen($word) - 1; $i >= 0; $i--) {
                    $wordReverse .= $word[$i];
                }
                $arrStrReverse[] = $wordReverse;
            }
            return implode(' ', $arrStrReverse);
        }
        function reverseWordsBySenior($str): string
        {
            return implode(' ', array_reverse(explode(' ', strrev($str)))) ;
        }
        self::assertEquals('sihT si na !elpmaxe', reverseWords('This is an example!'));
        self::assertEquals('elbuod  secaps', reverseWordsBySenior('double  spaces'));

        function canConstruct($ransomNote, $magazine): bool
        {
            $ransomNoteArr = str_split($ransomNote);
            $magazineArr = str_split($magazine);
            foreach ($ransomNoteArr as $ransomLetter) {
                $index = array_search($ransomLetter, $magazineArr);
                if ($index === false) {
                    return false;
                }
                unset($magazineArr[$index]);
            }
            return true;
        }
        function canConstructBySenior1($ransomNote, $magazine): bool
        {
            $find = str_split($magazine);
            foreach (str_split($ransomNote) as $note) {
                $key = array_search($note, $find);
                if ($key === false) {
                    return false;
                } else {
                    unset($find[$key]);
                }
            }
            return true;
        }
        /*
        function canConstructBySenior2($ransomNote, $magazine): bool
        {
            // An empty array will be indexed by magazine symbols set mapped to its frequency.
            // key = symbol, value = symbol's frequency in magazine string.
            // The casket size is the size of the magazine string unique symbols set,
            // but maximum 26 lowercase English letters.            
            $casket = [];            
            // First pass with N iterations through the magazine string fills the casket's cells.
            // Reverse pass order for single string length calculation.
            for ($i = strlen($magazine) - 1; $i >= 0 ; $i--) {
                // $magazine[$i] is i-th symbol of the string and it is index (key) of the casket's cell.
                $casket[$magazine[$i]]++; //NOTE YET (LEARN IT MORE ABOUT THIS SYNTAX STYLE)
            }
            // Second pass with maximum M iterations (in case ransomNote can be constructed)
            // through ransomNote string raids the casket's cells. 
            // Reverse pass order for single string length calculation.
            for ($j = strlen($ransomNote) - 1; $j >= 0 ; $j--) {
                // The emptiness the letter's cell of the casket (in case of a lack of the required to
                // type symbol) causes the early breaking of the iteration and the return of a
                // negative result. Decrement is performed after checking!
                if ($casket[$ransomNote[$j]]-- == 0) return false; //NOTE YET (LEARN IT MORE ABOUT THIS SYNTAX STYLE)
            }
            // The string has successfully typed (typesetting symbols were presented enough).
            return true; 
        }
        */
        self::assertEquals(true, canConstruct('aa', 'aab'));
        self::assertEquals(false, canConstructBySenior1('abc', 'aabbbe'));
        // self::assertEquals(false, canConstructBySenior2('abc', 'aabbbe'));

        function diagonalDifference($arr) 
        {
            $diagonalLeft = 0;
            $diagonalRight = 0;
            $j = count($arr) - 1;
            for ($i = 0; $i < count($arr); $i++) {
                $diagonalLeft += $arr[$i][$i];
                $diagonalRight += $arr[$i][$j];
                $j--;
            }
            return abs($diagonalLeft - $diagonalRight);
        }
        self::assertEquals(15, diagonalDifference([[11, 2, 4], [4, 5, 6], [10, 8, -12]]));
    }

    public function test_dayFourRiddleChallenge() 
    {
        function smashBasic(array $words): string 
        {
            $smashedWords = '';
            for ($i = 0; $i < count($words); $i++) {
              if ($i + 1 === count($words)) {
                $smashedWords .= $words[$i];
              } else {
                $smashedWords .= $words[$i] . ' ';
              }
            }
            return $smashedWords;
          }
        function smash(array $words): string 
        {
            return implode(' ', $words);
        }
        function smashBySenior(array $words): string 
        {
            return join(' ', $words);
        }
        self::assertEquals('hello good world', smashBasic(['hello', 'good', 'world']));
        self::assertEquals('hello world this is great', smash(['hello', 'world', 'this', 'is', 'great']));
        self::assertEquals('i want to eat u', smashBySenior(['i', 'want', 'to', 'eat', 'u']));

        function twoSumTarget($nums, $target): array
        {
            $index = [];
            for ($i = 0; $i < count($nums); $i ++) {
                for ($j = $i + 1; $j < count($nums); $j++) {
                    if ($nums[$i] + $nums[$j] == $target) {
                        $index[] = $i;
                        $index[] = $j;
                        return $index;
                    }
                }
            }
        }
        function twoSumTargetBySenior($nums, $target): array
        {
            $map = [];
            for ($i = 0; $i < count($nums); $i++) {
                $complement = $target - $nums[$i];
                if (isset($map[$complement])) { //cek berdasarkan value (ini karena terbalik)
                    return [$map[$complement], $i]; //akses dengan value untuk mendapat index-nya di perpustakaan (ini karena terbalik)
                }
                $map[$nums[$i]] = $i;
            } //konsepnya seperti perpustakaan penyimpan elemen angka yg sudah diperulangkan (bentuknya array)
        } //disimpan secara terbalik antara value dan index
        self::assertEquals([1, 2], twoSumTarget([3, 2, 4], 6));
        self::assertEquals([0, 1], twoSumTarget([3, 3], 6));
        self::assertEquals([0, 2], twoSumTargetBySenior([2, 11, 7, 15], 9));

        function plusMinus($arr): array 
        {   
            $positive = 0;
            $negative = 0;
            $zero = 0;
            foreach ($arr as $num) {
                if ($num > 0) {
                    $positive++;
                } else if ($num < 0) {
                    $negative++;
                } else {
                    $zero++;
                }
            }
            $positiveFraction = $positive / count($arr);
            $negativeFraction = $negative / count($arr);
            $zeroFraction = $zero / count($arr);
            return [round($positiveFraction, 6), round($negativeFraction, 6), round($zeroFraction, 6)];
        }
        function plusMinusPrint($arr): array //versi kalo mau di-print tiap hasilnya secara bertumpuk 
        {   
            $positive = 0;
            $negative = 0;
            $zero = 0;
            foreach ($arr as $num) {
                if ($num > 0) {
                    $positive++;
                } else if ($num < 0) {
                    $negative++;
                } else {
                    $zero++;
                }
            }
            $positiveFraction = $positive / count($arr);
            $negativeFraction = $negative / count($arr);
            $zeroFraction = $zero / count($arr);
            $result = [round($positiveFraction, 6), round($negativeFraction, 6), round($zeroFraction, 6)];
            foreach ($result as $element) {
                echo $element . '\n';
            }
        }
        self::assertEquals([0.500000, 0.333333, 0.166667], plusMinus([-4, 3, -9, 0, 4, 1]));
    }

    public function test_dayFiveRiddleChallenge()
    {
        function sequence_sum(int $begin, int $end, int $step): int 
        {
            $sum = 0;
            for ($i = $begin; $i <= $end; $i += $step) { 
                $sum += $i;
            }
            return $sum;
        }
        function sequence_sumBySenior(int $begin, int $end, int $step): int 
        {
            $sum = 0;
            for ($begin; $begin <= $end; $begin += $step) {
                $sum += $begin;
            }
            return $sum;
        }
        self::assertEquals(15, sequence_sum(1, 5, 1));
        self::assertEquals(16, sequence_sumBySenior(1, 7, 2));

        function isPalindrome($x): bool
        {
            $numStringArray = str_split(strval($x));
            $reverseNumStringArray = [];
            for ($i = count($numStringArray) - 1; $i >= 0; $i--) {
                $reverseNumStringArray[] = $numStringArray[$i];
            }
            $numString = implode($numStringArray);
            $reverseNumString = implode($reverseNumStringArray);
            if ($numString === $reverseNumString) {
                return true;
            }
            return false;
        }
        function isPalindromeBySenior($x): bool
        {
            return $x == strrev($x);
        }
        self::assertEquals(true, isPalindrome(121));
        self::assertEquals(false, isPalindrome(-121));
        self::assertEquals(true, isPalindromeBySenior(1553551));

        function staircase0($n) {
            for ($i = 0; $i < $n; $i++) {
                $line = "";
                for ($j = $n - 1; $j >= 0; $j--) {
                    if ($j <= $i) {
                        $line .= "#";
                    } else {
                        $line .= " ";
                    }
                }
                $line .= "\n";
                echo $line;
            }
        }
        function staircase($n) {
            for ($i = 1; $i <= $n; $i++) {
                $line = "";
                for ($j = $n; $j > 0; $j--) {
                    if ($j <= $i) {
                        $line .= "#";
                    } else {
                        $line .= " ";
                    }
                }
                $line .= "\n";
                echo $line;
            }
        }
    }

    public function test_daySixRiddleChallenge() 
    {
        function disemvowel($string): string
        {
            return str_replace(['a', 'A', 'i', 'I', 'u', 'U', 'e', 'E', 'o', 'O'], '', $string);
        }
        function disemvowelBySenior1($string): string 
        {
            $string = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $string);
            return $string;
        }
        function disemvowelBySenior2($string): string
        {
            return preg_replace("/[aeiou]/i", "", $string);
        }
        self::assertEquals("Ths wbst s fr lsrs LL!", disemvowel("This website is for losers LOL!"));
        self::assertEquals("Ths wbst s fr lsrs LL!", disemvowelBySenior1("This website is for losers LOL!"));
        self::assertEquals("Ths wbst s fr lsrs LL!", disemvowelBySenior2("This website is for losers LOL!"));

        function romanToInt($s): int 
        {
            $sArr = str_split($s);
            $intOfRoman = 0;
            for ($i = 0; $i < count($sArr); $i++) { 
                if ($s[$i] === "M") {
                    $intOfRoman += 1000;
                } else if ($s[$i] === "D") {
                    $intOfRoman += 500;
                } else if ($s[$i] === "L") {
                    $intOfRoman += 50;
                } else if ($s[$i] === "V") {
                    $intOfRoman += 5;
                }
                if ($s[$i] === "C") {
                    if (isset($s[$i + 1]) && $s[$i + 1] === "M") {
                        $intOfRoman += 900;
                        $i++;
                    } else if (isset($s[$i + 1]) && $s[$i + 1] === "D") {
                        $intOfRoman += 400;
                        $i++;
                    } else { 
                        $intOfRoman += 100; 
                    }
                } 
                if ($s[$i] === "X") {
                    if (isset($s[$i + 1]) && $s[$i + 1] === "C") {
                        $intOfRoman += 90;
                        $i++;
                    } else if (isset($s[$i + 1]) && $s[$i + 1] === "L") {
                        $intOfRoman += 40;
                        $i++;
                    } else { 
                        $intOfRoman += 10;
                    }
                } 
                if ($s[$i] === "I") {
                    if (isset($s[$i + 1]) && $s[$i + 1] === "X") {
                        $intOfRoman += 9;
                        $i++;
                    } else if (isset($s[$i + 1]) && $s[$i + 1] === "V") {
                        $intOfRoman += 4;
                        $i++;
                    } else {
                        $intOfRoman += 1;
                    }
                }
            }
            return $intOfRoman;
        }
        function romanToIntBySenior1($s): int
        {
            $total = 0;
            $prevValue = 0;
            for ($i = strlen($s) - 1; $i >= 0; $i--) {
                $currentValue = 0;
                switch ($s[$i]) {
                    case 'I':
                        $currentValue = 1;
                        break;
                    case 'V':
                        $currentValue = 5;
                        break;
                    case 'X':
                        $currentValue = 10;
                        break;
                    case 'L':
                        $currentValue = 50;
                        break;
                    case 'C':
                        $currentValue = 100;
                        break;
                    case 'D':
                        $currentValue = 500;
                        break;
                    case 'M':
                        $currentValue = 1000;
                        break;
                }
                // Check if the current value is less than the previous value (indicating a subtractive pair)
                // If true, subtract the current value from the total; otherwise, add it to the total
                $total += ($currentValue < $prevValue) ? -$currentValue : $currentValue;
                // Update the previous value for the next iteration
                $prevValue = $currentValue;
            }
            return $total;
        }
        /*
        const VALUES = [ //inisialisasi untuk diakses function romanToIntBySenior2
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];
        function romanToIntBySenior2($s) {
            $result = 0;
            $prev = 0;
            $i = 0;
            do {
                $value = self::VALUES[$s[$i]]; //akses nilai kalo berada dalam 1 class
                $result += $value - ($value > $prev ? $prev * 2 : 0); //logikanya kata tambah aja selalu current value, baru pengurangannya dikali 2, seolah kita ga melakukan penjumlahan dan hanya melakukan pengurangan 1 kali saja
                $prev = $value;
                ++$i;
            } while($s[$i]);
            return $result;
        } //cara ini bisa bekerja hanya jika romanToIntBySenior2() dan inisialisasi values berada dalam 1 class dan tidak terbungkus method lain
        */
        self::assertEquals(1994, romanToInt("MCMXCIV"));
        self::assertEquals(1996, romanToIntBySenior1("MCMXCVI"));

        function miniMaxSum($arr): array
        {
            $minSum = 0;
            $currentMax = $arr[0];
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i] > $currentMax) {
                    $currentMax = $arr[$i];
                }
                $minSum += $arr[$i];
            }
            $minSum = $minSum - $currentMax;
            $maxSum = 0;
            $currentMin = $arr[0];
            for ($j = 0; $j < count($arr); $j++) { 
                if ($arr[$j] < $currentMin) {
                    $currentMin = $arr[$j];
                }
                $maxSum += $arr[$j];
            }
            $maxSum = $maxSum - $currentMin;
            //echo $minSum . ' ' . $maxSum; //kalo mau dicetak
            return [$minSum, $maxSum];
        }
        self::assertEquals([16, 24], miniMaxSum([1, 3, 5, 7, 9]));
    }

    public function test_daySevenRiddleChallenge()
    {
        function isIsogram($string): bool
        {
            $string = strtolower($string);
            $stringArray = str_split($string);
            for ($i = 0; $i < count($stringArray); $i++) {
                for ($j = 0; $j < count($stringArray); $j++) {
                    if ($i !== $j && $stringArray[$i] === $stringArray[$j]) {
                        return false;
                    }
                }
            }
            return true;
        }
        function isIsogramBySenior1($string): bool
        {
            if (empty($string)){
                return true;
            }
            $array = str_split(strtolower($string));
            return (count($array) === count(array_unique($array))); //menghitung array semuanya lalu bandingkan dengan jumlah array yg isinya unik apakah sama?
        }
        function isIsogramBySenior2($s): bool 
        {
            //count_chars($string, 3) -> built-in function mode ke 3 me-return string dengan semua character unik saja
            return strlen(count_chars(strtolower($s), 3)) === strlen($s);
        }
        self::assertEquals(true, isIsogram("Dermatoglyphics"));
        self::assertEquals(false, isIsogramBySenior1("Joko Widodo"));
        self::assertEquals(true, isIsogramBySenior2("Alexo"));

        function longestCommonPrefix($strs): string
        {
            $commonPrefix = "";
            $firstStr = $strs[0]; //logikanya cukup ambil string elemen pertama
            if (!array_key_exists(1, $strs) OR strlen($firstStr) === 0) {
                return $firstStr;
            }
            for ($i = 0; $i < strlen($firstStr); $i++) { //perulangan $i untuk bagian isi string
                for ($j = 1; $j < count($strs); $j++) { //perulangan $j untuk bagian isi array dimulai dari elemen ke-2 (index 1)
                    if ($firstStr[$i] !== $strs[$j][$i]) {
                        return $commonPrefix;
                    }
                }
                $commonPrefix .= $firstStr[$i];
            }
            return $commonPrefix;
        }
        function longestCommonPrefixBySenior($strs): string
        { 
            return array_reduce(range(1, strlen(current($strs))), function($success, $i) use ($strs) {return preg_match_all('/(\b|\s)' . preg_quote($prefix = substr(current($strs), 0, $i), '/') . '\w*/m', implode(" ", $strs)) == count($strs) ? $prefix : $success;}, ""); 
        }
        self::assertEquals("fl", longestCommonPrefix(["flower","flow","flight"]));
        self::assertEquals("", longestCommonPrefix(["dog","racecar","car"]));
        self::assertEquals("flower", longestCommonPrefix(["flower"]));
        self::assertEquals("", longestCommonPrefix(["", ""]));
        self::assertEquals("flower", longestCommonPrefixBySenior(["flower","flower","flower"]));

        function birthdayCakeCandles($candles) {
            $tallest = $candles[0];
            for ($i = 0; $i < count($candles); $i++) {
                if ($candles[$i] > $tallest) {
                    $tallest = $candles[$i];
                }
            }
            $countTallest = 0;
            for ($j = 0; $j < count($candles); $j++) {
                if ($candles[$j] === $tallest) {
                    $countTallest++;
                }
            }
            return $countTallest;
        }
        self::assertEquals(2, birthdayCakeCandles([4, 4, 2, 3]));
    }

    public function test_dayEightRiddleChallenge()
    {
        function move($pos, $roll): int
        {
            return $pos + $roll * 2;
        }
        self::assertEquals(7, move(1, 3));

        function isValid($s): bool
        {
            if ($s === "") {
                return true;
            }
            $sArr = str_split($s);
            $stateOpen = [];
            for ($i = 0; $i < count($sArr); $i++) {
                if ($sArr[$i] === "(" OR $sArr[$i] === "{" OR $sArr[$i] === "[") {
                    $stateOpen[] = $s[$i];
                }
                if ($sArr[$i] === ")") {
                    if (end($stateOpen) === "(") {
                        array_pop($stateOpen);
                    } else {
                        return false;
                    }
                }
                if ($sArr[$i] === "}") {
                    if (end($stateOpen) === "{") {
                        array_pop($stateOpen);
                    } else {
                        return false;
                    }
                }
                if ($sArr[$i] === "]") {
                    if (end($stateOpen) === "[") {
                        array_pop($stateOpen);
                    } else {
                        return false;
                    }
                }
            }
            if ($stateOpen === []) {
                return true;
            } else {
                return false;
            }
        }
        self::assertEquals(true, isValid("{}[[[()]]]({})"));
        self::assertEquals(false, isValid("{{([[])]}}"));
        self::assertEquals(false, isValid("{"));

        function timeConversion($s) {
            $sArr = explode(":", $s);
            $hour = intval($sArr[0]);
            $time = substr($s, -2);
            if ($time === "AM") {
                if ($hour === 12) {
                    $hour = 0;
                }
            } else if ($time === "PM") {
                if ($hour !== 12) {
                    $hour = $hour + 12;
                } 
            }
            $hour = strval($hour);
            if (strlen($hour) === 1) {
                $hour = "0" . $hour;
            }
            return substr($hour . ":" . $sArr[1] . ":" . $sArr[2], 0, -2);
        }
        self::assertEquals("19:05:45", timeConversion("07:05:45PM"));
        self::assertEquals("11:41:36", timeConversion("11:41:36AM"));
        self::assertEquals("00:00:45", timeConversion("12:00:45AM"));
        self::assertEquals("12:32:11", timeConversion("12:32:11PM"));
    }

    public function test_dayNineRiddleChallenge()
    {
        function findNeedle($haystack): string
        {
            return "found the needle at position " . array_search("needle", $haystack);
        }
        function findNeedleBasic($haystack): string
        {
            for ($i = 0; $i < count($haystack); $i++) {
                if ($haystack[$i] === "needle") {
                    return "found the needle at position " . $i;
                }
            }
        }
        self::assertEquals("found the needle at position 5", findNeedle(["hay", "junk", "hay", "hay", "moreJunk", "needle", "randomJunk"]));
        self::assertEquals("found the needle at position 2", findNeedleBasic(["hay", "junk", "needle", "randomJunk"]));
    
        function mergeTwoLists($list1, $list2): array
        {   
            $list = $list2;
            for ($i = 0; $i < count($list1); $i++) {
                for ($j = 0; $j < count($list); $j++) {
                    if (isset($list[$j + 1])) {
                        if ($list1[$i] >= $list[$j] && $list1[$i] < $list[$j + 1]) {
                            array_splice($list, $j + 1, 0, $list1[$i]);
                            $j += count($list); //kalo gaada ini, maka looping forever? iya, di saat $list1[$i] sesuai
                        }
                    } else {
                        if ($list1[$i] >= $list[$j]) {
                            $list[] = $list1[$i];
                            $j += count($list); //kalo gaada ini, maka looping forever? iya, di saat $list1[$i] terakhir
                        }
                    }
                }
            }
            return $list;
        }
        /*
        class ListNode {
            public $val = 0;
            public $next = null;
            function __construct($val = 0, $next = null) {
                $this->val = $val;
                $this->next = $next;
            }
        }
        */
        /*
        function mergeTwoListsBySenior($list1, $list2) 
        {
            // Create a dummy node to simplify the code and point to the merged list
            $dummy = new ListNode();
            $current = $dummy; // Pointer to the current node in the merged list
            // Iterate until one of the lists is exhausted
            while ($list1 !== null && $list2 !== null) {
                // Compare values of the two lists and add the smaller one to the merged list
                if ($list1->val < $list2->val) {
                    $current->next = $list1;
                    $list1 = $list1->next;
                } else {
                    $current->next = $list2;
                    $list2 = $list2->next;
                }
                // Move the current pointer to the last node in the merged list
                $current = $current->next;
            }
            // Append the remaining nodes from either list (if any)
            if ($list1 !== null) {
                $current->next = $list1;
            } else if ($list2 !== null) {
                $current->next = $list2;
            }
            // The merged list starts from the next of the dummy node
            return $dummy->next;
        }
        */
        /*
        function mergeTwoListsModification($list1, $list2) 
        {
            // Create a dummy node to simplify the code and point to the merged list
            $dummy = new ListNode();
            $current = $dummy; // Pointer to the current node in the merged list
            // Iterate until one of the lists is exhausted
            while ($list1 !== null && $list2 !== null) { 
                // Compare values of the two lists and add the smaller one to the merged list
                if ($list1->val < $list2->val) {
                    $current->next = $list1;
                    $list1 = $list1->next;
                } else {
                    $current->next = $list2;
                    $list2 = $list2->next;
                }
                // Move the current pointer to the last node in the merged list
                $current = $current->next;
            }
            // Append the remaining nodes from either list (if any)
            while ($list1 !== null OR $list2 !== null) { //yang versi memakai while ini tidak jalan dengan benar
                if ($list1 !== null) {
                    $current->next = $list1;
                    $list1 = $list1->next;
                } else if ($list2 !== null) {
                    $current->next = $list2;
                    $list2 = $list2->next;
                }
            }
            // The merged list starts from the next of the dummy node
            return $dummy->next;
        }
        */
        //konsep linked list di atas itu adalah kita bukannya memasukkan element yg sekarang (ini beda dari array)
        //kita memasukkan dengan meniban sekaligus membawa next element dari keadaan pointer yg sekarang
        //linked list itu serangkaian object yang terdiri dari value dan next, linked list juga memiliki pointer
        //pointer yaitu keadaan sekarang dia lagi ada di urutan list yang mana?
        //misal contoh list1 = 1 -> 3 -> 4 -> null, list2 = 1 -> 2 -> 5 -> 6 -> null, prosesnya itu kita buat list dummy value = 0 dan next = null
        //0 -> null 
        //0 -> 1 -> 2 -> 5 -> 6 -> null //pointer di 1
        //0 -> 1 -> 1 -> 3 -> 4 -> null //pointer di 1
        //0 -> 1 -> 1 -> 2 -> 5 -> 6 -> null //pointer di 2
        //0 -> 1 -> 1 -> 2 -> 3 -> 4 -> null //pointer di 3
        //0 -> 1 -> 1 -> 2 -> 3 -> 4 -> null //masih sama, pointer di 4, next-nya yg list1 sudah null
        //0 -> 1 -> 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> null //pointer di 5, langsung tambahin dari pointer list2 (selesai)
        //akse data yg next 1 kali sehingga dimulai dari 1 bukan 0:
        //1 -> 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> null
        //kalo pake while yg salah hasilnya akan:
        //0 -> 1 -> 1 -> 2 -> 3 -> 4 -> 6 -> null //pointer di 6, tertimpa list2 yang pointer-nya di 6  (salah)
        self::assertEquals([1,1,2,3,4,4], mergeTwoLists([1, 2, 4], [1, 3, 4]));
        self::assertEquals([1,1,2,3,4,4], mergeTwoLists([1, 2, 4], [1, 3, 4]));

        function gradingStudents($grades): array
        {
            $finalGrades = [];
            foreach ($grades as $grade) {
                if ($grade < 38 OR $grade === 100) {
                    $finalGrades[] = $grade;
                } else if ($grade >= 38) { 
                    $gradeArr = str_split(strval($grade));
                    $lastDigit = intval($gradeArr[1]);
                    $firstDigit = $gradeArr[0];
                    if ($lastDigit >= 3 && $lastDigit < 5) {
                        $lastDigit = '5';
                    } else if ($lastDigit >= 8) {
                        $lastDigit = '0';
                        $firstDigit = strval(intval($gradeArr[0]) + 1);
                    }
                    $finalGrades[] = intval($firstDigit . $lastDigit);
                }
            }
            return $finalGrades;
        }
        self::assertEquals([67, 80, 0, 100], gradingStudents([67, 78, 0, 100]));
    }

    public function test_dayTenRiddleChallenge() 
    {
        function countPositivesSumNegatives($input): array
        {
            $positiveCount = 0; 
            $negativeSum = 0;
            if ($input === null OR $input === []) {
                return [];
            } 
            for ($i = 0; $i < count($input); $i++) {
                if ($input[$i] > 0) {
                    $positiveCount++;
                } else if ($input[$i] < 0) {
                    $negativeSum += $input[$i];
                }
            }
            return [$positiveCount, $negativeSum];
        }
        function countPositivesSumNegativesBySenior($input): array
        {
            if (empty($input)) {
              return [];
            }
            $positives = array_filter($input, function($i) { return $i > 0; });
            $negatives = array_filter($input, function($i) { return $i < 0; });
            return [count($positives), array_sum($negatives)];
        }
        self::assertEquals([10, -65], countPositivesSumNegatives([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15]));
        self::assertEquals([10, -65], countPositivesSumNegativesBySenior([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15]));

        function removeDuplicates($nums): array
        {
            $shadowNums = $nums;
            for ($i = 0; $i < count($nums); $i++) {
                if (isset($shadowNums[$i + 1])) {
                    if ($shadowNums[$i] === $shadowNums[$i + 1]) {
                        unset($shadowNums[$i]);
                    }
                }
            }
            $newNums = array_values($shadowNums);
            for ($j = 0; $j < count($nums); $j++) {
                if (!isset($newNums[$j])) {
                    $newNums[$j] = "_";
                }
            }
            return $newNums;
        }
        function removeDuplicatesBySenior($nums) 
        {
            $count = count($nums);
            $writeIndex = 1;
            for ($i = 1; $i < $count; $i++) {
                if ($nums[$i] !== $nums[$i - 1]) {
                    $nums[$writeIndex] = $nums[$i];
                    $writeIndex++;
                }            
            }
            return $writeIndex; 
        } //see how it works, input = [1, 1, 2, 2, 2, 3, 4, 4, 5]
        //    * 
        //[1, 1, 2, 2, 2, 3, 4, 4, 5] i = 1
        //       *
        //[1, 2, 2, 2, 2, 3, 4, 4, 5] i = 2
        //          *
        //[1, 2, 3, 2, 2, 3, 4, 4, 5] i = 5
        //             *
        //[1, 2, 3, 4, 2, 3, 4, 4, 5] i = 6
        //                *
        //[1, 2, 3, 4, 5, 3, 4, 4, 5] i = 8 return 5
        self::assertEquals([1, 2, 5, 7, 9, 10, 11, 12, "_", "_", "_", "_", "_", "_", "_"], removeDuplicates([1, 2, 2, 5, 5, 7, 7, 7, 9, 10, 11, 11, 11, 11, 12]));
        self::assertEquals(8, removeDuplicatesBySenior([1, 2, 2, 5, 5, 7, 7, 7, 9, 10, 11, 11, 11, 11, 12]));

        function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges): array
        {
            $appleCount = 0;
            foreach ($apples as $apple) {
                $applePosition = $a + $apple;
                if ($applePosition >= $s && $applePosition <= $t) {
                    $appleCount++;
                }
            }
            //echo $appleCount;
            $orangeCount = 0;
            foreach ($oranges as $orange) {
                $orangePosition = $b + $orange;
                if ($orangePosition >= $s && $orangePosition <= $t) {
                    $orangeCount++;
                }
            }
            //echo $orangeCount;
            return [$appleCount, $orangeCount];
        }
        self::assertEquals([1, 2], countApplesAndOranges(7, 10, 4, 12, [2, 3, -4], [3, -2, -4]));
    }

    public function test_dayElevenRiddleChallenge()
    {
        function smallEnough($a, $limit): bool
        {
            foreach ($a as $x) {
                if ($x > $limit) {
                    return false;
                }
            }
            return true;
        }
        function smallEnoughBySenior($a, $limit): bool
        {
            return max($a) <= $limit;
        }
        self::assertEquals(true, smallEnough([4, 3, 2, 7, 8, 9], 9));
        self::assertEquals(false, smallEnoughBySenior([4, 3, 2, 7, 8, 9], 8));

        function removeElement($nums, $val): int
        {
            $tempNums = $nums;
            for ($i = 0; $i < count($nums); $i++) {
                if ($nums[$i] === $val) {
                    unset($tempNums[$i]);
                }
            }
            $nums = $tempNums; 
            return count($tempNums);
        } //untuk lulus di LeetCode ini, return jumlahnya k dan nilai nums-nya harus dalam keadaan berubah
        function removeElementBySenior1($nums, $val) 
        {
            $nums = array_diff($nums, [$val]);
            return count($nums);
        }
        function removeElementBySenior2($nums, $val) {
            $k = 0;
            for ($i = 0; $i < count($nums); $i++) {
                if ($nums[$i] != $val) {
                    $nums[$k] = $nums[$i];
                    $k++;
                }
            }
            return $k;
        }
        self::assertEquals(2, removeElement([3, 2, 2, 3], 3));
        self::assertEquals(4, removeElementBySenior1([4, 3, 2, 9, 8, 9], 9));
        self::assertEquals(5, removeElementBySenior2( [0, 1, 2, 2, 3, 0, 4, 2], 2));

        function kangaroo($x1, $v1, $x2, $v2) {
            $x1Position = $x1;
            $x2Position = $x2;
            if ($x1 < $x2) {
                if ($v1 <= $v2) {
                    return "NO";
                }
                while ($x1Position <= $x2Position) { 
                    // echo $x1Position . "\n"; //just for debugging
                    // echo $x2Position . "\n";
                    if ($x1Position === $x2Position) {
                        return "YES";
                    }
                    $x1Position += $v1;
                    $x2Position += $v2;
                }
                return "NO";
            } else if ($x1 > $x2) {
                if ($v1 >= $v2) {
                    return "NO";
                }
                while ($x1Position >= $x2Position) { 
                    if ($x1Position === $x2Position) {
                        return "YES";
                    }
                    $x1Position += $v1;
                    $x2Position += $v2;
                }
                return "NO";
            }           
        }
        self::assertEquals("YES", kangaroo(0, 3, 2, 2));
        self::assertEquals("NO", kangaroo(0, 2, 5, 3));
    }

    public function test_dayTwelveRiddleChallenge() 
    {
        function even_or_odd(int $n): string 
        {
            $remain = $n % 2;
            if ($remain === 1 OR $remain === -1) {
                return "Odd";
            } else {
                return "Even";
            }
        }
        function even_or_oddBySenior(int $n): string {
            return $n % 2 ? "Odd" : "Even";
          }
        self::assertEquals("Odd", even_or_odd(5));
        self::assertEquals("Even", even_or_odd(-24));
        self::assertEquals("Odd", even_or_oddBySenior(-1));

        function strStr($haystack, $needle): int
        {
            $needleArr = str_split($needle);
            $haystackArr = str_split($haystack);
            $firstHaystackIndex = 0;
            for ($i = 0; $i < count($haystackArr); $i++) { 
                $current = 0;
                for ($j = $i; $j < count($haystackArr); $j++) {
                    if ($haystackArr[$j] === $needleArr[$current]) {
                        unset($needleArr[$current]);
                        $current++; 
                        if (is_null($firstHaystackIndex)) {
                            $firstHaystackIndex = $i;
                        }
                    } else {
                        $needleArr = str_split($needle);
                        $j = count($haystackArr);
                        $firstHaystackIndex = null;
                    }
                    if (empty($needleArr)) {
                        return $firstHaystackIndex;
                    }
                }
            }
            return -1;
        }
        self::assertEquals(0, strStr("sadbutsad", "sad"));
        self::assertEquals(4, strStr("mississippi", "issip"));

        function getTotalX($a, $b) {
            $current = max($a);
            $candidate = [];
            while ($current <= min($b)) {
                $status = true;
                foreach ($a as $factor) {
                    if ($current % $factor !== 0) {
                        $status = false;
                    }
                }
                foreach ($b as $number) {
                    if ($number % $current !==0) {
                        $status = false;
                    }
                }
                if ($status) {
                    $candidate[] = $current;
                }
                $current++;
            }
            return count($candidate);
        }
        self::assertEquals(3, getTotalX([2, 4], [16, 32, 96]));
    }

    public function test_dayFourTeenRiddleChallenge() 
    {
        function positive_sum($arr): int
        {
            $acquisition = 0;
            for ($i = 0; $i < count($arr); $i ++) { 
                if ($arr[$i] >= 0) {
                    $acquisition += $arr[$i];
                }
            }
            return $acquisition;
        }
        function positive_sumBySenior1($arr): int
        {
            return array_sum(array_filter($arr, function ($n) {return $n > 0;}));
        }
        function positive_sumBySenior2($arr): int
        {
            return array_sum(array_filter($arr, fn($v) => $v > 0));
        }
        self::assertEquals(15, positive_sum([1, 2, 3, 4, 5]));

        function example($a, $b): int
        {
            return $a + $b;
        }
    }
}
