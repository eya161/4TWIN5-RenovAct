package com.example.chambre;

import lombok.AllArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
@RestController
@RequestMapping("/chambre")
@AllArgsConstructor
public class ChambreRestAPI {
    @Autowired
        ChambreService chambreService;
        @PostMapping("/ajout")
        Chambre addChambre(@RequestBody Chambre chambre){
            return chambreService.addChambre(chambre);
        }

        @GetMapping("/{id}")
        Chambre retriveChambre(@PathVariable long id){
            return chambreService.getChambre(id);
        }

        @GetMapping("")
        List<Chambre> retriveChambres(){
            return chambreService.getAllChambre();
        }

        @DeleteMapping("/deletechambre/{id}")
        void deleteChambre(@PathVariable long id){
            chambreService.deleteChambre(id);
        }

        @PutMapping("/chambre")
        Chambre updateChambre(@RequestBody Chambre chambre){
            return chambreService.updateChambre(chambre);
        }

}
