package com.example.chambre;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@AllArgsConstructor
public class ChambreService {
    ChambreRepository chambreRepository;

    public Chambre addChambre(Chambre chambre) {
        return chambreRepository.save(chambre);
    }

    public Chambre getChambre(Long idChambre) {
        return chambreRepository.findById(idChambre).orElse(null);
    }

    public List<Chambre> getAllChambre() {
        return chambreRepository.findAll();
    }

    public void deleteChambre(long idChambre) {
        chambreRepository.deleteById(idChambre);
    }

    public Chambre updateChambre(Chambre chambre) {
        Chambre ch = chambreRepository.findById(chambre.getIdChambre()).orElse(null) ;
        if (ch != null)
            chambreRepository.save(chambre);
        return  ch;

    }
    /* public Chambre affecterChambreABloc(Chambre chambre, Long idBloc) {
        Bloc bloc = blocRepository.findById(idBloc).orElse(null);
        chambre.setBloc(bloc);
        return chambreRepository.save(chambre);
    }*/

}

