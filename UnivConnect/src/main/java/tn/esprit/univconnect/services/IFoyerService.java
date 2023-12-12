package tn.esprit.univconnect.services;


import tn.esprit.univconnect.entities.Foyer;

import java.util.List;

public interface IFoyerService {
    Foyer addFoyer(Foyer foyer);
    List<Foyer> getAllFoyers();
    Foyer getFoyer(Long idFoyer);
    void deleteFoyer(Long idFoyer);
    Foyer updateFoyer(Foyer foyer);

}
