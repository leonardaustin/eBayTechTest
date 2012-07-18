<?php
namespace Ebay\User;

/**
 *
 * @author leonardaustin
 */
interface MachineInterface {

    public function setAllowedValues(array $allowedValue);
    public function getUserValue();
    public function getAllowedValues();
}
