package com.example.departmentms;


import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface DepartmentRepository extends JpaRepository<Department,Long> {

  List<Department> findDepartmentsByNomDepartment(String nom);

    @Query("SELECT d FROM Department d order by d.nombreEtage")
    List<Department> orderDepartmentsetage();

    @Query("SELECT d FROM Department d order by d.nombreClasses")
    List<Department> orderClasses();


}
