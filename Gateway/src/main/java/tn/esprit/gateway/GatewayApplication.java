package tn.esprit.gateway;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.cloud.gateway.route.RouteLocator;
import org.springframework.cloud.gateway.route.builder.RouteLocatorBuilder;
import org.springframework.cloud.netflix.eureka.EnableEurekaClient;
import org.springframework.context.annotation.Bean;

@SpringBootApplication
@EnableEurekaClient
public class GatewayApplication {

    public static void main(String[] args) {
        SpringApplication.run(GatewayApplication.class, args);
    }
    @Bean
    public RouteLocator gatewayRoutes(RouteLocatorBuilder builder) {

        return builder.routes()

                .route("actualiteMs", r->r.path("/actualite/**")
                        .uri("http://actualite:8085/"))
                .route("chambreMs", r->r.path("/chambre/**")
                        .uri("http://chambre:8083/"))
                .route("departementMs", r->r.path("/departments/**")
                        .uri("http://departement:8082/"))
                .route("univertsiteMs", r->r.path("/universites/**")
                        .uri("http://univertsite:8089/"))
                //.route("bloc-service", r->r.path("/blocs/**")
                  //      .uri("http://bloc:8088/"))
                .route("foyerMs", r->r.path("/foyers/**")
                        .uri("http://foyer:8084/"))
                .route("classeMs", r->r.path("/classes/**")
                        .uri("http://classe:8086/"))
                .route("bloc-service", r -> r.path("/blocs/**")
                      //  .filters(f -> f.stripPrefix(1))
                        .uri("http://bloc:8088"))
              //  .route("classeMs", r -> r.path("/classes/**")
                //        .filters(f -> f.stripPrefix(1))
                  //      .uri("http://localhost:8088"))

                .build();

    }
}
