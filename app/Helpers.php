<?php
namespace App;
// app/Helpers.php
  
use Carbon\Carbon;
use App\Models\Backend\Category;
use App\Models\Backend\PostNews;


if (!function_exists('banglaDateTime')) {
    function banglaDateTime($org_date) {
        // $now = Carbon::now()->locale('bn');

        $dayInBangla = $org_date->isoFormat('dddd');
        $date = $org_date->isoFormat('D MMMM YYYY');
        $time = $org_date->isoFormat('A h:mm');

        $eng = array('1','2','3','4','5','6','7','8','9','0');
        $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');

        return str_ireplace($eng, $bng, $date);
    }
}

if (!function_exists('anotherCustomFunction')) {
    function anotherCustomFunction() {
        // Your logic here
    }
}

if (!function_exists('limitText')) {
    function limitText($text, $limit) {
        // Remove any HTML tags from the text
        $text = strip_tags($text);
    
        // Check if the length of the text is already within the limit
        if (strlen($text) <= $limit) {
            return $text; // No need to truncate
        }
    
        // Find the last space within the limit
        $lastSpace = strrpos(substr($text, 0, $limit), ' ');
    
        // Truncate the text to the last space within the limit
        $truncatedText = substr($text, 0, $lastSpace);
    
        return $truncatedText;
    }
}


// Example usage:
// $originalText = $automobiles_1->news_body;
// $characterLimit = 200;

// $truncatedText = limitText($originalText, $characterLimit);

// echo $truncatedText;




