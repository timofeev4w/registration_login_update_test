<?php

class Validator
{
    public static function checkInput($input, array $inputParams)
    {
        $paramsPath = ROOT.'/config/validate_params.php';
        $params = include($paramsPath);

        $validatorErrors = [];
        foreach ($inputParams as $key => $value) {
            if ($key == 'min') {
                if (strlen($input) < $value) {
                    $validatorErrors = ['error' => str_replace(':min', $value, $params['min']) ];
                }
            }

            if ($key == 'max') {
                if (strlen($input) > $value) {
                    $validatorErrors = ['error' => str_replace(':max', $value, $params['max']) ];
                }
            }

            if ($key == 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $validatorErrors = ['error' => $params['email'] ];
                }
            }
        }

        return $validatorErrors;
    }
}

?>