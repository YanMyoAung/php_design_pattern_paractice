<?php 

class ProfileBuilder{
    private ?string $name = null;
    private ?string $email = null;
    private ?int $age = null;

    public function setName($name) : ProfileBuilder{
        $this->name = $name;
        return $this;
    }

    public function getName() : ?string {
        return $this->name;
    }

    public function setEmail($email) : ProfileBuilder{
        $this->email = $email;
        return $this;
    }

    public function getEmail() : ?string {
         return $this->email;
    }

    public function setAge($age) : ProfileBuilder{
        $this->age = $age;
        return $this;
    }

    public function getAge() : ?int {
        return $this->age;
    }

    public function build(){
        return new Profile($this);
    }
}

class Profile{
    private ?string $name = null;
    private ?string $email = null;
    private ?int $age = null;

    public function __construct(public ProfileBuilder $profileBuilder)
    {
        $this->name = $profileBuilder->getName();
        $this->email = $profileBuilder->getEmail();
        $this->age = $profileBuilder->getAge();
    }

    public function getName() : ?string {
        return $this->name;
    }

    public static function builder(){
        return new ProfileBuilder();
    }
}


$user = Profile::builder()->setName("Yan")->build();
var_dump($user->getName());
?>