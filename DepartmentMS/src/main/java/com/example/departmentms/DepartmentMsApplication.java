package com.example.departmentms;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cloud.netflix.eureka.EnableEurekaClient;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
@EnableEurekaClient
public class DepartmentMsApplication {

    public static void main(String[] args) {
        SpringApplication.run(DepartmentMsApplication.class, args);
    }

   /* @Bean
    public RouteLocater gatewayRouts(RouteLocatorBuilder builder){
        return builder.routes()
                .route("departement" , r->r.path("/departement/**").url("hhtp://localhost:8082/")
                )
                .build();
    }*/
}
