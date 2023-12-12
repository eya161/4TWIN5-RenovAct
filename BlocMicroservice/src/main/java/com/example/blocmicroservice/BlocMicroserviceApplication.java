package com.example.blocmicroservice;

import com.example.blocmicroservice.Repositories.BlocRepository;
import com.example.blocmicroservice.entities.Bloc;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.ApplicationRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;
import org.springframework.cloud.netflix.eureka.EnableEurekaClient;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
@EnableEurekaClient
public class BlocMicroserviceApplication {

	public static void main(String[] args) {

		SpringApplication.run(BlocMicroserviceApplication.class, args);
	}

}
