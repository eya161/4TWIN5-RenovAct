package tn.esprit.actualitemicroservice.controllers;

import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.*;
import tn.esprit.actualitemicroservice.entities.Actualite;
import tn.esprit.actualitemicroservice.entities.Category;
import tn.esprit.actualitemicroservice.services.IActualiteService;

import java.util.List;

@RestController
@RequestMapping("/actualite")
@AllArgsConstructor
public class ActualiteController {
    IActualiteService actualiteService;
    @PostMapping("/add")
    Actualite addActualite(@RequestBody Actualite actualite){
        return actualiteService.addActualite(actualite);
    }
    @GetMapping("/{id}")
    Actualite retrieveActualite(@PathVariable Long id){
        return actualiteService.getActualiteById(id);
    }
    @GetMapping("")
    List<Actualite> retrieveActualites(){
        return actualiteService.getActualites();
    }
    @DeleteMapping("/delete/{id}")
    void deleteActualite(@PathVariable Long id){
        actualiteService.deleteActualite(id);
    }
    @PutMapping("/update")
    Actualite updateActualite(@RequestBody Actualite actualite){
        return actualiteService.updateActualite(actualite);
    }
    @GetMapping("/getByCategory/{cat}")
    List<Actualite> searchActualityByCategory(@PathVariable Category cat){
        return actualiteService.searchActualityByCategory(cat);
    }

}
