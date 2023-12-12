package com.example.blocmicroservice.entities;



import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import java.io.Serializable;


@Entity
public class Bloc implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long idBloc;
    String nomBloc;
    long capaciteBloc;

    public long getIdBloc() {
        return idBloc;
    }

    public String getNomBloc() {
        return nomBloc;
    }

    public long getCapaciteBloc() {
        return capaciteBloc;
    }

    public void setNomBloc(String nomBloc) {
        this.nomBloc = nomBloc;
    }

    public void setCapaciteBloc(long capaciteBloc) {
        this.capaciteBloc = capaciteBloc;
    }

    public Bloc() {

    }

    public Bloc(String nomBloc, long capaciteBloc) {
        this.nomBloc = nomBloc;
        this.capaciteBloc = capaciteBloc;
    }
}
