<?php
include_once 'alfabets.php';
define('REGULAR_SORT', 0);
define('NATURAL_SORT', 1);


 /**
  * Перевірка форми на пустоту
  * @param array $formName 
  * Масив форм для валідації
  * @return bool
  */
function isFormEmpty(array $formName): bool
 {
    for ($i = 0; $i < count($formName); $i++) {

        if (empty(trim($_REQUEST[$formName[$i]]))) {
            return true;
        }
    }
    return false;
}


/**
 * Повертає значення форми
 * @param string $formName Ім'я форми
 * @return string
 */
function formValue(string $formName): string
{
    if(!isFormEmpty([$formName])){
        return trim($_REQUEST[$formName]);
    }
}

/**
 * Змінює реєстр алфавіту на нижній
 * @param array $alfhabet 
 * @return array
 */
function AlfhabettoLower(array $alfhabet): array {
    
    $alfhab_to_lower = [];
    $i = 0;

    foreach ($alfhabet as $item) {
        $alfhab_to_lower[$i] = mb_strtolower($item);
        $i++;
    }

    return $alfhab_to_lower;
}

/**
 * Створює масив типу [A,a,Б,б]
 * @param array $alfhabet
 * @return array
 */
function creatAlfhabetNatural(array $alfhabet): array {
    
    $abetka = $alfhabet;
    $alfhabet_lower_case = AlfhabettoLower($abetka);
    $count_value_alfhabet = count($abetka);
    $alfhabet_natural = [];
    
    for ($i = 0; $i < $count_value_alfhabet; $i++) {
        $alfhabet_natural[] = $abetka[$i];
        $alfhabet_natural[] = $alfhabet_lower_case[$i];
    }
    return $alfhabet_natural;
}

/**
 * Створює масив типу [A,Б,a,б]
 * @param array $alfhabet
 * @return array
 */
function creatAlfhabetRegular(array $alfhabet): array {
    
    $abetka = $alfhabet;
    $alfhabet_lower_case = AlfhabettoLower($abetka);
    $abetka_regular = array_merge($abetka, $alfhabet_lower_case);
            
    return $abetka_regular;
}

/**
 * Перевірка слова відповідно до заданого алфавіту
 * @param array $compare Масив для порівняня 
 * @param array $alfhabet Алфавіт по якому проводиться перевірка
 * @return array Значення $compare які не збігаються з $alfhabet
 */
function comparefromAlfhabet(array &$compare, array $alfhabet = UA): array {
    
       $full_alfhabet = creatAlfhabetRegular($alfhabet);
       $discrepancy = [];
       
       foreach ($compare as $key => $item) {

        $length_item = mb_strlen($item);

        for ($i = 0; $i < $length_item; $i++) {
            
            $letter = mb_substr($item, $i, 1);
            if($letter == '-'){
                continue;
            }
            $result = array_search($letter, $full_alfhabet);
            
            if($result === false){
                
                $discrepancy[] = $item;
                unset($compare[$key]);
                break;
            }
            
        }
    }
    
    sort($discrepancy);
    return $discrepancy;
}

/**
	 * <p>This function sorts an array. Elements will be arranged from lowest to highest when this function has completed.</p><p><b>Note</b>:</p><p>If two members compare as equal, their relative order in the sorted array is undefined.</p>
	 * @param array $array <p>The input array.</p>
	 * @param array $alfhabet <p>The optional parameter.</p><code>alfhabet</code> Можна замінити алфавіт для правильної роботи в певній країні.
	 * @param  $sort_flags <p>The optional parameter <code>sort_flags</code> may be used to modify the sorting behavior using these values:</p> 
 * <p>Sorting type flags:</p><ul> <li> <b><code>'REGULAR_SORT'</code></b>Звичайне порівняння елементів</li> <li> <b><code>'NATURAL_SORT'</code></b>Сортування до вигляду "Aa Бб Вв"</li></ul>
	 *
	 */
        function sortAlfhabet(array $array, array $alfhabet = UA, $sort_flags = NATURAL_SORT) {

    $array_strings = $array;
    $simpl_abetka = $alfhabet;
    $arr_discrepancy_strings = comparefromAlfhabet($array_strings, $alfhabet);
    $modified_alphabet = $sort_flags ? creatAlfhabetNatural($simpl_abetka) : creatAlfhabetRegular($simpl_abetka);

    uasort($array_strings, function ($a, $b) use ($modified_alphabet){
    
    $alphabet_arr_flip = array_flip($modified_alphabet);
    $lengthA = mb_strlen($a);
    $lengthB = mb_strlen($b);

    $shorter_character_length = $lengthA > $lengthB ? $lengthB : $lengthA;
  
    for ($i = 0; $i <= $shorter_character_length; $i++) {
        
        $letter_str_a = $alphabet_arr_flip[mb_substr($a, $i, 1)];
        $letter_str_b = $alphabet_arr_flip[mb_substr($b, $i, 1)];
               
        if ($letter_str_a < $letter_str_b) {
            $status = -1;
            break;
        } elseif ($letter_str_a > $letter_str_b) {
            $status = 1;
            break;
        } else {
            $status = 0;
        }
    }
          return $status;
    });
    
    //$arr_strings_finall = array_merge($array_strings, $arr_discrepancy_strings);
    $arr_strings_finall['corect_values'] = $array_strings;
    $arr_strings_finall['not_corect_values'] = $arr_discrepancy_strings;
    
    return $arr_strings_finall;
}



/**
 * Додає ',' в кінець речення
 * @param string $string
 * @return string
 */
function addComatoEnd(string $string): string {

    $pos_coma = strpos($string, ',', -1);

    if ($pos_coma === false) {
        $string = $string . ',';
    }
    return $string;
}

