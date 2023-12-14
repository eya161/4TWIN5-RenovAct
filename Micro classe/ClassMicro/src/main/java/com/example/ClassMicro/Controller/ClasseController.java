package com.example.ClassMicro.Controller;

import com.example.ClassMicro.Entity.Classe;
import com.example.ClassMicro.Service.ServiceClasseImp;
import com.netflix.discovery.converters.Auto;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@AllArgsConstructor
@RequestMapping("/classes")
public class ClasseController {

    @Autowired
    ServiceClasseImp serviceClasseImp;

    @GetMapping("/classe/{id}")
    Classe getOne(@PathVariable long id){
        return serviceClasseImp.getClasse(id);
    }

    @GetMapping("/classe")
    List<Classe> getAll(){
        return serviceClasseImp.getAllClasses();
    }

    @PostMapping("/add")
    Classe addClasse(@RequestBody Classe classe){
        return serviceClasseImp.addClasse(classe);
    }

    @PutMapping("/update")
    Optional<Classe> update(@RequestBody Classe classe){
        return serviceClasseImp.updateClasse(classe);
    }

    @DeleteMapping("/delete/{id}")
    void delete(@PathVariable long id){
        serviceClasseImp.deleteClasse(id);
    }









}
