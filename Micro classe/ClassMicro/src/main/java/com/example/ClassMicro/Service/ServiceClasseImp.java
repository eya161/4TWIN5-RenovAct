package com.example.ClassMicro.Service;

import com.example.ClassMicro.Entity.Classe;
import com.example.ClassMicro.Repository.ClasseRepository;
import lombok.AllArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
@AllArgsConstructor
public class ServiceClasseImp implements IServiceClasse {

    @Autowired
    ClasseRepository classeRepository;


    @Override
    public Classe addClasse(Classe classe) {
        return classeRepository.save(classe);
    }

    @Override
    public Classe getClasse(Long id) {
        return classeRepository.findById(id).orElse(null);
    }

    @Override
    public void deleteClasse(Long id) {
        classeRepository.deleteById(id);
    }

    @Override
    public List<Classe> getAllClasses() {
        return classeRepository.findAll();
    }

    @Override
    public Optional<Classe> updateClasse(Classe classe) {

        Optional<Classe> existingPath =classeRepository.findById(classe.getIdClasse());
        if (existingPath.isPresent()){
            Classe updated = classeRepository.save(classe);
            return Optional.of(updated);
        }
        return Optional.empty();


    }
}
