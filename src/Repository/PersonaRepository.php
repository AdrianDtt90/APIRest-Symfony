<?php

namespace App\Repository;

use App\Entity\Persona;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Persona|null find($id, $lockMode = null, $lockVersion = null)
 * @method Persona|null findOneBy(array $criteria, array $orderBy = null)
 * @method Persona[]    findAll()
 * @method Persona[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonaRepository extends ServiceEntityRepository
{
    private $entityManager;

    public function __construct(RegistryInterface $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Persona::class);
        
        $this->entityManager = $entityManager;
    }

    /**
     * @return bool Returns a bool result
     */
    public function createPersona()
    {

        $persona = new Persona();
        $persona->setidPersona(1);
        $persona->setNombre('Adrian');
        $persona->setApellido('Dotta');
        $persona->setEdad(28);
        $persona->setCiudad('Cordoba');

        // tell Doctrine you want to (eventually) save the persona (no queries yet)
        $this->entityManager->persist($persona);

        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();

        return true;
    }

    // /**
    //  * @return Persona[] Returns an array of Persona objects
    //  */
    // public function findByExampleField($value)
    // {
    //     return 'Holaa';
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('p.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    /*
    public function findOneBySomeField($value): ?Persona
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
