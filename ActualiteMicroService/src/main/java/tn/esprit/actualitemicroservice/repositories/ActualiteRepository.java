package tn.esprit.actualitemicroservice.repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import tn.esprit.actualitemicroservice.entities.Actualite;
import tn.esprit.actualitemicroservice.entities.Category;

import java.util.List;

public interface ActualiteRepository extends JpaRepository<Actualite,Long> {
    @Query("select a from Actualite a where a.category=?1")
    List<Actualite> retrieveActualityByCategory(Category category);
}
