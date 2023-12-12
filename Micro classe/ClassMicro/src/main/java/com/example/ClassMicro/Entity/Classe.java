package com.example.ClassMicro.Entity;

import com.fasterxml.jackson.annotation.JsonAnyGetter;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
@Getter
@Setter
public class Classe {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long idClasse;

    String classeName;

    long capacity;

    long etage;

    boolean disponibility;

}
