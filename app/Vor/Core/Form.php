<?php

namespace Vor\Core;

use InvalidArgumentException;

final class Form implements Validater{

    private $form;

    private $rules;

    public const MAX_LENGTH     = 'MAX_LENGTH';
    public const MIN_LENGTH     = 'MIN_LENGTH';
    public const EMPTY          = 'EMPTY';
    public const ENCODING       = 'ENCODING';
    public const IS_STRING      = 'IS_STRING';
    public const IS_INT         = 'IS_INT';
    public const MAX_VALUE      = 'MAX_VALUE';
    public const MIN_VALUE      = 'MIN_VALUE';
    public const CHECKBOX       = 'CHECKBOX';

    public function __construct(array $form, array $rules) {

        $elements   = count($form);
        $number_of_rules = count($rules);

        if ($elements !== $number_of_rules)
            throw new InvalidArgumentException(
                "Number of form elements are not equal to the number of rules");

        foreach ($form as $key => $value) {
            if (!array_key_exists($key, $rules))
                throw new InvalidArgumentException(
                    "Missing rules for the form with the given key \"{$key}\""
                );


            $is_string = false; $is_int = false;

            foreach ($rules[$key] as $rule_key => $rule) {
                switch($rule_key) {

                    case Form::MAX_LENGTH:
                    case Form::MIN_LENGTH:
                    case Form::MAX_VALUE:
                    case FORM::MAX_VALUE:
                        if (!is_int($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        break;

                    case Form::EMPTY:
                        if (!is_bool($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        break;

                    case Form::IS_INT:
                        if (!is_bool($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        if (!$is_string) $is_int = true;
                        else throw new InvalidArgumentException(
                            "Rule can not be integer and string at the same time");
                        break;

                    case Form::IS_STRING:
                        if (!is_bool($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        if (!$is_int) $is_string = true;
                        else throw new InvalidArgumentException(
                            "Rule can not be integer and string at the same time");
                        break;

                    case Form::ENCODING:
                        if (!is_string($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        break;

                    case Form::CHECKBOX:
                        if(!is_bool($rule))
                            throw new InvalidArgumentException(
                                "Invalid value for the given key \"{$rule_key}\"");
                        if (count($rules[$key]) > 1)
                            throw new InvalidArgumentException(
                                "CHECKBOX flag is used, no need for other options");
                        break;
                    default:
                        throw new InvalidArgumentException("Invalid key \"{$rule_key}\" given");
                        break;

                }
            }
        }

        $this->form = $form;
        $this->rules = $rules;
    }

    public function validate(): bool {

        foreach ($this->form as $key => $element) {
            $rule = $this->rules[$key];
            foreach ($rule as $key => $value) {

                switch ($key) {

                    case Form::MAX_LENGTH:
                        if (count($element) > $value)
                            return false;
                        break;

                    case Form::MIN_LENGTH:
                        if (count($element) < $value)
                            return false;
                        break;

                    case Form::MAX_VALUE:
                        if ($element > $value)
                            return false;
                        break;

                    case Form::MIN_VALUE:
                        if ($element < $value)
                            return false;
                        break;

                    case Form::ENCODING:
                        if(!mb_check_encoding($element, $value))
                            return false;

                    case Form::EMPTY:
                        $empty = empty($element);

                        if (($value) && (!$empty))
                                return false;
                        elseif ((!$value) && ($empty))
                                return false;
                        break;

                    case Form::IS_STRING:
                        if (!is_string($element))
                            return false;
                        break;

                    case Form::IS_INT:
                        if((!is_int($element)))
                            return false;
                        break;

                    case Form::CHECKBOX:
                        if(!is_string($element))
                            return false;
                        if (!empty($element) || ($element !== 'on'))
                            return false;
                        break;
                }
            }
        }

        return true;
    }
}