package com.example.blocmicroservice.Controllers;

import com.example.blocmicroservice.Services.BlocServiceImpl;
import com.example.blocmicroservice.entities.Bloc;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/blocs")
public class BlocRestAPI {
    @Autowired
    private BlocServiceImpl blocService;
    @PostMapping("/addbloc")
    Bloc addBloc(@RequestBody Bloc bloc){
        return blocService.addBloc(bloc);
    }
    @GetMapping("/bloc/{id}")
    Bloc retrieveBloc(@PathVariable Long id){
        return blocService.getBloc(id);
    }
    @GetMapping("/bloc")
    List<Bloc> retrieveBlocs(){
        return blocService.getAllBlocs();
    }
    @DeleteMapping("/bloc/{id}")
    void deleteBloc(@PathVariable Long id){
        blocService.deleteBloc(id);
    }
    @PutMapping("/updatebloc")
    Bloc updateBloc(@RequestBody Bloc bloc){
        return blocService.updateBloc(bloc);
    }
}
