FROM openjdk:11
EXPOSE 8090
ADD target/Gateway-0.0.1-SNAPSHOT.jar apigateway.jar
ENTRYPOINT ["java", "-jar", "apigateway.jar"]