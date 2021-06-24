<?php
//v0.1.0 24jun2021 type email
return function ($valuesArr, $rulesArr) {
    $error=false;
    foreach ($valuesArr as $key => $value) {
        $valueLen=mb_strlen($value);
        if (isset($rulesArr[$key])) {
            $msg=$rulesArr[$key]['message'];
            unset($rulesArr[$key]['message']);
            foreach ($rulesArr[$key] as $ruleName => $ruleValue) {
                if ($ruleName == 'maxLength' and
                $valueLen>$ruleValue) {
                    $error[$key]=$msg;
                }
                if ($ruleName == 'minLength' and
                $valueLen<$ruleValue) {
                    $error[$key]=$msg;
                }
                if ($ruleName == 'type' and $ruleValue=='email') {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $error[$key]=$msg;
                    }
                }
            }
        }
    }
    return $error;
};
