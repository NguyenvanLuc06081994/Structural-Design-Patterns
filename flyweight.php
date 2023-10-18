<?php

class KarakTea
{

}

class TeaMaker
{
    protected array $availableTea = [];

    public function make($preference)
    {
        if (empty($this->availableTea[$preference])) {
            $this->availableTea[$preference] = new KarakTea();
        }

        return $this->availableTea[$preference];
    }
}

class TeaShop
{
    protected array $orders;
    protected TeaMaker $teaMaker;

    public function __construct(TeaMaker $teaMaker)
    {
        $this->teaMaker = $teaMaker;
    }

    public function takeOrder(string $teaType, int $table): void
    {
        $this->orders[$table] = $this->teaMaker->make($teaType);
    }

    public function serve(): void
    {
        foreach ($this->orders as $table => $tea) {
            echo "Serving tea to table# " . $table;
        }
    }
}

$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);
$shop->takeOrder('less sugar', 1);
$shop->takeOrder('more milk', 2);
$shop->takeOrder('without sugar', 5);

$shop->serve();