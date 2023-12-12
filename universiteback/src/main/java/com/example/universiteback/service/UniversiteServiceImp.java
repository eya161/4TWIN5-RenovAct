package com.example.universiteback.service;

import com.example.universiteback.entitie.Universite;
import com.example.universiteback.repository.UniversiteRepository;
import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@AllArgsConstructor
public class UniversiteServiceImp implements IUniversiteService{
    UniversiteRepository universiteRepository;

    @Override
    public Universite addUniversite(Universite universite) {
        return universiteRepository.save(universite);
    }

    @Override
    public List<Universite> getAllUniversites() {
         return (List<Universite>) universiteRepository.findAll();
    }

    @Override
    public Universite getUniversite(Long idUniversite) {
        return universiteRepository.findById(idUniversite).orElse(null);
    }

    @Override
    public void deleteUniversite(Long idUniversite) {
        universiteRepository.deleteById(idUniversite);
    }

    @Override
    public Universite updateUniversite(Universite universite) {
        return  universiteRepository.save(universite);
    }

}
