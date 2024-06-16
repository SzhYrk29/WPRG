<?php
require_once 'A.php';
require_once 'B.php';
class Class1
{
    use A, B {
        A::bigTalk as bigTalkA;
        B::bigTalk insteadof A;
        A::smallTalk as smallTalkA;
        B::smallTalk insteadof A;
    }
}