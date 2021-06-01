<?php
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
            }
        }
    }
    return $error;
};
