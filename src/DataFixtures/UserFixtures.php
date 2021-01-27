<?php

namespace App\DataFixtures;

use App\Entity\User;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public const MLC_USER_REFERENCE = 'user@mlc.fr';
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $user->setEmail('user@mlc.fr');
        $user->setMembership(new \DateTime('2011-01-01T15:03:01.012345Z'));
        $manager->persist($user);

        $this->addReference(self::MLC_USER_REFERENCE, $user);

        $user = new User();
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $user->setEmail('test@mlc.fr');
        $user->setMembership(new \DateTime());
        $manager->persist($user);
        
        
        $manager->flush();
    }
}
