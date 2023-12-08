package com.example.universiteback.service;

import com.example.universiteback.entitie.Universite;

import java.util.List;

public interface IUniversiteService {
    Universite addUniversite(Universite universite);
    List<Universite> getAllUniversites();
    Universite getUniversite(Long idUniversite);
    void deleteUniversite(Long idUniversite);
    Universite updateUniversite(Universite universite);
}
