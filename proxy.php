<?php

interface Door
{
    public function open();

    public function close();
}

class LabDoor implements Door
{
    public function open(): void
    {
        echo "Opening lab door";
    }

    public function close(): void
    {
        echo "Closing the lab door";
    }
}

class SecuredDoor implements Door
{
    protected Door $door;
    protected string $password;

    public function __construct(Door $door, string $password)
    {
        $this->door = $door;
        $this->password = $password;
    }

    /**
     * @return void
     */
    public function open(): void
    {
        if ($this->authenticate($this->password)) {
            $this->door->open();
        }else {
            echo "Big no! It ain't possible";
        }
    }

    public function authenticate($password): bool
    {
        return $password === 'Lucdz';
    }

    public function close(): void
    {
        $this->door->close();
    }
}

$door = new SecuredDoor(new LabDoor(), 'Lucdz');
$door->open(); // Big no! It ain't possible.
echo '<br>';

$door->open(); // Opening lab door
echo '<br>';
$door->close(); // Closing lab door