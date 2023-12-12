package com.example.blocmicroservice.Services;

import com.example.blocmicroservice.entities.Bloc;


import java.util.List;

public interface IBlocService {
    Bloc addBloc(Bloc bloc);
    List<Bloc>getAllBlocs();
    Bloc getBloc(Long idBloc);
    void deleteBloc(Long idBloc);
    Bloc updateBloc(Bloc bloc);
}

