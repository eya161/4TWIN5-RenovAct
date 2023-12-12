package com.example.universiteback.entitie;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import java.io.Serializable;

@Entity
@AllArgsConstructor
@NoArgsConstructor
@Setter
@Getter
public class Universite implements Serializable {
    @Id
    @GeneratedValue
   private long idUniversite;
    private String nomUniversite;
     private String adesse;
}
