<?php
    function dayOfTheWeek($birth_date) {
        $days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $birth_date = new DateTime($birth_date);
        return $days[$birth_date->format("w")];
    }

    function usersAge($birth_date) {
        $today = new DateTime();
        $birth_date = new DateTime($birth_date);
        $age = $today->diff($birth_date)->y;
        return $age;
    }

    function timeUntilNextBirthday($birth_date) {
        $today = new DateTime();
        $nextBirthday = new DateTime($birth_date);
        $nextBirthday -> setDate((int)$today->format('Y'), (int)$nextBirthday->format('m'), (int)$nextBirthday->format('d'));
        if ($nextBirthday < $today) {
            $nextBirthday->modify('+1 year');
        }
        $timeUntilNextBirthday = $today->diff($nextBirthday)->days;
        return $timeUntilNextBirthday;
    }

    if (isset($_GET['birth_date'])) {
        $birth_date = $_GET['birth_date'];
        echo "You were born on " . dayOfTheWeek($birth_date) . "<br>";
        echo "Your age is " . usersAge($birth_date) . "<br>";
        echo "Days until your next birthday: " . timeUntilNextBirthday($birth_date) . "<br>";
    }

?>