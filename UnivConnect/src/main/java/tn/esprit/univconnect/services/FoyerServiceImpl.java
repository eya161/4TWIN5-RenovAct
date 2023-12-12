package tn.esprit.univconnect.services;

import org.springframework.stereotype.Service;
import tn.esprit.univconnect.entities.Foyer;
import tn.esprit.univconnect.repositories.FoyerRepository;

import java.util.List;

@Service
public class FoyerServiceImpl implements IFoyerService{
    FoyerRepository foyerRepository;

    public FoyerServiceImpl(FoyerRepository foyerRepository) {
        this.foyerRepository = foyerRepository;
    }

    @Override
    public Foyer addFoyer(Foyer foyer) {

        return foyerRepository.save(foyer);

    }

    @Override
    public List<Foyer> getAllFoyers() {
        return (List<Foyer>) foyerRepository.findAll();
    }

    @Override
    public Foyer getFoyer(Long idFoyer) {
        return foyerRepository.findById(idFoyer).orElse(null);
    }

    @Override
    public void deleteFoyer(Long idFoyer) {
foyerRepository.deleteById(idFoyer);
    }

    @Override
    public Foyer updateFoyer(Foyer foyer) {

        return foyerRepository.save(foyer);}

}
