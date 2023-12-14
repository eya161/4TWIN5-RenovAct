package tn.esprit.univconnect.controllers;

import lombok.AllArgsConstructor;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import tn.esprit.univconnect.entities.Foyer;
import tn.esprit.univconnect.services.IFoyerService;

import java.io.IOException;
import java.util.List;

@RestController
@RequestMapping("/foyers")
@AllArgsConstructor
public class FoyerController {
    IFoyerService foyerService;



    @PostMapping("/addfoyer")
    Foyer addFoyer(@RequestBody Foyer foyer) {
        return foyerService.addFoyer(foyer);
    }

    @GetMapping("/foyer/{id}")
    Foyer retrieveFoyer(@PathVariable Long id) {
        return foyerService.getFoyer(id);
    }

    @GetMapping("/foyer")
    List<Foyer> retrieveFoyers() {
        return foyerService.getAllFoyers();
    }

    @DeleteMapping("/deletefoyer/{id}")
    void deleteFoyer(@PathVariable Long id) {
        foyerService.deleteFoyer(id);
    }

    @PutMapping("/updatefoyer")
    Foyer updateFoyer(@RequestBody Foyer foyer) {
        return foyerService.updateFoyer(foyer);
    }

}
