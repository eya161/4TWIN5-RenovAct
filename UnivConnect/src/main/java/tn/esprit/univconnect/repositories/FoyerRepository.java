package tn.esprit.univconnect.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import tn.esprit.univconnect.entities.Foyer;

import java.util.List;


public interface FoyerRepository extends JpaRepository<Foyer,Long> {
    //Foyer findByNomFoyer(String nomFoyer);
    //List<Foyer> findByCapaciteFoyer(long capaciteFoyer);
}
