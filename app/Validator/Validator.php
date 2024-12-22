<?php

namespace App\Validator;

class Validator{

    public $errors = [];
    // public function validatior(array $value, array $rule){
    //     echo "<pre>";print_r($rule);
    //     foreach($rule as $key => $rule){
    //         echo $key . " value is ". $rule;
    //         echo "<br>";
    //         $rule_array = explode('|', $rule);
    //         foreach($rule_array as $single_arr){
    //             if (strpos($rule, ':') !== false) {
    //                 [$ruleName, $parameter] = explode(':', $rule);

    //                 echo $ruleName;
    //                 echo $parameter;
    //                 // $this->applyRule($field, $ruleName, $data[$field] ?? null, $parameter);
    //             } else {
    //                 // $this->applyRule($field, $rule, $data[$field] ?? null);
    //             }
    //         }
    //         echo "<pre>";print_r($rule_array);
    //     }
    //     die;
    // }


    public function validatior($data, $rules)
    {
        foreach ($rules as $field => $ruleSet) {
            $rulesArray = explode('|', $ruleSet);
            foreach ($rulesArray as $rule) {
                if (strpos($rule, ':') !== false) {
                    [$ruleName, $parameter] = explode(':', $rule);
                    // echo "this is rule name ".$ruleName . "--this is parameter ". $parameter;
                    $this->applyRule($field, $ruleName, $data[$field] ?? null, $parameter);
                } else {
                    // echo "this is field name " . $field . "--this is rules " . $rule . " this is data filed ". $data[$field];
                    // echo "<br>";
                    $this->applyRule($field, $rule, $data[$field] ?? null);
                }
            }
        }
        // die;
        return empty($this->errors);
    }

    private function applyRule($field, $rule, $value, $parameter = null){
        switch($rule){
            case 'required':
                // if(empty($value)){
                if(is_string($value) && trim($value) === ''){
                    $this->errors[$field][] = "$field is required";
                }
            break;
            case 'integer':
                if(!is_int($value)){
                    $this->errors[$field][] = "$field must be a number";
                }
            break;
            case 'date':
                if (!strtotime($value)) {
                    $this->errors[$field][] = "{$field} must be a valid date.";
                }
            break;
            case 'string':
                if (!is_string($value)) {
                    $this->errors[$field][] = "{$field} must be string.";
                }
            break;
            case 'boolean':
                if (!in_array($value,[true,false,0,1,"0","1"],true)) {
                    $this->errors[$field][] = "{$field} must be a boolean.";
                }
            break;
        }
        return $this->errors;
    }
}