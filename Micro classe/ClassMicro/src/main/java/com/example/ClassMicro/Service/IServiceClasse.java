package com.example.ClassMicro.Service;

import com.example.ClassMicro.Entity.Classe;

import java.util.List;
import java.util.Optional;

public interface IServiceClasse {
    Classe addClasse(Classe classe);

    Classe getClasse(Long id);

    void deleteClasse(Long id);

    List<Classe> getAllClasses();

    Optional<Classe> updateClasse(Classe classe);

}
