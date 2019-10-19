<?php
declare(strict_types=1);

namespace App\Practice;

require_once '../../vendor/autoload.php';

class User
{
    /** @var string */
    private $name;

    /** @var array */
    private $cars;

    /** @var Phone $phone */
    private $phone;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setCars(array $cars)
    {
        $this->cars = $cars;
    }

    public function phone(): Phone
    {
        return $this->phone;
    }

    public function setPhone(Phone $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return array
     */
    public function cars(): array
    {
        return $this->cars;
    }
}

class Phone
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }
}

function changeName(User $user)
{
    $user->setName('Satou');
}

// メソッド引数にインスタンスを渡しメソッド内部で変更した場合、元のインスタンスも変更される
$user = new User('Tanaka');
changeName($user);
//var_dump($user);    // name: Satou

// インスタンスを代入しプロパティを変更した場合、元のインスタンスも変更される
$user1 = new User('Yamada');
$user2 = $user1;
$user2->setName('Takahashi');
//var_dump($user1);   // Takahashi
//var_dump($user2);   // Takahashi

// インスタンスのプロパティ(配列)を代入し変更した場合、元のインスタンスは変更されない
$user3 = new User('Okada');
$user3->setCars(['fit', 'passo']);
$carCollection1 = $user3->cars();
$carCollection1[] = 'demio';
$carCollection2 = $user3->cars();
$carCollection2 = [];
$carCollection3 = $user3->cars();
unset($carCollection3[0]);

//var_dump($user3->cars());   // ['fit', 'passo']
//var_dump($carCollection1);  // ['fit', 'passo', 'demio]
//var_dump($carCollection2);  // []
//var_dump($carCollection3);  // ['passo']

// インスタンスプロパティのオブジェクトを代入し変更した場合、元のインスタンスプロパティも変更される
$user4 = new User('Yokota');
$user4->setPhone(new Phone('090-1111-2222'));
$anotherPhone = $user4->phone();
$anotherPhone->setValue('080-9999-8888');
var_dump($user4->phone());  // '080-9999-8888'
var_dump($anotherPhone);    // '080-9999-8888'

// 新しいインスタンスを再代入した場合は、元は変更されない
$anotherPhone = new Phone('0120-1111-2222');
var_dump($user4->phone());  // '080-9999-8888'
var_dump($anotherPhone);    // '0120-1111-2222'