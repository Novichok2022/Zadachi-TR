<?php

class Employee implements IEmployee {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var strnig  
     */
    protected $gender;

    /**
     * @var float
     */
    protected $salary;

    /**
     * 
     * @param string $name The name must contain 
     * 3 to 30 characters
     * @param int $age Age from 1 to 120
     * @param string $gender (IUser::GENDER_MEAN | IUser::GENDER_WOMAN)
     * @param float $salary 
     */
    public function __construct(string $name, int $age, string $gender, float $salary) {

        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->salary = $salary;
        
        
        // Можна  такий спосіб ініціалізації класа використовувати і викидувати
        // Exception в разі не коректних даних?
//        $this->name = $this->setName($name);
//        $this->age = $this->setAge($age);
//        $this->gender = $this->setGender($gender);
//        $this->salary = $this->setSalary($salary);
        
        
    }

    /**
     * 
     * @return string
     */
    public function getName(): string {

        return $this->name;
    }

    /**
     * 
     * @param string $name
     * @return bool
     */
    public function setName(string $name): bool {

        $newName = $name;
        $patern = "/^(([a-zA-Z' -]{3,40})|([а-яА-ЯЁёІіЇїҐґЄє' -]{3,40}))$/u";

        if (preg_match($patern, $newName)) {

            $this->name = $newName;

            return true;
        } else {

            echo 'Введене ім\'я ' . $name . ' не коректне '. '<br>';

            return false;
        }
    }

    /**
     * 
     * @return int
     */
    public function getAge(): int {

        return $this->age;
    }

    /**
     * 
     * @param int $age
     * @return bool
     */
    public function setAge(int $age): bool {

        $newAge = $age;

        if ($newAge > 0 && $newAge <= 120) {

            $this->age = $newAge;

            return true;
        } else {

            echo 'Введений вік ' . $age . ' не коректний ' . '<br>';

            return false;
        }
    }

    /**
     * 
     * @return string
     */
    public function getGender(): string {

        return $this->gender;
    }

    /**
     * 
     * @param string $gender (IUser::GENDER_MEAN | IUser::GENDER_WOMAN)
     * @return bool
     */
    public function setGender(string $gender): bool {

        $newGender = $gender;

        if (($newGender === IUser::GENDER_MEAN) || ($newGender === IUser::GENDER_WOMAN)) {
            
            $this->gender = $newGender;

            return true;
            
        } else {
            
            echo 'Введена стать ' . $gender . ' не коректна ' . '<br>';
            
            return false;
        }
    }

    /**
     * 
     * @return float
     */
    public function getSalary(): float {

        return $this->salary;
    }

    /**
     * 
     * @param float $salary
     * @return bool
     */
    public function setSalary(float $salary): bool {

        $this->salary = $salary;

        return true;
    }

}
