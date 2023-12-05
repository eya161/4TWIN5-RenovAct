package tn.esprit.actualitemicroservice.services;

import tn.esprit.actualitemicroservice.entities.Actualite;
import tn.esprit.actualitemicroservice.entities.Category;

import java.util.List;

public interface IActualiteService {
    List<Actualite> getActualites();
    Actualite getActualiteById(Long id);
    Actualite addActualite(Actualite actualite);
    void deleteActualite(Long id);
    Actualite updateActualite(Actualite actualite);
    List<Actualite> searchActualityByCategory(Category category);
}
