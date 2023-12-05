package tn.esprit.actualitemicroservice.services;

import lombok.AllArgsConstructor;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Service;
import tn.esprit.actualitemicroservice.entities.Actualite;
import tn.esprit.actualitemicroservice.entities.Category;
import tn.esprit.actualitemicroservice.repositories.ActualiteRepository;

import java.util.List;

@Service
@AllArgsConstructor
public class ActualiteServiceImpl implements IActualiteService{
    ActualiteRepository actualiteRepository;
    private final JavaMailSender javaMailSender;
    @Override
    public List<Actualite> getActualites() {
        return actualiteRepository.findAll();
    }

    @Override
    public Actualite getActualiteById(Long id) {
        return actualiteRepository.findById(id).orElse(null);
    }

    @Override
    public Actualite addActualite(Actualite actualite) {
        if(actualite.getToWhomEmails()!=null){
            sendEmailToSubscribers(actualite);
        }
        return actualiteRepository.save(actualite);
    }

    @Override
    public void deleteActualite(Long id) {
        actualiteRepository.deleteById(id);
    }

    @Override
    public Actualite updateActualite(Actualite actualite) {
        return actualiteRepository.save(actualite);
    }

    @Override
    public List<Actualite> searchActualityByCategory(Category category) {
        return actualiteRepository.retrieveActualityByCategory(category);
    }

    public void sendEmailToSubscribers(Actualite actualite) {
        SimpleMailMessage message = new SimpleMailMessage();
        message.setSubject("New Actualite: " + actualite.getTitle());
        message.setText("Title: " + actualite.getTitle() + "\nContent: " + actualite.getContent()
                + "\nAuthor: " + actualite.getAuthor() + "\nStatus: " + actualite.getStatus()
                + "\nCategory: " + actualite.getCategory()); // Include other fields as needed

        for (String email : actualite.getToWhomEmails()) {
            message.setTo(email);
            javaMailSender.send(message);
        }
    }
}
