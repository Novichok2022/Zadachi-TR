<?php

interface IUser {

    const GENDER_MEAN = 'mean';
    
    const GENDER_WOMAN = 'woman';

    public function getName(): string;

    public function setname(string $name): bool;

    public function getAge(): int;

    public function setAge(int $name): bool;

    function getGender(): string;

    function setGender(string $gender): bool;
}
