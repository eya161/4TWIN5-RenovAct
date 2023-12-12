package com.example.blocmicroservice.Services;


import com.example.blocmicroservice.Repositories.BlocRepository;
import com.example.blocmicroservice.entities.Bloc;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class BlocServiceImpl implements IBlocService {

    private BlocRepository blocRepository;




    @Autowired
    public BlocServiceImpl(BlocRepository blocRepository) {
        this.blocRepository = blocRepository;
    }
    @Override
    public Bloc addBloc(Bloc bloc) {
        return blocRepository.save(bloc);
    }
    @Override
    public List<Bloc> getAllBlocs() {
        return (List<Bloc>) blocRepository.findAll();
    }
    @Override
    public Bloc getBloc(Long idBloc) {
        return blocRepository.findById(idBloc).orElse(null);
    }

    @Override
    public void deleteBloc(Long idBloc) {
        blocRepository.deleteById(idBloc);

    }

    @Override
    public Bloc updateBloc(Bloc bloc) {
        return blocRepository.save(bloc);
    }
}

