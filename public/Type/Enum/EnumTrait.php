<?php
declare(strict_types=1);

namespace App\Type\Enum;

use InvalidArgumentException;
use ReflectionObject;

trait EnumTrait
{
    private $scalar;

    private function __construct($value)
    {
        $ref = new ReflectionObject($this);
        $constants = $ref->getConstants();
        if (!in_array($value, $constants)) {
            throw new InvalidArgumentException("未定義の値です 値={$value}");
        }

        $this->scalar = $value;
    }

    final public static function __callStatic($method, $args)
    {
        $class = get_called_class();
        $label = self::toLabel($method);
        $const = constant("$class::$label");
        return new $class($const);
    }

    private static function toLabel($str)
    {
        return ltrim(strtoupper(preg_replace('/[A-Z]+/', '_\0', $str)), '_');
    }

    final public function value()
    {
        return $this->scalar;
    }
}