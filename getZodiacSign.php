<?php
function getZodiacSign($birthday) {
    // Define zodiac signs and their date ranges
    $zodiac = [
        ['start' => '01-20', 'end' => '02-18', 'sign' => 'Aquarius'],
        ['start' => '02-19', 'end' => '03-20', 'sign' => 'Pisces'],
        ['start' => '03-21', 'end' => '04-19', 'sign' => 'Aries'],
        ['start' => '04-20', 'end' => '05-20', 'sign' => 'Taurus'],
        ['start' => '05-21', 'end' => '06-20', 'sign' => 'Gemini'],
        ['start' => '06-21', 'end' => '07-22', 'sign' => 'Cancer'],
        ['start' => '07-23', 'end' => '08-22', 'sign' => 'Leo'],
        ['start' => '08-23', 'end' => '09-22', 'sign' => 'Virgo'],
        ['start' => '09-23', 'end' => '10-22', 'sign' => 'Libra'],
        ['start' => '10-23', 'end' => '11-21', 'sign' => 'Scorpio'],
        ['start' => '11-22', 'end' => '12-21', 'sign' => 'Sagittarius'],
        ['start' => '12-22', 'end' => '01-19', 'sign' => 'Capricorn']
    ];

    // Format the birthdate to mm-dd format
    $date = date('m-d', strtotime($birthday));
    
    foreach ($zodiac as $z) {
        if ($z['sign'] === 'Capricorn') {
            // Special handling for Capricorn (spans year end)
            if ($date >= '12-22' || $date <= '01-19') {
                return 'Capricorn';
            }
        } else {
            // For all other signs, just check if date falls within range
            if ($date >= $z['start'] && $date <= $z['end']) {
                return $z['sign'];
            }
        }
    }
    
    return 'Unknown';
}
?>