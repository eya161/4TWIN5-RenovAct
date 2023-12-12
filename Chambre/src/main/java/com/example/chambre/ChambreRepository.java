package com.example.chambre;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface ChambreRepository extends JpaRepository<Chambre,Long> {
    //Chambre findByNumeroChambre(long numeroChambre);

}
