<?php
interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{
    public function roar()
    {
        // TODO: Implement roar() method.
    }
}

class AsianLion implements Lion
{
    public function roar()
    {
        // TODO: Implement roar() method.
    }
}

class Hunter
{
    public function hunt(Lion $lion)
    {
        $lion->roar();
    }
}


class WildDog
{
    public function bark()
    {

    }
}

class WildDogAdapter implements Lion
{
    protected $wildDog;
    public function __construct(WildDog $wildDog)
    {
        $this->wildDog = $wildDog;
    }

    public function roar()
    {
        $this->wildDog->bark();
    }
}

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);