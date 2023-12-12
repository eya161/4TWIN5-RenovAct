package com.example.chambre;



import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import java.io.Serializable;

@Entity
public class Chambre implements Serializable {
    @Id
    @GeneratedValue
    long idChambre;
    long numeroChambre;

    public long getIdChambre() {
        return idChambre;
    }

    public long getNumeroChambre() {
        return numeroChambre;
    }

    public void setNumeroChambre(long numeroChambre) {
        this.numeroChambre = numeroChambre;
    }
    public Chambre() {
        super();
    }
    public Chambre(long numeroChambre) {
        super();
        this.numeroChambre = numeroChambre;
    }
}
