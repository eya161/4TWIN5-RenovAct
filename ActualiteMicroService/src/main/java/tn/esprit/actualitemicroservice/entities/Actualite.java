package tn.esprit.actualitemicroservice.entities;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

@Entity
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class Actualite implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String title;
    String content;
    String author;
    @Enumerated(EnumType.STRING)
    StatusPost status;
    @Enumerated(EnumType.STRING)
    Category category;
    @ElementCollection
    List<String> toWhomEmails = new ArrayList<>();

}
