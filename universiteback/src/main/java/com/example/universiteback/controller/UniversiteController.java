package com.example.universiteback.controller;

import com.example.universiteback.entitie.Universite;
import com.example.universiteback.service.IUniversiteService;
import lombok.AllArgsConstructor;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/universites")
@AllArgsConstructor
public class UniversiteController {
    IUniversiteService universiteService;

    @PostMapping("/adduniversite")

   Universite addUniversite(@RequestBody Universite universite){
        return universiteService.addUniversite(universite);}

    @GetMapping("/universite/{id}")
    Universite retrieveUniversite(@PathVariable Long id){return universiteService.getUniversite(id);}

    @GetMapping("/universites")
    List<Universite> retrieveUniversite(){return universiteService.getAllUniversites();}

    @DeleteMapping("/deleteuniversite/{id}")
    void deleteUniversite(@PathVariable Long id){universiteService.deleteUniversite(id);}

    @PutMapping("/updateuniversite")
    Universite upadteuniversite(@RequestBody Universite universite){return universiteService.updateUniversite(universite);}



}
