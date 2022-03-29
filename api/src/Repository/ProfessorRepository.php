<?php

namespace App\Repository;

use App\Entity\Professor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Professor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professor[]    findAll()
 * @method Professor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professor::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Professor $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Professor $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function countProf()
    {
        // return $this->createQueryBuilder('professor')
        //     ->select('count(professor.id)')
        //     ->getQuery()
        //     ->getSingleScalarResult();

        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT count(professor.id) as 'number of professor' FROM professor";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        return $resultSet->fetchAllAssociative();
    }

    // public static Angajat getAngajatById(int id) throws SQLException {
		
	// 	String select = "select * from angajati where id=?";
	// 	Connection con=DBHelper.getConnection();
	// 	PreparedStatement stmt = con.prepareStatement(select);
	// 	stmt.setInt(1, id);
	// 	ResultSet rs =stmt.executeQuery();
	// 	Angajat result = null;
	// 	if (rs.next()) {
	// 		String nume = rs.getString("nume");
	// 		String prenume = rs.getString("prenume");
	// 		String telefon = rs.getString("telefon");
	// 		String email = rs.getString("email");
	// 		String adresa = rs.getString("adresa");
	// 		int salariu = rs.getInt("salariu");
	// 		result = new Angajat(id, nume, prenume, telefon, email, adresa, salariu);
	// 	}
	// 	DBHelper.closeConnection();
	// 	return result;

    // public static ArrayList<Angajat> getAngajati() throws SQLException {

	// 	String select = "SELECT * FROM `angajati` ORDER BY `angajati`.`nume` ASC";

	// 	Connection con = DBHelper.getConnection();

	// 	PreparedStatement stmt = con.prepareStatement(select);

	// 	ArrayList<Angajat> result = new ArrayList<Angajat>();
	// 	ResultSet rs = stmt.executeQuery();
	// 	while (rs.next()) {

	// 		int id = rs.getInt("id");
	// 		String nume = rs.getString("nume");
	// 		String prenume = rs.getString("prenume");
	// 		String telefon = rs.getString("telefon");
	// 		String email = rs.getString("email");
	// 		String adresa = rs.getString("adresa");
	// 		int salariu = rs.getInt("salariu");

	// 		Angajat s = new Angajat(id, nume, prenume, telefon, email, adresa, salariu);

	// 		result.add(s);
	// 	}
	// 	DBHelper.closeConnection();
	// 	return result;
	// }


    // /**
    //  * @return Professor[] Returns an array of Professor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Professor
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
