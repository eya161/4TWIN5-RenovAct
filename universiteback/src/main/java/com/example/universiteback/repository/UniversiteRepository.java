package com.example.universiteback.repository;

import com.example.universiteback.entitie.Universite;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UniversiteRepository extends JpaRepository<Universite, Long> {
    Universite findByNomUniversite(String nomUniversite);
    Universite findByAdesse(String adesse);

}
